<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
            integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ url('Style/css/detail.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="{{ url('Style/js/detail.js') }}" defer></script>
        
        <title>Detail Product</title>
    </head>
    <body>
    <nav class="navbar">
    <a class="logo" href="home.php">Warisanify</a>
    <ul class="nav-list">
        <li><a class="link" href="/">Home</a></li>
        <li><a class="link" href="/home">Shop</a></li>
        <li><a class="link" href="/detail">Theater</a></li>
        <li><a class="link" href="#">About</a></li>
        @if(Route::has('login'))
            @auth
            <li class="dropdown" data-dropdown>
                <img width="50" data-dropdown-link class="link" id="link" src="{{ url('Style/pict/profile.png') }}" alt="">
                <div class="dropdown-menu" id="dropdown-menu">
                    <div class="profile-grid">
                        <div class="dropdown-heading">Profile</div>
                        <div class="dropdown-link">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="" width="150">
                            <div class="profile-content">
                                <p>Username : <a href="">{{ Auth::user()->name }}</a></p>
                                <p>Email : {{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>

                    <hr>
                    
                    <div class="information-grid">
                        <div class="cart-grid">
                            <a href="#" class="dropdown-heading">Cart</a>
                            <div class="dropdown-link" id="dropdown-link">
                        
                            </div>
                            <div class="cart-action">
                                <a href="#">Previous</a>
                                <a href="#">Next</a>
                            </div>
                        </div>
                        
                        <div class="theater-grid">
                            <a href="#" class="dropdown-heading">Theater Waiting</a>
                            <div class="dropdown-link">
                                <div class="theater-ticket-grid">
                                    <img src="{{ url('Style/pict/wayang.png') }}" width="50" alt="">
                                    <div class="ticket-content">
                                        <p>Title : Anoman Kobong</p>
                                        <p>Time : 18.00 - 22.00 WIB</p>
                                        <p><span style="color: green">LIVE</span></p>    
                                    </div>
                                </div>
                                <div class="theater-ticket-grid">
                                    <img src="{{ url('Style/pict/wayang.png') }}" width="50" alt="">
                                    <div class="ticket-content">
                                        <p>Title : Anoman Kobong</p>
                                        <p>Time : 18.00 - 22.00 WIB</p>
                                        <p><span style="color: green">LIVE</span></p>    
                                    </div>
                                </div>
                                <div class="theater-ticket-grid">
                                    <img src="{{ url('Style/pict/wayang.png') }}" width="50" alt="">
                                    <div class="ticket-content">
                                        <p>Title : Anoman Kobong</p>
                                        <p>Time : 18.00 - 22.00 WIB</p>
                                        <p><span style="color: green">LIVE</span></p>    
                                    </div>
                                </div>                             
                            </div>
                            <div class="theater-action">
                                <a href="#">Previous</a>
                                <a href="#">Next</a>
                            </div>
                        </div>
                    </div>

                    <div class="button-grid">
                        <a href=""><button class="profile-button editProfileButton">Edit Profile</button></a>
                        <a href=""><button class="profile-button logoutButton">Logout</button></a>
                    </div>
                </div>
            </li>
            @else
                <li class="dropdown admin-section" data-dropdown>
                    <img width="50" data-dropdown-link class="link" id="link" src="{{ url('Style/pict/profile.png') }}" alt="profil-icon">
                    <div class="dropdown-menu" id="dropdown-menu">
                        <a href="{{ route('login') }}">login</a>                              
                    </div>
                </li>
            @endif
        @endif
    </ul>
    
    

    <div class="hamburger">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
</nav>

        <section class="main">
            
            <div class="product-detail">
                <div class="image-product">
                    <img src="{{ url('Assets/images') }}/{{ $product->image }}" width="100%" alt="">
                </div>
                
                <div class="right">
                    <div class="product-detail-content">
                        <h1 class="product-detail-name">
                            {{ $product->name }}
                        </h1>
                        <div class="product-detail-category">
                            <p>Category<pre> </pre></p><a href="">Wayang Kulit</a>
                        </div>
                            
                        <h1 class="product-detail-price">Rp. {{ number_format($product->regular_price) }}</h1>
        
                    </div>
        
                    <hr>

                    <form method="POST" id="form">
                        @csrf
                        @method('POST')
                        <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                        <div class="quantity-container">
                            <h2>Quantity</h2>
                            <div class="quantity-action">
                                <button class="minus-button">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <input type="number" name="qty" min="1" value="1" class="qty-input">
                                <button class="plus-button">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        @if(Auth::user())
                        <button type="button" class="add-to-cart-button" onclick="addToCart()">
                            Add To Cart
                        </button>
                        @else
                        <a href="{{ route('login') }}">
                            <button type="button">Add to cart</button>
                        </a>
                        @endif
                    </form>
                </div>

            </div>

            <div class="detail-content">
                <ul class="detail-content-heading">
                    <li onclick="changeDescription()"><h3 id="desc-head">Description</h3></li>
                    <li onclick="changeDetailProduct()"><h3 id="detail-head">Detail Product</h3></li>
                </ul>

                <hr>

                <div class="content" id="content">

                </div>
                <div class="description-content">
                    <p class="description-content-text">
                        {{ $product->short_desc }}
                    </p>
                </div>
                <div class="product-detail-information">
                    <div class="product-detail-information-text">
                        <ul class="product-detail-information-head">
                            <li>Dimension</li>
                            <li>Material</li>
                            <li>Weight</li>                    
                        </ul>
                        <ul>
                            <li>:</li>
                            <li>:</li>
                            <li>:</li>
                        </ul>
                        <ul>
                            <li>150cm x 20cm</li>
                            <li>Leather</li>
                            <li>200g</li>
                        </ul>
                    </div>
                </div>
            </div>

        </section>

        <footer class="footer">
            <div class="footer-content">
                <div class="footer-logo">
                    <a href="">Warisanify</a>
                </div>

                <div class="find-us">
                    <h1>Find Us</h1>
                    <ul class="find-us-list">
                        <li><a href="">warisanify.id</a></li>
                        <li><a href="">warisanify.id</a></li>
                        <li><a href="">warisanify.id</a></li>
                        <li><a href="">warisanify.id</a></li>
                    </ul>
                </div>

                <div class="contact-us">
                    <h1>Contact Us</h1>
                    <a href="">warisanify@gmail.com</a>
                </div>
            </div>
        </footer>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
        <script src="{{ url('vendor/sweetalert2/sweetalert2.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js" integrity="sha512-3z5bMAV+N1OaSH+65z+E0YCCEzU8fycphTBaOWkvunH9EtfahAlcJqAVN2evyg0m7ipaACKoVk6S9H2mEewJWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">


            const hamburger = document.querySelector(".hamburger");
            const navList = document.querySelector(".nav-list");
        
        
            hamburger.addEventListener("click", () => {
                hamburger.classList.toggle("active");
                navList.classList.toggle("active");
        
            })
        
            document.querySelectorAll(".nav-link").forEach(n=> n.addEventListener("click", () => {
                hamburger.classList.remove("active");
                navList.classList.remove("active");
            }))

    </script>

    <script>
        $(document).ready(function() { 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            show_cart();
            
            defaultContent = $('.description-content').html();
            $('#desc-head').addClass('active');
            $('#content').fadeOut(200, function() {
                $(this).html(defaultContent).fadeIn(200);
            });
        });

        function show_cart(){
            $.ajax({
                url : "/cart/1",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    //reset variable
                    console.log(data);
                    text = "";
                    total = 0;
                    //show cart
                    const cart = data;
                    cart.forEach(loopCart);
                    document.getElementById("dropdown-link").innerHTML = text;
                },
                error: function (jqXHR, textStatus , errorThrown) {
                    console.log(errorThrown);
                }
            });
        }

        function loopCart(item, index) {
            text += '<div class="cart-product-grid"><img src="{{ url("Assets/images") }}/'+ item.product.image+'" width="50" alt=""><div class="cart-content"><p>Name : ' + item.product.name + '</p><p>Qty : ' + item.qty + '</p><p>Price : Rp. ' + item.product.regular_price + '</p></div></div>';
        }

        function addToCart(){
            $.ajax({
                url : "{{ route('cart.store') }}",
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data){
                    console.log("berhasil")
                    sukses();
                    show_cart();
                },
                error: function (jqXHR, textStatus , errorThrown){ 
                    console.log(errorThrown);
                }
            });
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
</body>
</html>