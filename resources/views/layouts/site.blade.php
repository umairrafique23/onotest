<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS & JS -->

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css" type="text/css">
    <link rel="stylesheet" media="screen" href="{{ URL::asset('css/site.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
    <meta charset="UTF-8">
    <title>Ono Site</title>
</head>

<body>

<header>
    <div class="container">

        <div id="branding">
            <h1><span class="highlight">Ono</span> A dream job</h1>
        </div>
        <a href="/admin" class="btn btn-danger" style="float: right;"><i class="fa fa-lock" style="margin-right: 5px"></i>Admin</a>

    </div>
</header>

<div class="container">


    <div class="row">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="col-lg-6">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>

                    @foreach($directories as $directory)
                        <li class="dropdown"><a href="\directory/{{$directory->slug}}">{{$directory->title}} <span class="caret"></span></a>

                            <ul class="dropdown-menu" id="zero-padding">
                        @foreach($categories as $category)

                            @if($directory->id == $category->directory_id)


                                        <li><a href="/category/{{$category->slug}}">{{$category->title}}</a></li>


                            @endif
                        @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
                </div><div class="col-lg-6" id="newsletter">
                            <form class="form-inline">
                                <div class="form-group">

                                    <input class="form-control" type="text" placeholder="Search here...">


                                    <button type="submit" class="button_1 form-control"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </form>

                </div>
           </div>


        </nav>



    </div>
    <div class="row">

                @yield('content')



    </div>

</div>


<footer class="footer-distributed">

    <div class="footer-left">

        <h3>Ono<span>CMS</span></h3>

        <p class="footer-links">
            <a href="#">Home</a>
            ·
            <a href="#">About</a>
            ·
            <a href="#">Faq</a>
            ·
            <a href="#">Contact</a>
        </p>

        <p class="footer-company-name">Ono CMS &copy; 2015</p>
    </div>

    <div class="footer-center">

        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>Comsats</span> Lahore, Pakistan</p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p>+924654564</p>
        </div>

        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:support@company.com">support@ono.com</a></p>
        </div>

    </div>

    <div class="footer-right">

        <p class="footer-company-about">
            <span>About the company</span>
            Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
        </p>

        <div class="footer-icons">

            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>

        </div>

    </div>

</footer>

</body>
</html>