@extends('layouts.web')

@php
$payment_type = ['', 'Cash', 'Credit card', 'Check', 'Other']
@endphp

@section('content')
<div class="mt-3">
  <div class="row">
    <div class="col">
      <h3 class="m-0">Orders</h3>
    </div>
  </div>

  <hr class="bg-primary" style="height: 2px; opacity: 0.5;">

  @if ( $orders->count() == 0 )
  <div class="alert alert-warning" role="alert">
    <span>There are not orders.</span>
  </div>
  @else
  <table id="orders" class="display">
    <thead>
      <tr>
        <th class="text-center">Id</th>
        <th>Date</th>
        <th>Customer</th>
        <th>Address</th>
        <th>Payment type</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $order)
      <tr>
        <td class="text-center">{{ $order->id }}</td>
        <!-- <td>{{ $order->created_at }}</td> -->
        <td>{{ date("m-j-Y", strtotime("$order->created_at"))  }}</td>
        <td>{{ $order->customer->name }}</td>
        <td>{{ $order->address->address }}</td>
        <td>{{ $payment_type[$order->payment_type_id] }}</td>
        <td class="text-center">
          <form action="{{ route('orders.destroy', $order) }}" method="POST" id="form_destroy">
            @csrf
            @method('DELETE')
            <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary btn-sm mx-1">
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
  // DataTable
  $(document).ready(function() {
    $('#orders').DataTable();
  });

  // Confirm before delete
  const formDestroy = document.getElementById('form_destroy');

  function validDestroy() {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        formDestroy.submit();
      }
    })
  }
</script>
@endsection