<!-- Hero section START -->
    <section class="hero">
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

        <div class="hero-text">
            <h1>Lorem Ipsum dolor</h1>
            <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.</h3>
        </div>

    </section>
    <!-- Hero section END -->


<!-- Hero section START -->
<!-- <section class="hero">
    <nav class="navbar">
        <div class="logo">
            <a href="/">Warisanify</a>
        </div>

        <ul class="nav-list">
            <li><a href="/">Home</a></li>
            <li><a href="/home">Shop</a></li>
            <li><a href="/theater">Theater</a></li>
            <li><a href="/about">About</a></li>

            @if(Route::has('login'))
                @auth
                    @if(Auth::user()->role === 'admin')
                    <li>{{ Auth::user()->name }}</li>
                    <li><a href="">Dashboard</a></li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button>logout</button>
                    </form>
                    @else
                    <li><a href="">{{ Auth::user()->name }}</a></li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button>logout</button>
                    </form>
                    @endif
                @else
                    <li><a href="{{ route('login') }}">login</a></li>
                    <li><a href="{{ route('register') }}">register</a></li>
                @endif
            @endif
        </ul>
    </nav>

    <div class="hero-text">
        <h1>Lorem Ipsum dolor</h1>
        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua.</h3>
    </div>

</section> -->
<!-- Hero section END -->