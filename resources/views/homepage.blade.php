<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SALONPAS</title>

    <!-- Bootstrap core CSS -->
    <link href="/homepage/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">

    <!-- Custom styles for this template -->
    <link href="/homepage/css/modern-business.css" rel="stylesheet">

    <!-- Temporary navbar container fix -->
    <style>
        .navbar-toggler {
            z-index: 1;
        }

        @media (max-width: 576px) {
            nav > .container {
                width: 100%;
            }
        }

        /* Temporary fix for img-fluid sizing within the carousel */

        .carousel-item.active,
        .carousel-item-next,
        .carousel-item-prev {
            display: block;
        }
    </style>

</head>

<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">SALONPAS</a>
        <div class="collapse navbar-collapse" id="navbarExample">
            {{--<ul class="navbar-nav ml-auto">--}}
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="about.html">About</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="services.html">Services</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="contact.html">Contact</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item dropdown">--}}
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="employee.html">Employee</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item dropdown">--}}
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="employee.html">Appointments</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('/homepage/img/slide3.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Haircut</h3>
                    <p>CUT CUT CUT</p>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('/homepage/img/slidetwo.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3> Manicure and Pedicure </h3>
                    <p>This is a description for the second slide.</p>
                </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('/homepage/img/slidethree.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Facial and Massage</h3>
                    <p>This is a description for the third slide.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>

<!-- Page Content -->
<div class="container">

    <h1 class="my-4">Main Services</h1>

    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <h4 class="card-header">Haircut and Hair Styling</h4>
                <div class="card-block">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse
                        necessitatibus neque.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <h4 class="card-header">Manicure and Pedicure</h4>
                <div class="card-block">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos,
                        nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque
                        exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <h4 class="card-header">Facial and Massage</h4>
                <div class="card-block">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse
                        necessitatibus neque.</p>
                </div>
            </div>
        </div>
    </div>

    <h2>Top </h2>

    <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <img class="card-img-top img-fluid" src="/homepage/img/ombre.jpg" alt="">
                <div class="card-block">
                    <h4 class="card-title">Hair Coloring</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam
                        aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt,
                        dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <img class="card-img-top img-fluid" src="/homepage/img/undercut.jpg" alt="">
                <div class="card-block">
                    <h4 class="card-title">Undercut Hairstyle</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod
                        odio, gravida pellentesque urna varius vitae.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <img class="card-img-top img-fluid" src="/homepage/img/rebond.jpg" alt="">
                <div class="card-block">
                    <h4 class="card-title">Rebond and Relax</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error
                        quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure
                        perspiciatis mollitia recusandae vero vel quam!</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <img class="card-img-top img-fluid" src="/homepage/img/matte.jpg" alt="">
                <div class="card-block">
                    <h4 class="card-title">Matte Nail Polish</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod
                        odio, gravida pellentesque urna varius vitae.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <img class="card-img-top img-fluid" src="/homepage/img/footspa.jpg" alt="">
                <div class="card-block">
                    <h4 class="card-title">Foot Spa</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod
                        odio, gravida pellentesque urna varius vitae.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <img class="card-img-top img-fluid" src="/homepage/img/massage.jpg" alt="">
                <div class="card-block">
                    <h4 class="card-title">Hot Stone Massage</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum
                        suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates,
                        nemo repellat fugiat excepturi! Nemo, esse.</p>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-inverse">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; SALONPAS</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/homepage/js/jquery.min.js"></script>
<script src="/homepage/js/tether.min.js"></script>
<script src="/homepage/js/bootstrap.min.js"></script>

</body>

</html>
