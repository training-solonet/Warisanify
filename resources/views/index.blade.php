<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="{{ url('css/home.css') }}">
    <title>Warisanify</title>
</head>

<body>
    @include('section.hero')
    @include('section.bestSeller')
    @include('section.about')
    @include('section.membership')
    @include('section.offering')
    @include('section.footer')


  
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script>
            $('.slider').slick({
                slidesToShow: 3,
                slidesToScroll: 3,
                centerMode: true

            });
        </script>
</body>

</html>
