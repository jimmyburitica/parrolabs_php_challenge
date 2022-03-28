@extends('layouts.web')

@section('content')
<div class="mt-3">
  <div class="row">
    <div class="col">
      <h3 class="m-0">Products</h3>
    </div>
    <div class="col d-flex flex-row-reverse">
      <a href="{{ route('products.create') }}" class="btn btn-sm btn-secondary px-3">
        <i class="fas fa-plus-circle me-2"></i>New product
      </a>
    </div>
  </div>

  <hr class="bg-primary" style="height: 2px; opacity: 0.5;">

  @if ( $products->count() == 0 )
  <div class="alert alert-warning" role="alert">
    <span>There are not products. Please </span>
    <a href="{{ route('products.create') }}" class="">add a new product</a>
  </div>
  @else
  <table id="products" class="display">
    <thead>
      <tr>
        <th class="text-center">Id</th>
        <th>Description</th>
        <th class="text-center">Price</th>
        <th class="text-center">Weight</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
        <td class="text-center">{{ $product->id }}</td>
        <td>{{ $product->description }}</td>
        <td class="text-end">{{ $product->price }}</td>
        <td class="text-end">{{ $product->weight }}</td>
        <td class="text-center">
          <form action="{{ route('products.destroy', $product) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm mx-1">
              <i class="fas fa-edit"></i>
            </a>
            <button type="submit" class="btn btn-danger btn-sm mx-1">
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
  $(document).ready(function() {
    $('#products').DataTable();
  });
</script>
@endsection