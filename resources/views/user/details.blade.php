@extends('user.base')

@section('style')

    <link rel="stylesheet" href="{{ url('Style/css/detail.css') }}">

@endsection

@section('content')

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
                        <button type="button" onclick="minQty()" class="minus-button">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <input type="number" name="qty" id="qty" min="1" value="1" class="qty-input">
                        <button type="button" onclick="plusQty()" class="plus-button">
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
                    <button type="button" class="add-to-cart-button">Add to cart</button>
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
@endsection
@section('srcipt')
    <script src="{{ url('Style/js/detail.js') }}"></script>
@endsection
