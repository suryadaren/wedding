<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{config('app.name')}} | Home</title>
    <link rel="stylesheet" href="/asset/css/owl.carousel.min.css">
    <link rel="shortcut icon" href="/asset/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="/asset/css/slick.css">
    <link rel="stylesheet" href="/asset/css/slick-theme.css">
    <link rel="stylesheet" href="/asset/css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="/asset/css/style.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrappage">
        <header id="header" class="header-v4 header-top-absolute">
            <div class="container">
                <div class="row">
                    <div class="vow-topbar">
                        <div class="topbar-left v4 hidden-xs hidden-sm">
                            <div class="vow-icon-menu v4 js-menu hidden-xs hidden-sm">
                                <span class="vow-iconbar"></span>
                                <span class="vow-iconbar"></span>
                                <span class="vow-iconbar"></span>
                            </div>
                        </div>
                        <div class="topbar-right">
                            <div class="logo v4"><a href="#"><img src="/asset/img/vow-text-logo.png" alt="logo"></a></div>
                            <button type="button" class="navbar-toggle vow-icon-menu v4 js-menu icon-mobile hidden-lg hidden-md" data-toggle="collapse" data-target="#myNavbar">
                                <span class="vow-iconbar"></span>
                                <span class="vow-iconbar"></span>
                                <span class="vow-iconbar"></span>
                            </button>
                        </div>
                    </div>
                    <div class="vow-bottom">
                            
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
        <div class="wrapper-slider">
            <div class="slider-home4 js-slider-home4">
                <div class="slider-img">
                    <img src="/asset/img/slider/h4_slide_1.jpg" alt="" class="img-responsive">
                    <div class="slider-content">
                        <div class="container">
                            <h3>New arrivals</h3>
                        </div>
                    </div>
                </div>
                <div class="slider-img">
                    <img src="/asset/img/slider/h4_slide_1.jpg" alt="" class="img-responsive">
                    <div class="slider-content">
                        <div class="container">
                            <h3>New arrivals</h3>
                        </div>
                    </div>
                </div>
                <div class="slider-img">
                    <img src="/asset/img/slider/h4_slide_1.jpg" alt="" class="img-responsive">
                    <div class="slider-content">
                        <div class="container">
                            <h3>New arrivals</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="rotate">
                <div class="container container-rotate">
                    <div class="custom v2">
                        <div class="pagingInfo"></div>
                         <div class="post-fade">
                         </div>
                         
                     </div>
                </div> 
            </div>
        </div>
        <div class="collection-ver3">
            <div class="flex-group">
                <div class="flex-row">
                    <a href="#" class="effect_img img-colect">
                        <img src="/asset/img/collection/h4_colect1.jpg" alt="" class="img-responsive">
                        <div class="colect-content v3">
                            <h3>PARADISE FOUND</h3>
                            <p>first the packing, then the <i>bliss</i></p>
                        </div>
                    </a>
                    <a href="#" class="hover-images flex-items">
                        <img src="/asset/img/collection/h4_colect2.jpg" alt="" class="img-responsive">
                    </a>
                </div>
                <div class="flex-row">
                    <a href="#" class="hover-images img-colect">
                        <img src="/asset/img/collection/h4_colect3.jpg" alt="" class="img-responsive">
                        <div class="colect-content vertical-text">
                            <h3>accessories</h3>
                        </div>
                    </a>
                    <a href="#" class="effect_img img-colect">
                        <img src="/asset/img/collection/h4_colect4.jpg" alt="" class="img-responsive">
                        <div class="colect-content v4">
                            <h3>Day dresses</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="essential">
                <a href="#" class="hover-images"><img src="/asset/img/collection/c_1.jpg" alt=""></a>
                <div class="content">
                    <h3 class="title">HONEYMOON ESSENTIALS</h3>
                    <p class="desc">Tuck a flower by your ear and drink in the lazy</p>
                </div>
            </div>
        </div>
        <div class="container essential-ver2">
            <div class="essential-img h4-colect-ovl">
                <a href="#" class="hover-images"><img src="/asset/img/collection/h4_colect5.jpg" alt=""></a>
                <a href="#" class="hover-images"><img src="/asset/img/collection/h4_colect6.jpg" alt=""></a>
            </div>
            <div class="content">
                <h3 class="title">Limited autumn collection</h3>
                <p class="desc">Urban collection for women compose contemporary inspiration and elegant sophisticated shapes.</p>
            </div>
        </div>

        <div class="featured-product">
            <div class="container">
                <h3 class="vow-title">Wedding Orginizer for You</h3>
                <div class="row">
                    @foreach($wedding_organizer as $wo)
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item">
                        <div class="product-img v2">
                            <a class="hover-images" href="#"><img src="{{Storage::url($wo->foto_profil)}}" alt="" class="img-reponsive"></a>
                            <div class="overlay-img box-content-center hover-price">
                                <div class="product-price inovl">
                                    <p class="price-n text-center">
                                        @if(count($wo->reviews) == 0)
                                        <i>belum ada review</i>
                                        @elseif($wo->rating == 0)
                                            <i>{{$wo->rating}}</i>
                                        @elseif($wo->rating > 0 && $wo->rating < 1)
                                            <i class="fa fa-star-half"></i>
                                            <br>
                                            <i>{{$wo->rating}}</i>
                                        @elseif($wo->rating == 1)
                                            <i class="fa fa-star"></i>
                                            <br>
                                            <i>{{$wo->rating}}</i>
                                        @elseif($wo->rating > 1 && $wo->rating <2)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <br>
                                            <i>{{$wo->rating}}</i>
                                        @elseif($wo->rating == 2)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <br>
                                            <i>{{$wo->rating}}</i>
                                        @elseif($wo->rating > 2 && $wo->rating <3)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <br>
                                            <i>{{$wo->rating}}</i>
                                        @elseif($wo->rating == 3)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <br>
                                            <i>{{$wo->rating}}</i>
                                        @elseif($wo->rating > 3 && $wo->rating <4)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <br>
                                            <i>{{$wo->rating}}</i>
                                        @elseif($wo->rating == 4)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <br>
                                            <i>{{$wo->rating}}</i>
                                        @elseif($wo->rating > 4 && $wo->rating <5)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <br>
                                            <i>{{$wo->rating}}</i>
                                        @elseif($wo->rating == 5)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <br>
                                            <i>{{$wo->rating}}</i>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="product-info v2 text-center">
                            <h3 class="product-title"><a href="/informasi_perusahaan/{{$wo->id}}">Brid in the Cage 299pln</a></h3>
                            <div class="product-price">
                                <p class="price-n"><i class="fa fa-map-marker"></i> {{$wo->alamat}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <footer class="footer-v4 bg-v4">
        <div class="container">
            <div class="row">
                <span>Copyright © 2018 EngoTheme. All Rights Reserved</span>
                <div class="footer-left">
                    <ul class="footer-menu">
                        <li><a href="#">Newsletter</a></li>
                        <li><a href="/asset/contact.html">Contact</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                    <div class="f-social-menu">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
    <script src="/asset/js/jquery.js"></script>
    <script src="/asset/js/bootstrap.js"></script>
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
</body>

</html>