<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop - About Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chat.css')}}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!--

    TemplateMo 559 Priceman

    https://templatemo.com/tm-559-Priceman

    -->
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
    <div class="container d-flex justify-content-center align-items-center">

        <h1 class="navbar-brand text-success logo h1 align-self-center">
            Priceman
        </h1>
    </div>

    </div>
</nav>
<!-- Close Header -->
@include('flash-message.flash-message')
<!-- Form -->
<div class="p-2">
    <div class="p-4">
        <div class=" m-5 d-flex justify-content-center">
            <div class="m-5 container d-flex justify-content-center">
                <div class=" text-success col-md-offset-3 col-md-4 ">
                    <form action="{{route('checkLogin')}}" method="post" class="form-control bg-light text-success">
                        @csrf
                        <div class="form-group m-2">
                            <label class="fw-bold">
                                ??????????
                            </label>
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="E-mail">
                        </div>
                        <div class="form-group m-2">
                            <label class="fw-bold">
                                ????????????
                            </label>
                            <input type="password" name="password" class="form-control" id="inputPassword"
                                   placeholder="????????????">
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-success">????????</button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-group mt-4">
                                <p><a href="{{route('registration')}}">????????????????????????????????????</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Close Form -->

<!-- Chat -->
<button class="open-button" onclick="openForm()">??????</button>

<div class="chat-popup" id="myForm">
    <form action="{{route('chatsUser')}}" method="post" class="form-container">
        @csrf
        <h1>??????</h1>
        <div class="chat-field">
            @foreach($content as $item)
                <u><h5>{{$item->any_user_name}}:</h5></u>
                <p class="text-chat">{{$item->content}}</p>
            @endforeach
        </div>
        <input class="border_for_input"
               @foreach($any_user_id as $item)
               type="{{$item->text}}"
               @endforeach
               name="any_user_name"
               id="any_user_name"
               placeholder="???????? ??????">

        <input class="border_for_input"
               @foreach($any_user_id as $item)
               type="{{$item->text}}"
               @endforeach
               name="chat_name"
               id="chat_name"
               placeholder="???????? ??????????????????">
        <textarea type="text"
                  name="content"
                  id="content"
                  placeholder="?????????????? ??????????????????..." required></textarea>
        <button type="submit" class="btn">??????????????????</button>
        <button type="button" class="btn cancel" onclick="closeForm()">??????????????</button>
    </form>
</div>

<!-- Close Chat -->

<!-- Start Footer -->
{{--<footer class="fixed-bottom bg-dark" id="tempaltemo_footer">--}}
<footer class=" fix" id="tempaltemo_footer">
    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="d-flex justify-content-center">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                    class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank"
                               href="https://www.instagram.com/"><i
                                    class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                    class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->


<!-- Start Script -->
<script src="{{asset('/assets/js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('/assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/assets/js/templatemo.js')}}"></script>
<script src="{{asset('/assets/js/popups.js')}}"></script>
<script src="{{asset('/assets/js/chat.js')}}"></script>
<!-- End Script -->
</body>

</html>

