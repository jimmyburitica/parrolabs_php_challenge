@extends('layouts.web')

@section('content')
<div class="mt-3">
  <div class="row">
    <div class="col">
      <h3 class="m-0 text-center">Customers - Create</h3>
    </div>
  </div>

  <div class="card col-lg-6 mx-auto my-4 p-3 shadow">
    <div class="card-body">
      <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <input type="hidden" name="shipping_address_id" value="0">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control" required="true" value="{{ old('name') }}">
            </div>
          </div>

          <div class="col-7 mt-3">
            <div class="form-group">
              <label>Phone</label>
              <input type="text" name="phone" class="form-control" required="true" value="{{ old('phone') }}">
            </div>
          </div>

          <div class="col-7 mt-3">
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required="true" value="{{ old('email') }}">
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
