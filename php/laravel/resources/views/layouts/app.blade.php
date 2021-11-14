<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width,initial-scale=1'>

    <title>{{config('app.name') . (isset($title) ? ' - ' . $title : '')}}</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a9ae183e88.js" crossorigin="anonymous"></script>
    @yield('head')
  </head>
  <body>
    @include('components.navbar')
    <div class="container my-4">
      <div class="row mb-4">
        <div class="col d-flex align-items-center justify-content-start">@yield('header-left')</div>
        <h1 class="col text-center">@yield('header-title')</h1>
        <div class="col d-flex align-items-center justify-content-end">@yield('header-right')</div>
      </div>
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if (session('error') || $errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          @if (session('error'))
            {{ session('error') }}
          @endif
          @if ($errors->any())
            <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
            </ul>
          @endif
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @yield('content')
    </div>
    <script src="/assets/js/main.js"></script>
    @yield('end-of-body')
  </body>
</html>