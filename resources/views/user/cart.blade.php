<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
            integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/vendors/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('Style/css/cart.css') }}">
    <script src="{{ url('Style/js/cart.js') }}" defer></script>

    <title>Cart</title>
</head>
<body>

<nav class="navbar-hm">
    <a class="logo" href="/">Warisanify</a>
    <ul class="nav-list-hm">
        <li><a class="link" href="/">Home</a></li>
        <li><a class="link" href="/home">Shop</a></li>
        <li><a class="link" href="/detail">Theater</a></li>
        <li><a class="link" href="#">About</a></li>
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
                                <p>Username : <a href="">{{ Auth::user()->name }}</a></p>
                                <p>Email : {{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>

                    <hr>
                    
                    <div class="button-grid">
                        <a href=""><button class="profile-button editProfileButton">Edit Profile</button></a>
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

<div class="heading">
    <h1>Cart</h1>
    <hr>
</div>

<!--section start-->
<section class="cart-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 table-responsive-xs">
                    <table id="dataTable" class="table cart-table" width="100%">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Action</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5"><h2>Total Price :</h2></td>
                                <td>
                                    <h2>Rp. <span id="cart_price_total">0</span></h2>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </div>
        <div class="cart-buttons">
            <a href="/home" class="">Shop</a>
            <a href="/checkout" class="">Checkout</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="{{ url('vendor/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js" integrity="sha512-3z5bMAV+N1OaSH+65z+E0YCCEzU8fycphTBaOWkvunH9EtfahAlcJqAVN2evyg0m7ipaACKoVk6S9H2mEewJWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

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

<script type="text/javascript">
var table;
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        paging: false,
        searching: false,
        ordering: false,
        info: false,
        ajax: {
                url: "{{ route('cart.index') }}",
                type: "GET",
        },
        columns: [
            {data: 'image'},
            {data: 'product.name'},
            {data: 'price'},
            {data: 'qty'},
            {data: 'action'},
            {data: 'total'},
        ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            totalbeli = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $('#cart_price_total').number(totalbeli);

        }
    });

});

function edit_cart(id){
    const qty = $('[name="cart_qty"]').val();
    $.ajax({
        url : "/cart/" +id+ "/edit?qty=" +qty,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            table.ajax.reload(null,false);
        },
        error: function (jqXHR, textStatus , errorThrown) {
            console.log(errorThrown);
        }
    });
}

function increaseQty(id){
    $.ajax({
        url : "/qty-increase/" + id,
        type : "GET",
        dataType : "JSON",
        success : function(data){
            console.log(data)
            table.ajax.reload(null,false);
        },
        error : function (jqXHR, textStatus , errorThrown) {
            console.log(data)

            console.log(errorThrown);
        }
    });
}
function decreaseQty(id){
    $.ajax({
        url : "/qty-decrease/" + id,
        type : "GET",
        dataType : "JSON",
        success : function(data){
            console.log(data)
            table.ajax.reload(null,false);
        },
        error : function (jqXHR, textStatus , errorThrown) {
            console.log(errorThrown);
        }
    });
}

function deleteCartt(id){
    console.log(id)
    $.ajax({
        url : "/cart/" + id,
        type: "DELETE",
        dataType: "JSON",
        success: function(data){
            console.log(data)
            table.ajax.reload(null,false);
        },
        error: function (jqXHR, textStatus , errorThrown){ 
            console.log(errorThrown);
        }
    });
}
</script>
</body>
</html>