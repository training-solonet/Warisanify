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
                {{-- <input type="hidden" name="image" value="{{ $product->image }}"> --}}
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
<script>
//     $(document).ready(function() {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     show_cart();

//     defaultContent = $('.description-content').html();
//     $('#desc-head').addClass('active');
//     $('#content').fadeOut(200, function() {
//         $(this).html(defaultContent).fadeIn(200);
//     });
// });

    // function show_cart(){
    //     $.ajax({
    //         url : "/cart/1",
    //         type: "GET",
    //         dataType: "JSON",
    //         success: function(data) {
    //             //reset variable
    //             console.log(data);
    //             text = "";
    //             total = 0;
    //             //show cart
    //             const cart = data;
    //             cart.forEach(loopCart);
    //             document.getElementById("dropdown-link").innerHTML = text;
    //         },
    //         error: function (jqXHR, textStatus , errorThrown) {
    //             console.log(errorThrown);
    //         }
    //     });
    // }

    // function loopCart(item, index) {
    //     text += '<div class="cart-product-grid"><img src="{{ url("Assets/images") }}/'+ item.product.image+'" width="50" alt=""><div class="cart-content"><p>Name : ' + item.product.name + '</p><p>Qty : ' + item.qty + '</p><p>Price : Rp. ' + item.product.regular_price + '</p></div></div>';
    // }

    function addToCart(){
        $.ajax({
            url : "{{ route('cart.store') }}",
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data){
                console.log("berhasil")
                console.log(sukses)
                sukses();
                show_cart();
            },
            error: function (jqXHR, textStatus , errorThrown){
                // console.log(errorThrown);
                console.log("asu");

            }
        });
    }

    qty = parseInt($('#qty').val());
    function plusQty(){
        qty++;
        $('#qty').val(qty);
    }
    function minQty(){
        if (qty <= 1){
            $('#qty').val(1);
        } else{
            qty--;
        }
        $('#qty').val(qty);
    }

    // function sukses() {
    //     const Toast = Swal.mixin({
    //     toast: true,
    //     position: 'top-end',
    //     showConfirmButton: false,
    //     timer: 2000
    //         });
    //     Toast.fire({
    //         icon: 'success',
    //         title: 'Berhasil !'
    //     })
    // }

let content = document.querySelector('.content');
let descHead = document.querySelector('#desc-head');
let detailHead = document.querySelector('#detail-head');

function changeDescription(){
    let descriptionContent = document.querySelector('.description-content').innerHTML;
    console.log(descriptionContent)
    content.innerHTML = descriptionContent;
    descHead.classList = 'active';
    detailHead.classList.remove('active');
}

function changeDetailProduct(){
    let dimensionContent = document.querySelector('.product-detail-information').innerHTML;

    content.innerHTML = dimensionContent;
    detailHead.classList = 'active';
    descHead.classList.remove('active');
}

    </script>
@endsection
