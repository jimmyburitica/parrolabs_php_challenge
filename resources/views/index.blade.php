@extends('layouts.web')

@section('content')
<div class="mt-0">

  <div class="row p-5">
    <div class="col">
      <h1 class="text-center">PHP Developer Challenge</h1>
      <h3 class="text-center">Jimmy Buriticá</h3>
    </div>
  </div>
  <h3 class="text-center" style="opacity: 0.5; color: rgb(0, 84, 158);">Powered By</h3>
  <hr class="col-lg-3 mx-auto mt-0" style="background-color: rgb(0, 84, 158); height: 3px; opacity: 1;">
  <!-- <h2 class="text-center border-bottom border-primary">Technology</h2> -->
  <div class="col-lg-8 offset-lg-2 my-5">
    <div class="row">
      <div class="col-4 my-auto">
        <img src="{{ asset('img/php8.png') }}" alt="PHP 8">
      </div>
      <div class="col-4 my-auto">
        <img src="{{ asset('img/laravel9.png') }}" alt="Laravel">
      </div>
      <div class="col-4 my-auto">
        <img src="{{ asset('img/mariadb.png') }}" alt="Maria DB">
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-3 my-auto">
        <img src="{{ asset('img/sweetalert2.png') }}" alt="Sweet Alert 2">
      </div>
      <div class="col-3 my-auto">
        <img src="{{ asset('img/bootstrap.png') }}" alt="Bootstrap">
      </div>
      <div class="col-3 my-auto">
        <img src="{{ asset('img/fontawesome.png') }}" alt="Font Awesome">
      </div>
      <div class="col-3 my-auto">
        <img src="{{ asset('img/datatables.png') }}" alt="Data Tables">
      </div>
    </div>
  </div>

</div>
@endsection