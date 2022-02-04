<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ url('Style/css/homee.css') }}"> 
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Warisanify</title>
    <script src="{{ url('Style/js/home.js') }}" defer></script>
</head>
<body>
    @include('user.HomePartial.hero')
    @include('user.HomePartial.bestSeller')
    @include('user.HomePartial.about')
    @include('user.HomePartial.membership')
    @include('user.HomePartial.offering')
    @include('user.HomePartial.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
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
</body>
</html>
