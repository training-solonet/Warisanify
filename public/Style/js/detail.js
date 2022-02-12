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

 $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        show_cart();

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
                total = 0;
                //show cart
                const cart = data;
                cart.forEach(loopCart);
                document.getElementById("dropdown-link").innerHTML = text;
            },
            error: function (jqXHR, textStatus , errorThrown) {
                console.log(errorThrown);
            }
        });
    }

    function loopCart(item, index) {
        text += '<div class="cart-product-grid"><img src="{{ url("Assets/images") }}/'+ item.product.image+'" width="50" alt=""><div class="cart-content"><p>Name : ' + item.product.name + '</p><p>Qty : ' + item.qty + '</p><p>Price : Rp. ' + item.product.regular_price + '</p></div></div>';
    }

    function addToCart(){
        $.ajax({
            url : "{{ route('cart.store') }}",
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data){
                console.log("berhasil")
                sukses();
                show_cart();
            },
            error: function (jqXHR, textStatus , errorThrown){
                console.log(errorThrown);
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

function sukses() {
    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000
        });
    Toast.fire({
        icon: 'success',
        title: 'Berhasil !'
    })
}

