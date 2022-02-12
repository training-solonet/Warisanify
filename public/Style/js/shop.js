document.addEventListener('click', e => {
    console.log("cek");
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
                document.getElementById("dropdown-link").innerHTML = text;
                document.getElementById("shopping-cart").innerHTML = textW;
                $("#cart_total").number(totalW);
            },
            error: function (jqXHR, textStatus , errorThrown) {
                console.log(errorThrown);
            }
        });
    }

    function loopCart(item, index) {
        text += '<div class="cart-product-grid"><img src="{{ url("Assets/images") }}/'+ item.product.image+'" width="50" alt=""><div class="cart-content"><p>Name : ' + item.product.name + '</p><p>Qty : ' + item.qty + '</p><p>Price : Rp. ' + item.product.regular_price + '</p></div></div>';
    }

    function loopCartW(item, index) {
        textW += '<div class="cart-item"><img src="{{ url("Assets/images") }}/'+ item.product.image+'" width="" alt="cart-item"><div class="cart-item-content"><h3 class="cart-product-name">' + item.product.name + '</h3><h3 class="cart-product-category">' + item.product.name + '</h3><h3 class="cart-product-quantity">X <span>' + item.qty + '</span></h3><h2 class="cart-product-price">Rp. <span>' + item.product.regular_price + '</span></h2></div><div class="close-button"><i class="fa fa-times" onclick="remove_cart('+item.id+')" aria-hidden="true"></i></div></div>';
        totalW += item.product.regular_price * item.qty;
    }

    function remove_cart(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
                },
            })
            swalWithBootstrapButtons.fire({
                title: 'Confirm !',
                text: "You'll delete data ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete !',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
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
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Cancel',
                    'Data not deleted',
                    'error'
                )
                }
            })
        }


    function sukses() {
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
            });
        Toast.fire({
            icon: 'success',
            title: 'Berhasil !'
        })
    }
