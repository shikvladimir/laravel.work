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
                                Логин
                            </label>
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="E-mail">
                        </div>
                        <div class="form-group m-2">
                            <label class="fw-bold">
                                Пароль
                            </label>
                            <input type="password" name="password" class="form-control" id="inputPassword"
                                   placeholder="Пароль">
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-success">ВХОД</button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-group mt-4">
                                <p><a href="{{route('registration')}}">Зарегистрироваться</a></p>
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
<button class="open-button" onclick="openForm()">Чат</button>

<div class="chat-popup" id="myForm">
    <form action="{{route('chatsUser')}}" method="post" class="form-container">
        @csrf
        <h1>Чат</h1>
        <div class="chat-field">
            @foreach($chatUser as $item)
                <p class="text-chat">{{$item}}</p>{{--admin--}}
            @endforeach
                @foreach($chatAdmin as $item)
            <div class="form-group d-flex justify-content-end"> {{--admin--}}
                <p class="text-chat">{{$item}}</p>
            </div>
                @endforeach

        </div>
        <label for="msg"><b>Сообщение</b></label>
        <textarea placeholder="Ваше сообщениe..." name="u_message" required>
        </textarea>

        <button type="submit" class="btn">Отправить</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Закрыть</button>
    </form>
</div>


<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    /* Кнопка, используемая для открытия формы чата - закреплена в нижней части страницы */
    .open-button {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        opacity: 0.5;
        position: fixed;
        bottom: 23px;
        right: 28px;
        width: 280px;
    }

    .text-chat {
        margin: 0;
    }

    .chat-field{
        height: 180px;
        overflow:scroll;
    }

    /* Всплывающий чат - скрыт по умолчанию */
    .chat-popup {

        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 9;
    }

    /* Добавление стилей в контейнер формы */
    .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
    }

    /* Полноразмерная текстовая область */
    .form-container textarea {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
        resize: none;
        min-height: 100px;
    }

    /* Когда текстовая область получит фокус, сделайте что-нибудь */
    .form-container textarea:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Установите стиль для кнопки отправить/кнопка */
    .form-container .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        opacity: 0.8;
    }

    /* Добавьте красный цвет фона к кнопке отмена */
    .form-container .cancel {
        background-color: red;
    }

    /* Добавьте некоторые эффекты наведения на кнопки */
    .form-container .btn:hover, .open-button:hover {
        opacity: 1;
    }
</style>

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>
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
<script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/templatemo.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<!-- End Script -->
</body>

</html>

