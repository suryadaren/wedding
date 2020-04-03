<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    
    
    <title>{{config('app.name')}} | Home @yield('title')</title>
    
    <link rel="stylesheet" href="/asset/css/owl.carousel.min.css">
    <link rel="shortcut icon" href="/asset/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="/asset/css/slick.css">
    <link rel="stylesheet" href="/asset/css/slick-theme.css">
    <link rel="stylesheet" href="/asset/css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="/asset/css/style.css">
    <link rel="stylesheet" type="text/css" href="/asset/css/style1.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    @yield('css')
</head>

<body>
    <div class="wrappage">
    <header id="header" class="header-v2 box-shawdow">
            <div class="container container-75">
                <div class="vow-topbar v2">
                    <div class="topbar-left hidden-xs hidden-sm">
                    </div>
                    <div class="topbar-right">
                        <div class="logo v2"><a href="#"><img src="/asset/img/vow-logo.png" alt="logo"></a></div>
                        <div class="vow-icon-menu v2 js-menu hidden-xs hidden-sm">
                            <span class="vow-iconbar"></span>
                            <span class="vow-iconbar"></span>
                            <span class="vow-iconbar"></span>
                        </div>
                        <button type="button" class="navbar-toggle vow-icon-menu v4 js-menu icon-mobile hidden-lg hidden-md" data-toggle="collapse" data-target="#myNavbar">
                            <span class="vow-iconbar"></span>
                            <span class="vow-iconbar"></span>
                            <span class="vow-iconbar"></span>
                        </button>
                        <nav class="main-menu v2 js-open-menu">
                            <div class="collapse navbar-collapse" id="myNavbar">
                                <ul class="nav navbar-nav js-menubar">
                                    <li class="level1 active dropdown"><a href="/">Home</a>
                                    </li>
                                    @if(auth()->guard('customer')->check())
                                        <li class="level1 dropdown hassub"><a href="/customer">My Page</a>
                                        </li>
                                        <li class="level1 dropdown hassub"><a href="/customer/logout">logout</a>
                                        </li>
                                    @else
                                        <li class="level1 active dropdown">
                                            <a href="/register">Register</a>
                                        </li>
                                        <li class="level1 dropdown hassub"><a href="/login">Login</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
    </header>
        <!-- content-->

    @yield('content')

    <!-- end content-->
    <footer class="footer-v1">
        <a href="#" class="scroll-top v2"><i class="ion-ios-arrow-up"></i></a>
        <div class="copyright v3 bg-v2">
            <div class="container">
                <div class="row">
                    <span>Copyright © 2020 Wedding.co. All Rights Reserved</span>
                    <ul class="footer-menu">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Contact information</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <script src="/asset/js/jquery.js"></script>
    <script src="/asset/js/bootstrap.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/asset/js/owl.carousel.min.js"></script>
    <script src="/asset/js/slick.min.js"></script>
    <script src="/asset/js/main.js"></script>
    
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
      @if(Session::has('message'))
        var type="{{Session::get('alert-type','success')}}"
      
        switch(type){
          case 'success':
           toastr.info("{{ Session::get('message') }}");
           break;
        case 'error':
          toastr.error("{{ Session::get('message') }}");
          break;
        }
      @endif
    </script>

    @yield('js')
</body>

</html>