<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="robots" content="noindex, nofollow">
  <title>@yield('page_title')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
  <link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}?ver={{ config('app.version') }}">
  @stack('header')
</head>
<body>
  <div class="login_wrapper bg-light">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="login_contents">
          <div class="login_form">
            <div class="logo text-center pb-4">
              {{ config('app.name') }}
            </div>
            @yield('content')
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{ asset('assets/backend/js/jquery-3.6.1.min.js') }}"></script>
  @stack('footer')
  <script>
    $(function(){
      $('form').submit(function(){
        if ($(this).valid()) {
          $("button[type='submit']:not(.ignore-loading)", this).text("{{ __('Please wait') }}...").attr('disabled', 'disabled');
          $("input[type='submit']:not(.ignore-loading)", this).val("{{ __('Please wait') }}...").attr('disabled', 'disabled');
          return true;
        }
      });
    });
  </script>
</body>
</html>
