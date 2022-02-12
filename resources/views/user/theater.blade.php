@extends('user.base')

@section('style')
    <link rel="stylesheet" href="{{ url('Style/css/teater.css') }}">

@endsection

@section('content')

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

@endsection
