@extends('layouts.web')

@section('content')
<div class="mt-3">
  <div class="row">
    <div class="col">
      <h3 class="m-0 text-center">Orders - Create</h3>
    </div>
  </div>

  <div class="card col-lg-6 mx-auto my-4 p-3 shadow">
    <div class="card-body">
      <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label>Customer</label>
              <input type="text" class="form-control" disabled value="{{ $customer->name }}">
            </div>
          </div>

          <div class="col-12 mt-3">
            <div class="form-group">
              <label>Shipping address</label>
              <select class="form-select" name="address_id">
                @foreach ($addresses as $address)
                <option value="{{ $address->id }}" @if ($address->id == $customer->shipping_address_id) selected @endif>
                  {{ $address->address }}
                </option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-7 mt-3">
            <div class="form-group">
              <label>Payment Type</label>
              <select class="form-select" name="payment_type_id">
                <option value="1">Cash</option>
                <option value="2">Credit Card</option>
                <option value="3">Check</option>
                <option value="4">Other</option>
              </select>
            </div>
          </div>

          <div class="col-12 mt-4 text-center">
            <button type="submit" class="btn btn-primary col-lg-3">
              <i class="fas fa-check me-2"></i>Save
            </button>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary col-lg-3">
              <i class="fas fa-times me-2"></i>Cancel
            </a>
          </div>

        </div>
      </form>
    </div>
  </div>

</div>
@endsection