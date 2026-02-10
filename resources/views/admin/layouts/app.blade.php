<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="robots" content="noindex, nofollow">
  <title>{{ $title }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
  <link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}?ver={{ config('app.version') }}">
  @stack('header')
</head>
<body>
  <div class="app_wrapper">
    <div class="mobile_menu_close" style="display:none;">
      <a href="javascript:;"><i class="las la-times"></i></a>
    </div>
    <div class="black_overlay" style="display:none;"></div>
    <div class="sidepanel">
      <div class="sidepanel_header">
        <div class="logo">{{ config('app.name') }}</div>
      </div>
      <div class="sidepanel_body">
        <ul class="sidebar_menu">
          <li><a href="{{ route('admin.dashboard') }}"><i class="las la-tachometer-alt"></i> {{ __('Dashboard') }}</a></li>

          @can('show-pages')
            <li><a href="{{ route('admin.pages.index') }}"><i class="las la-file-alt"></i> {{ __('Pages') }}</a></li>
          @endcan

          @can('show-category')
            <li><a href="{{ route('admin.categories.index') }}"><i class="las la-box"></i> {{ __('Categories') }}</a></li>
          @endcan

          @can('show-product')
            <li><a href="{{ route('admin.products.index') }}"><i class="las la-store"></i> {{ __('Products') }}</a></li>
          @endcan

          @can('show-settings')
            <li><a href="{{ route('admin.settings.index') }}"><i class="las la-cog"></i> {{ __('Settings') }}</a></li>
          @endcan

          @can('admin')
            <li class="hassub">
              <a href="javascript:;" class="parentmenu"><i class="las la-user"></i> {{ __('Admin Users') }}</a>
              <ul class="sub-menu">
                <li><a href="{{ route('admin.users.index') }}">{{ __('All Users') }}</a></li>
                <li><a href="{{ route('admin.roles.index') }}">{{ __('Roles') }}</a></li>
              </ul>
            </li>
          @endcan
        </ul>
      </div>
    </div>
    <div class="body_wrapper">
      <div class="header_wrapper">
        <div class="row">
          <div class="col-sm-4 col-3">
            <ul class="top_left">
              <li><a href="javascript:;" id="sidebarToggler"><i class="las la-bars"></i></a></li>
            </ul>
          </div>
          <div class="col-sm-8 col-9 text-end align-self-center">
            <ul class="top_right">
              <li class="d-none d-lg-inline-block">
                <a href="{{ config('app.url') }}" class="btn btn-primary" target="_blank">{{ __('Visit Website') }}</a>
              </li>
              <li class="d-none d-lg-inline-block">
                <a href="javascript:;" onclick="toggleFullScreen()"><i class="las la-expand"></i></a>
              </li>
              <li>
                <div class="dropdown profile_dropdown">
                  <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="short_username">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    <span>{{ auth()->user()->name }}</span>
                  </button>
                  <div class="dropdown-menu">
                    <ul>
                      <li><a class="dropdown-item" href="{{ route('admin.profile.index') }}"><i class="las la-user"></i> {{ __('Profile') }}</a></li>
                      <li><hr class="dropdown-divider"></li>

                      @can('show-settings')
                        <li><a class="dropdown-item" href="{{ route('admin.settings.index') }}"><i class="las la-cog"></i> {{ __('Settings') }}</a></li>
                      @endcan

                      <li>
                        <form class="d-inline" method="POST" action="{{ route('logout') }}">
                          @csrf
                          <button type="submit" class="dropdown-item"><i class="las la-sign-out-alt"></i> {{ __('Logout') }}</button>
                        </form>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      @yield('content')
    </div>
  </div>
  <script src="{{ asset('assets/backend/js/jquery-3.6.1.min.js') }}"></script>
  <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/backend/js/main.js') }}?ver={{ config('app.version') }}"></script>
  <script>
    $(window).scroll(function() {
      if (screen.width > 991) {
        if ($(this).scrollTop() > 100) {
          $('.menubar').addClass("sticky");
        } else {
          $('.menubar').removeClass("sticky");
        }
      } else {
        $('.menubar').removeClass("sticky");
      }
    });
    $(document).on("keydown", ".number", function(e){
      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        (e.keyCode === 67 && (e.ctrlKey === true || e.metaKey === true)) ||
        (e.keyCode === 86 && (e.ctrlKey === true || e.metaKey === true)) ||
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        return;
      }
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
      }
    });
    $(function(){
      $('form').submit(function(){
        if ($(this).valid()) {
          $("button[type='submit']:not(.ignore-loading)", this).text("{{ __('Please wait') }}...").attr('disabled', 'disabled');
          $("input[type='submit']:not(.ignore-loading)", this).val("{{ __('Please wait') }}...").attr('disabled', 'disabled');
          return true;
        }
      });
    });
    $(function() {
      $('.sidebar_menu li a[href="' + window.location.href + '"]').addClass('active');
      $('.sidebar_menu li a[href="' + window.location.href + '"]').closest('li.hassub').find('a.parentmenu').addClass('active').next('ul').addClass('show').show();
    });
  </script>
  @stack('footer')
</body>
</html>
