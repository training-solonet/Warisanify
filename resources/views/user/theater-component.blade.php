<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('Style/css/theater.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
    <title>Document</title>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="/">Warisanify</a>
        </div>

        <ul class="nav-list">
            <li><a href="/">Home</a></li>
            <li><a href="/home">Shop</a></li>
            <li><a href="/theater">Theater</a></li>
            <li><a href="/about">About</a></li>
            {{-- @if(Route::has('login'))
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
            @endif --}}
        </ul>
    </nav>
    <section class="body">
        <div class="hero">
            <div class="box-container">
                <div class="box"></div>
            </div>
            <div class="container desc">
                <div class="title-box">
                    <h1>Anoman Kobong</h1>
                </div>
                <div class="btn-getIt">
                    <h1>
                        <a href="" class="btn">Get it</a>
                    </h1>
                </div>
            </div>
            <div class="container time">
                <div class="list tanggal">
                    <p> <i class="fa-light fa-calendar"></i> DD / MM / YYYY</p>
                </div>
                <div class="list waktu">
                    <p><i class="fa-regular fa-clock"></i> 00.00 - 12.00 WIB</p>
                </div>
                <div class="list status">
                    <p> <i class="fa-regular fa-scrubber"></i> LIVE</p>
                </div>
            </div>
            <div class="container sinopsis">
                <h2>Sinopsis :</h2>

            </div>
        </div>
        <center><hr> </center>

        <div class="main-content">
            <div class="content">
                <div class="box-content">
                    <div class="box-model">
                    </div>
                    <div class="btn-getIt">
                            <h1>
                                <a href="" class="btn">Get it</a>
                            </h1>
                    </div>
                </div>
                <ul class="info">
                    <li> <h1>Anoman Kobong</h1> </li>
                    <li><p>Waktu</p></li>
                    <li><p>Nama Dalang</p></li>
                    <li><p>Sinopsis</p></li>
                </ul>
            </div>

            <div class="content">
                <div class="box-content">
                    <div class="box-model">
                    </div>
                    <div class="btn-getIt">
                            <h1>
                                <a href="" class="btn">Get it</a>
                            </h1>
                    </div>
                </div>
                <ul class="info">
                    <li> <h1>Anoman Kobong</h1> </li>
                    <li><p>Waktu</p></li>
                    <li><p>Nama Dalang</p></li>
                    <li><p>Sinopsis</p></li>
                </ul>
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
</body>
</html>
