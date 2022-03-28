@extends('layouts.web')

@section('content')
<div class="mt-3">
  <div class="row">
    <div class="col">
      <h3 class="m-0 text-center">Products - Create</h3>
    </div>
  </div>

  <div class="card col-lg-6 mx-auto my-4 p-3 shadow">
    <div class="card-body">
      <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label>Description</label>
              <input type="text" name="description" class="form-control" required="true" value="{{ old('description') }}">
            </div>
          </div>

          <div class="col-7 mt-3">
            <div class="form-group">
              <label>Price</label>
              <input type="number" name="price" class="form-control" required="true" value="{{ old('price') }}">
            </div>
          </div>

          <div class="col-7 mt-3">
            <div class="form-group">
              <label>Weight</label>
              <input type="number" name="weight" class="form-control" required="true" value="{{ old('weight') }}">
            </div>
          </div>

          <div class="col-12 mt-4 text-center">
            <button type="submit" class="btn btn-primary col-lg-3">
              <i class="fas fa-check me-2"></i>Save
            </button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary col-lg-3">
              <i class="fas fa-times me-2"></i>Cancel
            </a>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>
@endsection