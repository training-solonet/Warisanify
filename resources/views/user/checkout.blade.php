<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="{{ url('multikart/assets/images/favicon/1.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('multikart/assets/images/favicon/1.png') }}" type="image/x-icon">
    <title>Detail Product</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" integrity="sha512-gRH0EcIcYBFkQTnbpO8k0WlsD20x5VzjhOA1Og8+ZUAhcMUCvd+APD35FJw3GzHAP3e+mP28YcDJxVr745loHw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/vendors/slick-theme.css') }}">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/vendors/animate.css') }}">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/vendors/themify-icons.css') }}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/vendors/bootstrap.css') }}">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ url('vendor/sweetalert2/sweetalert2.min.css') }}">
</head>
<body>

<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Checkout</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!-- section start -->
<section class="section-b-space">
    <div class="container">
        <div class="checkout-page">
            <div class="checkout-form">
                <form action="{{ route('payment.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="username" value="{{ Auth::user()->name }}">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Detail Pengiriman</h3>
                            </div>
                            <div class="row check-out">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Penerima</div>
                                    <input type="text" name="name" value="{{ $user->name }}"
                                        placeholder="Masukan Nama Penerima">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Telp</div>
                                    <input type="number" name="telp" value="{{ $user->telp }}"
                                        placeholder="Masukan No Telp">
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Provinsi</div>
                                    <select name="province" id="prov">
                                        <option disabled selected>-- Pilih Provinsi --</option>
                                        @foreach ($province as $prov)
                                        <option value="{{ $prov['province_id'] }}">{{ $prov['province'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Kota</div>
                                    <select name="city" id="kota">

                                    </select>
                                </div>
                                <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                    <div class="field-label">Kurir</div>
                                    <select name="courier" id="kurir">
                                        <option disabled selected>-- Pilih Kurir --</option>
                                        <option value="jne">JNE</option>
                                        <option value="pos">POS</option>
                                        <option value="tiki">TIKI</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-8 col-sm-12 col-xs-12">
                                    <div class="field-label">Service</div>
                                    <select name="cost" id="service">
                                        <option disabled selected>-- Pilih Service --</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Detail Alamat</div>
                                    <textarea class="form-control" name="origin" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Keranjang <span>Total</span></div>
                                    </div>
                                    <ul class="qty">
                                        @php
                                        $subtotal = 0;
                                        @endphp
                                        @foreach ($data as $cart)
                                        @php
                                        $subtotal += $cart->qty * $cart->product->regular_price;
                                        @endphp
                                        <li>{{ $cart->product->name }} × {{ $cart->qty }} <span>Rp. {{
                                                number_format($cart->qty * $cart->product->regular_price) }}</span></li>
                                        @endforeach
                                    </ul>
                                    <ul class="sub-total">
                                        {{-- <input type="hidden" name="ongkir" id="ongkir" value=""> --}}
                                        <li>Subtotal <span class="count">Rp. <span id="subtotal_checkout" value="{{ number_format($subtotal) }}">{{ number_format($subtotal) }}</span></span></li>
                                        <li>Ongkir <span class="count">Rp. <span id="total_ongkir">0</span></span></li>
                                    </ul>
                                    <ul class="sub-total">
                                        <li>Total <span class="count">Rp. <span id="total_checkout">0</span></span></li>
                                    </ul>
                                    <button type="submit" class="btn btn-warning">Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- section end -->


<div class="tap-top top-cls">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top end -->


    <!-- latest jquery-->
    <script src="{{ url('multikart/assets/js/jquery-3.3.1.min.js') }}"></script>

    <!-- fly cart ui jquery-->
    <script src="{{ url('multikart/assets/js/jquery-ui.min.js') }}"></script>

    <!-- exitintent jquery-->
    <script src="{{ url('multikart/assets/js/jquery.exitintent.js') }}"></script>
    <script src="{{ url('multikart/assets/js/exit.js') }}"></script>

    <!-- slick js-->
    <script src="{{ url('multikart/assets/js/slick.js') }}"></script>

    <!-- menu js-->
    <script src="{{ url('multikart/assets/js/menu.js') }}"></script>

    <!-- lazyload js-->
    <script src="{{ url('multikart/assets/js/lazysizes.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ url('multikart/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Bootstrap Notification js-->
    <script src="{{ url('multikart/assets/js/bootstrap-notify.min.js') }}"></script>

    <!-- Fly cart js-->
    <script src="{{ url('multikart/assets/js/fly-cart.js') }}"></script>

    <!-- Theme js-->
    <script src="{{ url('multikart/assets/js/script.js') }}"></script>

    <script src="{{ url('vendor/sweetalert2/sweetalert2.min.js')}}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js" integrity="sha512-3z5bMAV+N1OaSH+65z+E0YCCEzU8fycphTBaOWkvunH9EtfahAlcJqAVN2evyg0m7ipaACKoVk6S9H2mEewJWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
    $(document).ready(function() {
        document.getElementById("kota").disabled = true;
        document.getElementById("kurir").disabled = true;
        document.getElementById("service").disabled = true;

        $("#total_checkout").number($('#subtotal_checkout').html());

    });

    $('#prov').change(function() {
        var id = $(this).val();

        $.ajax({
            url: "/get-city?province_id=" + id,
            method: "GET",
            async: true,
            dataType: 'json',
            success: function(data) {

                document.getElementById("kota").disabled = false;

                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].city_id + '>' + data[i].city_name + '</option>';
                }
                $('#kota').html(html);

            }
        });

        return false;
    });

    $('#kota').change(function() {
        document.getElementById("kurir").disabled = false;
    });

    $('#kurir').change(function() {
        var kurir = $(this).val();
        var kota  = $('[name="city"]').val();
        console.log(kurir)

        $.ajax({
            url: "/get-cost?destination=" + kota + "&&courier=" + kurir,
            method: "GET",
            async: true,
            dataType: 'json',
            success: function(data) {
                console.log(data)
                document.getElementById("service").disabled = false;

                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].cost[0].value + '>' + data[i].service + ' | ' + data[i].description + ' | Rp.' +data[i].cost[0].value+ '</option>';
                }
                $('#service').html(html);

            }
        });

        return false;
    });

    $('#service').change(function() {
        var cost        = $(this).val();
        var subtotal    = $('#subtotal_checkout').text();

        var totalCheckout = parseInt(cost) + parseInt(subtotal.replace(/,/g, ''));

        $("#total_ongkir").number(cost);
        $("#total_checkout").number(totalCheckout);
    });


</script>
</body>
</html>
