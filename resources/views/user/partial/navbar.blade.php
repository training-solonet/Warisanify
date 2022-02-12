
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
                <img width="50" data-dropdown-link class="link" id="link" src="{{ url('Style/pict/profile.png') }}" alt="">
                <div class="dropdown-menu" id="dropdown-menu">
                    <div class="profile-grid">
                        <div class="dropdown-heading">Profile</div>
                        <div class="dropdown-link">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="" width="150">
                            <div class="profile-content">
                                <p>Username : <a href="profil">{{ Auth::user()->name }}</a></p>
                                <p>Email : {{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="information-grid">
                        <div class="cart-grid">
                            <a href="/cart" class="dropdown-heading">Cart</a>
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
                        <a href="/profil"><button class="profile-button editProfileButton">Edit Profile</button></a>
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


