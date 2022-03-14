<!DOCTYPE html>
<html lang="en">

<head>
    <title>Priceman</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="/assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/templatemo.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style_price.css')}}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="/assets/css/fontawesome.min.css">
    <!--



    https://templatemo.com/tm-559-zay-shop

    -->
    @livewireStyles
</head>

<body>

<!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:vnstore2018@gmail.com">vnstore2018@gmail.com</a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:+375-44-711-57-61">+375-44-711-57-61</a>
            </div>
            <div>
                <a>Курс USD:&nbsp;&nbsp;{{$currency->getCourse()}}&nbsp;</a>
                <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i
                        class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.instagram.com/" target="_blank"><i
                        class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://twitter.com/" target="_blank"><i
                        class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
                        class="fab fa-linkedin fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav>
<!-- Close Top Nav -->

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="#">
            Priceman
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class=" collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
             id="templatemo_main_nav">
            <div class="flex-fill">
                <div class="menu">

                    <div onclick="show('none')" id="Fpp-background"></div>
                    <!--01-->
                    <div id="Fpp-window-manual" class="Fpp-window">
                        <H2>Как этим пользоваться?</H2>
                        <p>1.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p>2.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book.</p>
                        <p>3.It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged.</p>
                        <p>4.It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker
                            including versions of Lorem Ipsum.</p>

{{--                        <button class="close" onclick="show('none', 'Fpp-window-manual')">Х</button>--}}
                    </div>
                    <a class="link" href="#open" onclick="show('block', 'Fpp-window-manual')"><!--Открыть-->
                        <p>Как пользоваться?</p>
                    </a>

                    <!--02-->
                    <div id="Fpp-window-about" class="Fpp-window">
                        <h2>Кто мы?</h2>
                        <img src="https://lastkey.ru/800/600/https/gonhub.com/wp-content/uploads/2019/04/tong-hop-nhung-mau-tranh-to-mau-con-meo-dep-sieu-cool-cho-be-55.jpg" width="400" height="400" alt="">
                        <h2>РАЗРАБОТЧИКИ</h2>
                        {{--                        <button onclick="show('none', 'Fpp-window-about')">Х</button>--}}
                    </div>
                    <a class="link" href="#open" onclick="show('block', 'Fpp-window-about')"><!--Открыть-->
                        <p>О нас</p>
                    </a>

                    <!--03-->
                    <div id="Fpp-window-contact" class="Fpp-window">
                        <h2>Наши контакты</h2>
                        <h4>Телефоны:</h4>
                        <p>+375 44 711 57 61</p>
                        <p>+375 29 676 95 73</p>
                        <h4>Email:</h4>
                        <p>vnstore2018@gmail.com</p>
                        <p>shylvladimir@gmail.com</p>
                        <h4>Адрес:</h4>
                        <p>город Минск, ул. Тимерязева 67</p>
{{--                        <button onclick="show('none', 'Fpp-window-contact')">Х</button>--}}
                    </div>
                    <a class="link" href="#open" onclick="show('block', 'Fpp-window-contact')"><!--Открыть-->
                        <p>Контакты</p>
                    </a>

                </div>
            </div>
            @livewire('search')
        </div>

    </div>
</nav>
<!-- Close Header -->


@yield('content')

<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">Priceman Service</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        г.Минск 220047
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="tel:+375 44 711-57-61">+375 44 711-57-61</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="mailto:vnstore2018@gmail.com">vnstore2018@gmail.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Luxury</a></li>
                    <li><a class="text-decoration-none" href="#">Sport Wear</a></li>
                    <li><a class="text-decoration-none" href="#">Men's Shoes</a></li>

                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Home</a></li>
                    <li><a class="text-decoration-none" href="#">About Us</a></li>

                </ul>
            </div>

        </div>

        <div class="row text-light mb-4">
            <div class="col-12 mb-3">
                <div class="w-100 my-3 border-top border-light"></div>
            </div>
            <div class="col-auto me-auto">
                <ul class="list-inline text-left footer-icons">
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i
                                class="fab fa-instagram fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                class="fab fa-twitter fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i
                                class="fab fa-linkedin fa-lg fa-fw"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <label class="sr-only" for="subscribeEmail">Email address</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control bg-dark border-light" id="subscribeEmail"
                           placeholder="Email address">
                    <div class="input-group-text btn-success text-light">Subscribe</div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-left text-light">
                        Copyright &copy; 2021 Shik Company
                        | Designed by <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

<!-- Start Script -->

<script src="{{asset('assets/js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/templatemo.js')}}"></script>
<script src="{{asset('assets/js/popups.js')}}"></script>
<script src="//api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU"></script>

<!-- End Script -->
@livewireScripts
</body>

</html>
