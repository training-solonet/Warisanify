<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ url('css/shop.css') }}">
    <title>Shop</title>
</head>

<body>
    @if ($message = Session::get('success'))
    <script>
        alert('{{ $message }}');
    </script>
    @endif

</body>
    <nav class="navbar">
        <a class="logo" href="/">Warisanify</a>
        <ul class="nav-list">
            <li><a href="/">Home</a></li>
            <li><a href="/shop">Shop</a></li>
            <li><a href="/theater">Theater</a></li>
            <li><a href="/about">About</a></li>
        </ul>
    </nav>

    <section class="helper">
        <div class="search">
            <form action="shop" method="GET">
                <input name="search" type="text" placeholder="Search here">
                <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <div class="right">
            <div class="cart">
                <img src="{{ url('pict/shopping-cart.png') }}" alt="" srcset="">
            </div>

            <a href="">
                <div class="profil">
                    <div class="circle">
                        <img src="" alt="" srcset="">
                    </div>

                    <p>Username</p>
                </div>
            </a>
        </div>
    </section>

    <section class="main-content">

        @foreach ($barang as $dataBarang )
        <div class="card">
            <img src="{{ url('pict/wayang.png') }}" alt="">
            <div href="#" class="card-content">
                <h2>{{ $dataBarang->namaBarang }}</h2>
                <a href="#">{{ $dataBarang->kategori->namaKategori }}</a>
                <h2>Rp. {{ $dataBarang->harga }}</h2>
                <form method="POST" action="{{ route('add-to-cart.store') }}">
                    @csrf
                    <input type="hidden" name="id_barang" value="{{ $dataBarang->id }}">
                    <input value="1" type="number" name="jumlah_barang">
                    <button>Masuk Keranjang</button>
                </form>
            </div>
        </div>
        @endforeach



        {{-- <div class="card">
            <img src="{{ url('pict/wayang.png') }}" alt="">
            <div class="card-content">
                <h2>Nama Barang</h2>
                <p>Deskripsi barang disini</p>
                <h2>Rp. 1.200.000,00</h2>
            </div>
        </div>

        <div class="card">
            <img src="{{ url('pict/wayang.png') }}" alt="">
            <div class="card-content">
                <h2>Nama Barang</h2>
                <p>Deskripsi barang disini</p>
                <h2>Rp. 1.200.000,00</h2>
            </div>
        </div>

        <div class="card">
            <img src="{{ url('pict/wayang.png') }}" alt="">
            <div class="card-content">
                <h2>Nama Barang</h2>
                <p>Deskripsi barang disini</p>
                <h2>Rp. 1.200.000,00</h2>
            </div>
        </div>

        <div class="card">
            <img src="{{ url('pict/wayang.png') }}" alt="">
            <div class="card-content">
                <h2>Nama Barang</h2>
                <p>Deskripsi barang disini</p>
                <h2>Rp. 1.200.000,00</h2>
            </div>
        </div>

        <div class="card">
            <img src="{{ url('pict/wayang.png') }}" alt="">
            <div class="card-content">
                <h2>Nama Barang</h2>
                <p>Deskripsi barang disini</p>
                <h2>Rp. 1.200.000,00</h2>
            </div>
        </div> --}}
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
