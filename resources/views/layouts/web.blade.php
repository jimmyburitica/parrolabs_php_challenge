<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parrolabs Challenge</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Bootstrap v5.1.3 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- FontAwesome v6.1.1 -->
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">

  <!-- DataTables v1.11.5 -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <!-- SweetAlert2 v11.4.7 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="d-flex flex-column h-100">
  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('img/logo.png') }}" alt="" width="154" height="41">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav me-auto mb-2 mb-lg-0"></div>
        <div class="navbar-nav d-flex">
          <a class="nav-link text-primary pe-lg-4" href="{{ route('home') }}">Home</a>
          <a class="nav-link text-primary px-lg-4" href="{{ route('customers.index') }}">Customers</a>
          <a class="nav-link text-primary px-lg-4" href="{{ route('products.index') }}">Products</a>
          <a class="nav-link text-primary ps-lg-4" href="{{ route('orders.index') }}">Orders</a>
          <!-- @auth
          <a class="nav-link text-primary px-lg-4" href="{{ url('logout') }}">Login</a>
          @else
          <a class="nav-link text-primary px-lg-4" href="{{ url('login') }}">Login</a>
          <a class="nav-link text-primary ps-lg-4" href="{{ url('register') }}">Register</a>
          @endif -->
        </div>
      </div>
    </div>
  </nav>

  <main class="container">
    @if ( session()->get('success') )
    <script type="text/javascript">
      Swal.fire({
        title: "{{ session()->get('success') }}",
        icon: "{{ session()->get('type') }}"
      });
    </script>
    @endif

    @if ( $errors->any() )
    <div class="alert alert-danger container" role="alert">
      <h3>An error has occurred</h3>
      <ul>
        @foreach ( $errors->all() as $error )
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    @yield('content')
  </main>

  <footer class="footer mt-auto py-3 text-white" style="background-color: rgb(0, 84, 158);">
    <div class="container">
      <div class="row">
        <div class="col">
          PHP Developer Challenge
        </div>
        <div class="col text-end">
          Jimmy Buriticá
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  @yield('scripts')
</body>

</html>