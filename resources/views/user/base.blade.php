<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    @yield('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
{{-- <script src="{{ url('vendor/sweetalert2/sweetalert2.min.css')}}"></script> --}}
<link rel="stylesheet" href="{{ url('vendor/sweetalert2/sweetalert2.min.css')}}">

    <title>Shop</title>
</head>

<body>
@include('user.partial.navbar')

@yield('content')

@include('user.partial.footer')


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
{{-- <script src="{{ url('vendor/sweetalert2/sweetalert2.min.js')}}"></script> --}}
<script src="{{ url('vendor/sweetalert2/sweetalert2.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js" integrity="sha512-3z5bMAV+N1OaSH+65z+E0YCCEzU8fycphTBaOWkvunH9EtfahAlcJqAVN2evyg0m7ipaACKoVk6S9H2mEewJWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
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

document.addEventListener('click', e => {
const isDropdownLink = e.target.matches("[data-dropdown-link]")
if (!isDropdownLink && e.target.closest('[data-dropdown]') != null) return
let currentDropdown
if (isDropdownLink){
    currentDropdown = e.target.closest('[data-dropdown]')
    currentDropdown.classList.toggle('active')
}

document.querySelectorAll("[data-dropdown].active").forEach(dropdown => {
    if (dropdown === currentDropdown ) return
    dropdown.classList.remove("active")
})
})

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    show_cart();
    // sukses();

    defaultContent = $('.description-content').html();
    $('#desc-head').addClass('active');
    $('#content').fadeOut(200, function() {
        $(this).html(defaultContent).fadeIn(200);
    });
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
                $('#dropdown-link').html(text);
                $('#shopping-cart').html(textW);

                $("#cart_total").number(totalW);
            },
            error: function (jqXHR, textStatus , errorThrown) {
                console.log(errorThrown);
            }
        });
    }

    function loopCartW(item, index) {
        textW += '<div class="cart-item"><img src="{{ url("Assets/images") }}/'+ item.product.image+'" width="" alt="cart-item"><div class="cart-item-content"><h3 class="cart-product-name">' + item.product.name + '</h3><h3 class="cart-product-category">' + item.product.name + '</h3><h3 class="cart-product-quantity">X <span>' + item.qty + '</span></h3><h2 class="cart-product-price">Rp. <span>' + item.product.regular_price + '</span></h2></div><div class="close-button"><i class="fa fa-times" onclick="remove_cart('+item.id+')" aria-hidden="true"></i></div></div>';
        totalW += item.product.regular_price * item.qty;
    }

    function loopCart(item, index) {
        text += '<div class="cart-product-grid"><img src="{{ url("Assets/images") }}/'+ item.product.image+'" width="50" alt=""><div class="cart-content"><p>Name : ' + item.product.name + '</p><p>Qty : ' + item.qty + '</p><p>Price : Rp. ' + item.product.regular_price + '</p></div></div>';
    }

    function remove_cart(id){
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

    }

    function sukses() {
        Swal.fire(
        'Success!',
        'Data added to cart',
        'success'
        )
    }
</script>

@yield('srcipt')

</body>

</html>
