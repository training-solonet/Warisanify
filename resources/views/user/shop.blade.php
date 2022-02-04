<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ url('Style/css/shoppp.css') }}">
    <script src="{{ url('Style/js/shop.js') }}" defer></script>
    <title>Shop</title>
</head>

<body>
<nav class="navbar">
        <a class="logo" href="home.php">Warisanify</a>
        <ul class="nav-list">
        <li><a class="link" href="/">Home</a></li>
        <li><a class="link" href="/home">Shop</a></li>
        <li><a class="link" href="/theater">Theater</a></li>
        <li><a class="link" href="/about">About</a></li>
            @if(Route::has('login'))
                @auth
                    <li class="dropdown" data-dropdown>
                        <img width="50" data-dropdown-link class="link" id="link" src="{{ url('Style/pict/profile.png') }}" alt="profil-icon">
                        <div class="dropdown-menu" id="dropdown-menu">
                            <div class="profile-grid">
                                <div class="dropdown-heading">Profile</div>
                                <div class="dropdown-link">
                                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="profile-pict" width="150">
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
                                    <div class="dropdown-link">
                                        <div class="cart-product-grid">
                                            <img src="{{ url('Style/pict/wayang.png') }}" width="50" alt="">
                                            <div class="cart-content">
                                                <p>Name : Wayang Kulit</p>
                                                <p>Qty : 6</p>
                                                <p>Price : Rp. 1.000.000</p>
                                            </div>
                                        </div>
                                        <div class="cart-product-grid">
                                            <img src="{{ url('Style/pict/wayang.png') }}" width="50" alt="">
                                            <div class="cart-content">
                                                <p>Name : Wayang Kulit</p>
                                                <p>Qty : 6</p>
                                                <p>Price : Rp. 1.000.000</p>
                                            </div>
                                        </div>
                                        <div class="cart-product-grid">
                                            <img src="{{ url('Style/pict/wayang.png') }}" width="50" alt="">
                                            <div class="cart-content">
                                                <p>Name : Wayang Kulit</p>
                                                <p>Qty : 6</p>
                                                <p>Price : Rp. 1.000.000</p>
                                            </div>
                                        </div>

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
                                        


                                        <a href="#">Previous</a>
                                        <a href="#">Next</a> 
                                    </div>
                                </div>
                            </div>

                            <div class="button-grid">
                                <a href=""><button class="profile-button editProfileButton">Edit Profile</button></a>
                                <a href="{{ route('logout') }}"><button class="profile-button logoutButton">Logout</button></a>
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

    <div class="right">
            <div class="cart">
                <img src="{{ url('Style/pict/shopping-cart.png') }}" alt="" srcset="">
            </div>
        </div>
</section>

<section class="main-content">

    @foreach($products as $product )
    <div class="card">
        <img src="{{ url('Style/pict/wayang.png') }}" alt="">
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
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
</body>

</html>
