@extends('layouts.web')

@section('content')
<div class="mt-3">
  <div class="row">
    <div class="col">
      <h3 class="m-0">Customers</h3>
    </div>
    <div class="col d-flex flex-row-reverse">
      <a href="{{ route('customers.create') }}" class="btn btn-sm btn-secondary px-3">
        <i class="fas fa-plus-circle me-2"></i>New customer
      </a>
    </div>
  </div>

  <hr class="bg-primary" style="height: 2px; opacity: 0.5;">

  @if ( $customers->count() == 0 )
  <div class="alert alert-warning" role="alert">
    <span>There are not customers. Please </span>
    <a href="{{ route('customers.create') }}" class="">add a new customer</a>
  </div>
  @else
  <table id="customers" class="display">
    <thead>
      <tr>
        <th class="text-center">Id</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($customers as $customer)
      <tr>
        <td class="text-center">{{ $customer->id }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->phone }}</td>
        <td>{{ $customer->email }}</td>
        <td class="text-center">
          <form action="{{ route('customers.destroy', $customer) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('orders.create', $customer) }}" class="btn btn-success btn-sm mx-1">
              <i class="fa-regular fa-file-lines"></i>
            </a>
            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary btn-sm mx-1">
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
    $('#customers').DataTable();
  });
</script>
@endsection