@extends('layouts.web')

@section('content')
<div class="mt-3">
  <div class="row">
    <div class="col">
      <h3 class="m-0 text-center">Address - Create</h3>
    </div>
  </div>

  <div class="card col-lg-6 mx-auto my-4 p-3 shadow">
    <div class="card-body">
      <form action="{{ route('addresses.store') }}" method="POST">
        @csrf
        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label>Street and number</label>
              <input type="text" name="address" class="form-control" required="true" value="{{ old('address') }}">
            </div>
          </div>

          <div class="col-12 mt-3">
            <div class="form-group">
              <label>City</label>
              <input type="text" name="city" class="form-control" required="true" value="{{ old('city') }}">
            </div>
          </div>

          <div class="col-7 mt-3">
            <div class="form-group">
              <label>State</label>
              <input type="text" name="state" class="form-control" required="true" value="{{ old('state') }}">
            </div>
          </div>

          <div class="col-7 mt-3">
            <div class="form-group">
              <label>Zip code</label>
              <input type="text" name="zip" class="form-control" required="true" value="{{ old('zip') }}">
            </div>
          </div>

          <div class="col-12 mt-3">
            <div class="form-group">
              <label>Country</label>
              <input type="text" name="country" class="form-control" required="true" value="{{ old('country') }}">
            </div>
          </div>

          <div class="col-12 mt-4 text-center">
            <button type="submit" class="btn btn-primary col-lg-3">
              <i class="fas fa-check me-2"></i>Save
            </button>
            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-secondary col-lg-3">
              <i class="fas fa-times me-2"></i>Cancel
            </a>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>
@endsection
