<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Cheap Electronics</title>
</head>
<body>
    {{ View::make('header') }}
    @yield('content')
    {{ View::make('footer') }}
</body>
    <style>
        .custom-login{
            height: 550px;
            padding-top: 100px;
        }
        img.slider-img{
            height: 400px !important;
        }
        .custom-product{
            height: 600px;
            margin-bottom: 50px;
        }
        .create-product{
            height: 600px;
            margin-bottom: 50px;
            padding: 30px;
        }
        .slider-text{
            background-color: #35443585 !important;
        }
        .trending-image{
            height: 100px;
        }
        .trending-item{
            float: left;
            width: 20%;
        }
        .trending-wrapper{
            margin: 30px;
        }
        .detail-img{
            height: 200px;
        }
        .search-box{
            width: 500px !important;
        }
        .cart-list-divider{
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }
    </style>
</html>