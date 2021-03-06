<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ env('APP_NAME', 'ArKa::Shortener')}}</title>
  <link rel="shortcut icon" href="{{ asset('img/icon.png')}}" type="image/x-icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('css/fontawesome.css')}}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  
  <livewire:scripts />
  <livewire:styles />
  <script src="{{ asset('js/turbolinks-0.1.0.js') }}" data-turbolinks-eval="false"></script>

  <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            
            @include('layouts.includes.navbar')

            @include('layouts.includes.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1> @yield('title') </h1>
                    </div>
                    @yield('content')
                </section>
            </div>

            @yield('modals')

            @include('layouts.includes.footer')

        </div>
    </div>
</body>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    @yield('scripts')

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>

    <!-- Page Specific JS File -->

</html>
