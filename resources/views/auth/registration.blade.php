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

<!-- Form -->
<div class="container mt-5">
    <form action="{{route('stepRegistration')}}" class="row g-3 mt-5 needs-validation" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div>
            <div class="div">
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Имя</label>
                    <input type="text" name="name" class="form-control" id="validationCustom02" placeholder="Иван"
                           required>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Фамилия</label>
                    <input type="text" name="lastname" class="form-control" id="validationCustom02"
                           placeholder="Иванов" required>
                </div>
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Организация</label>
                    <div class="input-group has-validation">
                        <input type="text" name="organization" class="form-control" id="validationCustomUsername"
                               aria-describedby="inputGroupPrepend" placeholder="ИП Иванов И.И." required>
                        <div class="invalid-feedback">
                            Пожалуйста, укажите организацию!
                        </div>
                    </div>
                </div>
            </div>
            <div class="div">
                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label">Номер телефона</label>
                    <input type="text" name="number_phone" class="form-control" id="validationCustom03"
                           placeholder="+375-29-999-99-99" required>
                    <div class="invalid-feedback">
                        Пожалуйста, укажите номер телефона!
                    </div>
                </div>
                <div class="div">
                    <div class="col-md-4">
                        <label for="validationCustom03" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="validationCustom03"
                               placeholder="ivanov@mail.ru" required>
                        <div class="invalid-feedback">
                            Пожалуйста, укажите Email!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom03" class="form-label">Пароль</label>
                        <input type="password" name="password" class="form-control" id="validationCustom03"
                               placeholder="********" required>
                        <div class="invalid-feedback">
                            Пожалуйста, укажите пароль!
                        </div>
                    </div>
                </div>
                <!--file input example -->
                <label for="file">Фото(необязательно) :</label>
                <div class="col-md-4 mb-5 control-fileupload">

                    <input class="form-control" type="file" name="photo">
               </div>
                <!--./file input example -->
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="confirmed" value="" id="invalidCheck"
                               required>
                        <label class="form-check-label" for="invalidCheck">
                            Согласен с условиями
                        </label>
                        <div class="invalid-feedback">
                            Вы должны согласиться перед отправкой.
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <button class="btn btn-primary" type="submit">Отправить</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Close Form -->


<!-- Start Footer -->
<footer class=" bg-dark mt-5" id="tempaltemo_footer">
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

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

<!-- Start Script -->
<script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/templatemo.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<!-- End Script -->
</body>

</html>
