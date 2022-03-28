@extends('layouts.web')

@section('content')
<div class="mt-3">
  <div class="row">
    <div class="col">
      <h3 class="m-0 text-center">Customers - Edit</h3>
    </div>
  </div>

  <div class="card col-lg-6 mx-auto my-4 p-3 shadow">
    <div class="card-body">
      <form action="{{ route('customers.update', $customer) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control" required="true" value="{{ $customer->name }}">
            </div>
          </div>

          <div class="col-7 mt-3">
            <div class="form-group">
              <label>Phone</label>
              <input type="text" name="phone" class="form-control" required="true" value="{{ $customer->phone }}">
            </div>
          </div>

          <div class="col-7 mt-3">
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required="true" value="{{ $customer->email }}">
            </div>
          </div>

          <div class="col-12 mt-3">
            <div class="form-group">
              <label>Primary shipping address</label>
              @if ( $addresses->count() == 0 )
              <p>Please add a shipping address</p>
              @else
              <select class="form-select" name="shipping_address_id" id="shipping_address_id">
                @if ($customer->shipping_address_id == 0)
                <option value="0">Please select an address</option>
                @endif

                @foreach ($addresses as $address)
                <option value="{{ $address->id }}" @if ($address->id == $customer->shipping_address_id)
                  selected
                  @endif
                  >
                  {{ $address->address }}
                </option>
                @endforeach
              </select>
              @endif
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

  <div class="row my-2">
    <div class="col">
      <h3 class="m-0">Addresses</h3>
    </div>
    <div class="col d-flex flex-row-reverse">
      <a href="{{ route('addresses.create', $customer) }}" class="btn btn-sm btn-secondary px-3">
        <i class="fas fa-plus-circle me-2"></i>New address
      </a>
    </div>
  </div>

  @if ( $addresses->count() == 0 )
  <div class="alert alert-warning" role="alert">
    <span>There are not shipping addresses. Please </span>
    <a href="{{ route('addresses.create', $customer) }}" class="">add a new address</a>
  </div>
  @else
  <table id="addresses" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Street and number</th>
        <th>City</th>
        <th>State</th>
        <th>Zip code</th>
        <th>Country</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($addresses as $address)
      <tr>
        <td>{{ $address->address }}</td>
        <td>{{ $address->city }}</td>
        <td>{{ $address->state }}</td>
        <td>{{ $address->zip }}</td>
        <td>{{ $address->country }}</td>
        <td class="text-center">
          <form action="{{ route('addresses.destroy', $address) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('addresses.edit', $address) }}" class="btn btn-primary btn-sm mx-1 disabled">
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
  @endif

</div>
@endsection