<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <style>
          .slick-slide img {
    display: block;
    height: 700px;
    object-fit: cover;
}
    </style>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">My Project</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About US </a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="{{route('login')}}">Login</a></li>
                <li><a href="{{route('register')}}">Register</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="slider">
            @if(isset($slider))
            @foreach($slider as $s)
            <div class="item">
                <img src="{{asset('backend/slider/'.$s->image)}}" alt="">
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.slider').slick({
            infinite: true,
            dots: true,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true
        });
    });
    </script>
</body>

</html>