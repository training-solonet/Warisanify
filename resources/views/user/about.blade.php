@extends('user.base')

@section('style')

    <link rel="stylesheet" href="{{ url('Style/css/About2.css') }}">

@endsection

@section('content')
<section class="hero">
        <div class="container">
            <center>
                <h1 class="title">
                    Profile
                </h1>
            </center>
            <div class="desc">
                <h1 class="title">Warisanify</h1>

                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Rerum necessitatibus, voluptatibus fugit earum dolorem aliquid
                    odit quis quia debitis expedita rem? Vero quae eum eos laboriosam
                    accusantium repellat, quisquam molestias ipsa odio voluptatum doloremque,
                    nesciunt placeat sint nulla facere corporis.</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae culpa,
                    soluta voluptates amet obcaecati eum sunt neque itaque quam nobis unde dolorem
                    expedita iste mollitia repellat error ratione ipsa! Nam, alias debitis! Ea tempore
                    numquam at debitis corporis repellat quisquam.</p>
            </div>

            <div class="slide">
                <img src="{{ url('Style/pict/slide.png') }}" width="100%" height="100%">

            </div>
        </div>
    </section>
@endsection
