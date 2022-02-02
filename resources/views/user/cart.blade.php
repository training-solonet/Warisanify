<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="shortcut icon" href="{{ url('multikart/assets/images/favicon/1.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" integrity="sha512-gRH0EcIcYBFkQTnbpO8k0WlsD20x5VzjhOA1Og8+ZUAhcMUCvd+APD35FJw3GzHAP3e+mP28YcDJxVr745loHw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Animate icon -->
<link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/vendors/animate.css') }}">

<!-- Themify icon -->
<link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/vendors/themify-icons.css') }}">

<!-- Bootstrap css -->
<link rel="stylesheet" type="text/css" href="{{ url('multikart/assets/css/vendors/bootstrap.css') }}">

    <title>Document</title>
</head>
<body>
    <h1>Cart Page</h1>
    <div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Keranjang</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

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
                                <th scope="col">qty</th>
                                <th scope="col">action</th>
                                <th scope="col">total</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">Total Harga :</td>
                                <td>
                                    <h2><span id="cart_price_total">0</span></h2>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-6"><a href="{{ route('home.index') }}" class="btn btn-solid">Lanjut Belanja</a></div>
            <div class="col-6"><a href="{{ route('checkout.index') }}" class="btn btn-solid">checkout</a></div>
        </div>
    </div>
</section>
    

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

<script src="{{ url('vendor/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
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
                {data: 'product.regular_price'},
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
                table.ajax.reload(null,false);
            },
            error : function (jqXHR, textStatus , errorThrown) {
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