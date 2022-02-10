<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ url('Style/css/shop.css') }}">
    <script src="{{ url('Style/js/shop.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>Shop</title>
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

<section class="helper">
    <div class="search">
        <form action="home" method="GET">
            <input name="search" type="text" placeholder="Search here">
            <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <div class="cart" id="cart" data-dropdown>
        <span class="qty-cart" id="qty-cart">0</span>
        <img class="link" src="{{ url('Style/pict/shopping-cart.png') }}" data-dropdown-link alt="cart-icon" width="50">
        <ul class="shopping-cart">
            <div id="shopping-cart">

            </div>

            <div class="prev-next">
                <a href="#">Previous</a>
                <a href="#">Next</a>
            </div>

            <li class="subtotal">
                <h5>Subtotal : Rp. <span id="cart_total">0</span></h5>
            </li>
            <li class="buttons-cart">        
                <a href="/cart" class="btn-show-cart">Show Cart</a>
                <a href="/checkout" class="btn-checkout">Checkout</a>                
            </li>
        </ul>
    </div>
</section>

<section class="main-content">

    @foreach($products as $product )
    <div class="card">
        <img src="{{ url('Assets/images')}}/{{ $product->image }}" alt="">
        <form class="view-detail" action="{{ route('home.show', $product->slug) }}" method="GET">
            @csrf
            <button class="view-link">View Detail</button>
        </form>
        <div class="card-content">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->category->name }}</p>
            <h2>Rp. {{ $product->regular_price }}</h2>
        </div>
    </div>
    @endforeach

    {{ $products->links() }}

    


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


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
                textW = "";
                totalW = 0;
                //show cart
                const cart = data;
                const cartW = data;
                $("#qty-cart").text(data.length);
                cart.forEach(loopCart);
                cartW.forEach(loopCartW);
                document.getElementById("dropdown-link").innerHTML = text;
                document.getElementById("shopping-cart").innerHTML = textW;
                $("#cart_total").number(totalW);
            },
            error: function (jqXHR, textStatus , errorThrown) {
                console.log(errorThrown);
            }
        });
    }

    function loopCart(item, index) {
        text += '<div class="cart-product-grid"><img src="{{ url("Assets/images") }}/'+ item.product.image+'" width="50" alt=""><div class="cart-content"><p>Name : ' + item.product.name + '</p><p>Qty : ' + item.qty + '</p><p>Price : Rp. ' + item.product.regular_price + '</p></div></div>';
    }

    function loopCartW(item, index) {
        textW += '<div class="cart-item"><img src="{{ url("Assets/images") }}/'+ item.product.image+'" width="" alt="cart-item"><div class="cart-item-content"><h3 class="cart-product-name">' + item.product.name + '</h3><h3 class="cart-product-category">' + item.product.name + '</h3><h3 class="cart-product-quantity">X <span>' + item.qty + '</span></h3><h2 class="cart-product-price">Rp. <span>' + item.product.regular_price + '</span></h2></div><div class="close-button"><i class="fa fa-times" onclick="remove_cart('+item.id+')" aria-hidden="true"></i></div></div>';
        totalW += item.product.regular_price * item.qty;
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
                            // table.ajax.reload(null,false);
                            console.log(data);

                        }else{
                            console.log("anying");
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
</body>

</html>
