<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warisanify</title>
    <link rel="stylesheet" href="{{ url('Style/css/home.css') }}">
</head>
<body>
    @include('user.HomePartial.hero')
    @include('user.HomePartial.bestSeller')
    @include('user.HomePartial.about')
    @include('user.HomePartial.membership')
    @include('user.HomePartial.offering')
    @include('user.HomePartial.footer')
</body>
</html>
