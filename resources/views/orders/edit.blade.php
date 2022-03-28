@extends('layouts.web')

@php
$orderTotal = 0;
foreach ($details as $detail) {
$orderTotal += $detail->total;
}
$orderTotal = '$' . number_format($orderTotal, 2);
@endphp

@section('content')
<div class="mt-3">
  <div class="row">
    <div class="col">
      <h3 class="m-0 text-center">Orders - Edit</h3>
    </div>
  </div>

  <div class="card my-4 p-3 shadow-sm">
    <div class="card-body col-lg-6 mx-auto">
      <form action="{{ route('orders.update', $order) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="row">
          <div class="col-6 mt-3">
            <p class="h5">Order Number: {{ $order->id }}</p>
          </div>

          <div class="col-12">
            <div class="form-group">
              <label>Customer</label>
              <input type="text" class="form-control" disabled value="{{ $order->customer->name }}">
            </div>
          </div>

          <div class="col-12 mt-3">
            <div class="form-group">
              <label>Shipping address</label>
              <select class="form-select" name="address_id">
                @foreach ($addresses as $address)
                <option value="{{ $address->id }}" @if ($address->id == $order->address_id) selected @endif>
                  {{ $address->address }}
                </option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-6 mt-3">
            <div class="form-group">
              <label>Payment Type</label>
              <select class="form-select" name="payment_type_id">
                <option value="1" @if ($order->payment_type_id == '1') selected @endif>Cash</option>
                <option value="2" @if ($order->payment_type_id == '2') selected @endif>Credit Card</option>
                <option value="3" @if ($order->payment_type_id == '3') selected @endif>Check</option>
                <option value="4" @if ($order->payment_type_id == '4') selected @endif>Other</option>
              </select>
            </div>
          </div>

          <div class="col-6 mt-3">
            <div class="form-group">
              <label>Order Total</label>
              <input type="text" class="form-control border-success" disabled value="{{ $orderTotal }}">
            </div>
          </div>

          <div class="col-12 mt-4 text-center">
            <button type="submit" class="btn btn-primary col-lg-3">
              <i class="fas fa-check me-2"></i>Save
            </button>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary col-lg-3">
              <i class="fas fa-times me-2"></i>Cancel
            </a>
          </div>

        </div>
      </form>
    </div>
  </div>

  <div class="row my-2">
    <div class="col">
      <h3 class="m-0">Order Detail</h3>
    </div>
    <div class="col d-flex flex-row-reverse">
      <a class="btn btn-sm btn-secondary px-3" onclick="showAddProduct()">
        <i class="fas fa-plus-circle me-2"></i>New product
      </a>
    </div>
  </div>

  <hr class="bg-primary" style="height: 2px; opacity: 0.5;">

  <div class="card my-4 p-3 border border-primary shadow-sm" id="div_add_product" style="display: none;">
    <div class="card-body">
      <form action="{{ route('details.store') }}" method="POST">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order->id }}">
        <h3 class="text-center">Add product to order</h3>
        <div class="row">

          <div class="col-6">
            <div class="form-group">
              <label>Product</label>
              <select class="form-select" name="product_id" id="product_id">
                <option value="0" data-price="0">Select a product</option>
                @foreach ($products as $product)
                <option value=" {{ $product->id }}" data-price="{{ $product->price }}">
                  {{ $product->description }}
                </option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-2">
            <div class="form-group">
              <label>Price</label>
              <input type="text" class="form-control" name="price" id="price" value="0">
            </div>
          </div>

          <div class="col-2">
            <div class="form-group">
              <label>Quantity</label>
              <input type="text" class="form-control" name="quantity" id="quantity" value="0">
            </div>
          </div>

          <div class="col-2">
            <div class="form-group">
              <label>Total</label>
              <input type="text" class="form-control" disabled id="total2" value="0">
              <input type="hidden" name="total" id="total" value="0">
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-12 mt-4 text-center">
            <button type="submit" class="btn btn-primary px-5 disabled" id="btn_add_submit">
              <i class="fas fa-check me-2"></i>Save
            </button>
            <a class="btn btn-secondary px-5" onclick="hideAddProduct()">
              <i class="fas fa-times me-2"></i>Cancel
            </a>
          </div>
        </div>
      </form>
    </div>
  </div>

  @if ( $details->count() == 0 )
  <div class="alert alert-warning" role="alert">
    <span>There are not products. Please </span>
    <a href="{{ route('details.create', $order) }}" class="">add an product</a>
  </div>
  @else
  <table id="details" class="display">
    <thead>
      <tr>
        <th>Product</th>
        <th class="text-end">Price</th>
        <th class="text-end">Quantity</th>
        <th class="text-end">Total</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($details as $detail)
      <tr>
        <td>{{ $detail->product->description }}</td>
        <td class="text-end">{{ $detail->price }}</td>
        <td class="text-end">{{ $detail->quantity }}</td>
        <td class="text-end">{{ $detail->total }}</td>
        <td class="text-center">
          <form action="{{ route('details.destroy', $detail) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('details.edit', $detail) }}" class="btn btn-primary btn-sm mx-1 disabled">
              <i class="fas fa-edit"></i>
            </a>
            <button type="submit" class="btn btn-danger btn-sm mx-1 disabled">
              <i class="fas fa-trash-alt"></i>
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <hr class="bg-black mt-1 mb-3" style="opacity: 1;">
  @endif

</div>
@endsection

@section('scripts')
<script type="text/javascript" defer>
  // DataTable
  $(document).ready(function() {
    $('#details').DataTable();
  });

  // Add product to order
  const addProduct = document.getElementById('div_add_product');
  const btnAddSubmit = document.getElementById('btn_add_submit');

  const product = document.getElementById('product_id');
  const price = document.getElementById('price');
  const quantity = document.getElementById('quantity');
  const total = document.getElementById('total');
  const total2 = document.getElementById('total2');

  product.addEventListener('change', changeProduct);
  price.addEventListener('change', calculateTotal);
  quantity.addEventListener('change', calculateTotal);

  function changeProduct() {
    let index = product.selectedIndex;
    price.value = product[index].dataset.price;
    quantity.value = '';
    quantity.focus();
    btnAddSubmit.classList.add('disabled');
  }

  function calculateTotal() {
    let priceValue = parseFloat(price.value);
    let quantityValue = parseFloat(quantity.value);
    let totalValue = 0;

    if (priceValue > 0 && quantityValue > 0) {
      totalValue = priceValue * quantityValue;
      total.value = totalValue;
      total2.value = totalValue;
      btnAddSubmit.classList.remove('disabled');
    } else {
      btnAddSubmit.classList.add('disabled');
    }
  }

  function showAddProduct() {
    addProduct.style.display = '';
  }

  function hideAddProduct() {
    addProduct.style.display = 'none';
  }
</script>
@endsection