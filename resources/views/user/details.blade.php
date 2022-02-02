<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="{{ url('multikart/assets/images/favicon/1.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('multikart/assets/images/favicon/1.png') }}" type="image/x-icon">
    <title>Detail Product</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" integrity="sha512-gRH0EcIcYBFkQTnbpO8k0WlsD20x5VzjhOA1Og8+ZUAhcMUCvd+APD35FJw3GzHAP3e+mP28YcDJxVr745loHw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/vendors/slick-theme.css') }}">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/vendors/animate.css') }}">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/vendors/themify-icons.css') }}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/vendors/bootstrap.css') }}">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ url('vendor/sweetalert2/sweetalert2.min.css') }}">
</head>
<body>
<h1>Detail Product</h1>
<ul>

<!-- header start -->
<header>
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                        <ul>
                            <li>Selamat Datang Di Toko Kami</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>Hubungi Kami: 0271-0213-232</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 text-end">
                    @if (Auth::user())
                    <ul class="header-dropdown">
                        <li class="onhover-dropdown mobile-account"> <i class="fa fa-user" aria-hidden="true"></i>
                            {{ Auth::user()->name }}
                            <ul class="onhover-show-div">
                                <li><a href="/user/profile">Profile</a></li>
                                <li><a href="{{ route('login') }}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    @else   
                    <ul class="header-dropdown">
                        <li class="onhover-dropdown mobile-account"> <i class="fa fa-user" aria-hidden="true"></i>
                            Akun
                            <ul class="onhover-show-div">
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            </ul>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">
                    <div class="menu-left">
                        <div class="navbar">
                            <a href="javascript:void(0)" onclick="openNav()">
                                <div class="bar-style"><i class="fa fa-bars sidebar-bar" aria-hidden="true"></i>
                                </div>
                            </a>
                            <div id="mySidenav" class="sidenav">
                                <a href="javascript:void(0)" class="sidebar-overlay" onclick="closeNav()"></a>
                                <nav>
                                    <div onclick="closeNav()">
                                        <div class="sidebar-back text-start"><i class="fa fa-angle-left pe-2"
                                                aria-hidden="true"></i> Back</div>
                                    </div>
                                    <ul id="sub-menu" class="sm pixelstrap sm-vertical">
                                        <li><a href="#">kitchen</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="brand-logo">
                            <a href="{{ route('home.index') }}"><img src="{{ url('multikart/assets/images/icon/logo.png') }}"
                                    class="img-fluid blur-up lazyload" alt=""></a>
                        </div>
                    </div>
                    <div class="menu-right pull-right">
                        <div>
                            <nav id="main-nav">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                                aria-hidden="true"></i></div>
                                    </li>
                                    <li><a href="/">Home</a></li>
                                    <li>
                                        <a href="#">Promo Terbaru</a>
                                    </li>
                                    <li>
                                        <a href="#">Tentang Kami</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div>
                            <div class="icon-nav">
                                <ul>
                                    <li class="onhover-div mobile-search">
                                        <div><img src="" onclick="openSearch()"
                                                class="img-fluid blur-up lazyload" alt=""> <i class="ti-search"
                                                onclick="openSearch()"></i></div>
                                        <div id="search-overlay" class="search-overlay">
                                            <div> <span class="closebtn" onclick="closeSearch()"
                                                    title="Close Overlay">×</span>
                                                <div class="overlay-content">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <form action="{{ route('home.index') }}" method="GET">
                                                                    <div class="form-group">
                                                                        <input type="text" name="search" class="form-control"
                                                                            id="exampleInputPassword1"
                                                                            placeholder="Search a Product">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary"><i
                                                                            class="fa fa-search"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="onhover-div mobile-cart">
                                        <div><img src="{{ url('multikart/assets/images/icon/cart.png') }}"
                                                class="img-fluid blur-up lazyload" alt=""> <i
                                                class="ti-shopping-cart"></i></div>
                                        <span id="cart_qty_product" class="cart_qty_cls">0</span>
                                        <ul class="show-div shopping-cart">

                                            <div id="class-keranjang">
                                                    
                                            </div>

                                            <li>
                                                <div class="total">
                                                    <h5>subtotal : Rp. <span id="cart_total">0</span></h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="buttons"><a href="{{ route('cart.index') }}" class="view-cart">Lihat Keranjang</a> <a href="{{ route('checkout.index') }}" class="checkout">Checkout</a></div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->
<ul style="display: flex; flex-direction: column;">
    <li>
        <img width="50" src="{{ url('Assets/images/')}}/{{$product->image}}" alt="">
    </li>
    <li>
        Name : {{ $product->name }}
    </li>
    {{-- <li>
        Category : {{ $product->categories['name'] }}
    </li> --}}
    <li>
        Stock : {{ $product->quantity }}
    </li>
    <li>
        Price : <span id="price_product">{{ number_format($product->regular_price) }}</span>
    </li>
    <li>
        Discount : <span id="discount_product"></span>
    </li>
    <li>
        Short Desc : {{ $product->short_desc }}
    </li>
    <li>
        <form id="form" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
            <input name="qty" type="number" value="1" min="1">
            @if(Auth::user())
            <button type="button" onclick="addToCart()">Add to cart</button>
            @else
            <a href="{{ route('login') }}">
                <button type="button">Add to cart</button>
            </a>
            @endif
        </form>
    </li>
</ul>

<h1>Popular Product</h1>
<ul>
    @foreach ($popular_products as $popularProduct)
    <li>
        <img width="50" src="{{ url('Assets/images/')}}/{{$popularProduct->image}}" alt="">
    </li>
    <li>
        Name : <a href="">{{ $popularProduct->name }}</a>
    </li>
    <li>
        Stock : {{ $popularProduct->quantity }}
    </li>
    <li>
        Price : {{ $popularProduct->regular_price }}
    </li>
    <li>
        Short Desc : {{ $popularProduct->short_desc }}
    </li>
    <li>
        <a href=""></a>
    </li>
    @endforeach
</ul>

<h1>Related Product</h1>
<ul>
    @foreach ($related_products as $relatedProduct)
    <li>
        <img width="50" src="{{ url('Assets/images/')}}/{{$relatedProduct->image}}" alt="">
    </li>
    <li>
        Name : <a href="">{{ $relatedProduct->name }}</a>
    </li>
    <li>
        Stock : {{ $relatedProduct->quantity }}
    </li>
    <li>
        Price : {{ $relatedProduct->regular_price }}
    </li>
    <li>
        Short Desc : {{ $relatedProduct->short_desc }}
    </li>
    <li>
        <a href=""></a>
    </li>
    @endforeach
</ul>


<div class="tap-top top-cls">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top end -->


    <!-- latest jquery-->
    <script src="{{ url('multikart/assets/js/jquery-3.3.1.min.js') }}"></script>

    <!-- fly cart ui jquery-->
    <script src="{{ url('multikart/assets/js/jquery-ui.min.js') }}"></script>

    <!-- exitintent jquery-->
    <script src="{{ url('multikart/assets/js/jquery.exitintent.js') }}"></script>
    <script src="{{ url('multikart/assets/js/exit.js') }}"></script>

    <!-- slick js-->
    <script src="{{ url('multikart/assets/js/slick.js') }}"></script>

    <!-- menu js-->
    <script src="{{ url('multikart/assets/js/menu.js') }}"></script>

    <!-- lazyload js-->
    <script src="{{ url('multikart/assets/js/lazysizes.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ url('multikart/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Bootstrap Notification js-->
    <script src="{{ url('multikart/assets/js/bootstrap-notify.min.js') }}"></script>

    <!-- Fly cart js-->
    <script src="{{ url('multikart/assets/js/fly-cart.js') }}"></script>

    <!-- Theme js-->
    <script src="{{ url('multikart/assets/js/script.js') }}"></script>

    <script src="{{ url('vendor/sweetalert2/sweetalert2.min.js')}}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js" integrity="sha512-3z5bMAV+N1OaSH+65z+E0YCCEzU8fycphTBaOWkvunH9EtfahAlcJqAVN2evyg0m7ipaACKoVk6S9H2mEewJWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(window).on('load', function () {
            setTimeout(function () {
                $('#exampleModal').modal('show');
            }, 2500);
        });

        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }

    </script>

    <script>
        let text  = "";
        let total = 0;

        $(document).ready(function() { 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            show_cart();
        });

        

        function show_cart(){
            $.ajax({
                url : "/cart/1",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    //reset variable
                    text = "";
                    total = 0;
                    //show cart
                    const cart = data;
                    $("#cart_qty_product").text(data.length);
                    cart.forEach(loopCart);
                    document.getElementById("class-keranjang").innerHTML = text;
                    $("#cart_total").number(total);
                    console.log(data);

                },
                error: function (jqXHR, textStatus , errorThrown) {
                    console.log(errorThrown);
                }
            });
        }
        
        function loopCart(item, index) {
            text += '<li><div class="media"><a href=""><img alt="" class="me-3" src="{{ url("Assets/images/warisan_1.png") }}"></a><div class="media-body"><a href="#"><h4>'+item.product.name+'</h4></a><h4><span>'+item.qty+' x Rp. '+item.product.regular_price+'</span></h4></div></div><div class="close-circle"><a href="#"><i onclick="remove_cart('+item.id+')" class="fa fa-times" aria-hidden="true"></i></a></div></li>';
            total += item.product.regular_price * item.qty;
        }


        function remove_cart(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
                },
            })
            swalWithBootstrapButtons.fire({
                title: 'Confirm !',
                text: "You'll delete data ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete !',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                $.ajax({
                    url : "/cart/" + id,
                    type: "DELETE",
                    dataType: "JSON",
                    success: function(data){
                        if(data.status){
                            sukses();
                            show_cart();
                            table.ajax.reload(null,false);
                            console.log(data);

                        }else{
                            console.log(data);
                        }
                    },
                    error: function (jqXHR, textStatus , errorThrown){ 
                        console.log(errorThrown);
                    }
                })
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Cancel',
                    'Data not deleted',
                    'error'
                )
                }
            })
        }
        

        function sukses() {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
                });
            Toast.fire({
                icon: 'success',
                title: 'Berhasil !'
            })
        }

        </script>

<script>
function addToCart(){
        $.ajax({
            url : "{{ route('cart.store') }}",
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data){
                sukses();
                show_cart();
            },
            error: function (jqXHR, textStatus , errorThrown){ 
                console.log(errorThrown);
            }
        });
    }
</script>
</body>
</html>
