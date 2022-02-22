<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
    @include('admin.header')
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    @include('admin.sidebar')
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Пользователи <small>статистика и управление</small>
                    </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i>
                            </li>
                        </ol>
                </div>
            </div>

            <!-- /.row -->
            @foreach($users as $user)
                <div class="col-lg-12 bg-transparent">
                    <div class="col-lg-4">
                        <img src="{{$user->pagePhoto}}" width="200" alt="">
                    </div>
                    <div class="p-right">
                        <div class="col-md-4 p-right-left">
                            <p>Наименование организации: </p>
                            <p>Имя: </p>
                            <p>Фамилия: </p>
                            <p>Email: </p>
                            <p>Контактный номер: </p>
                            <p>Статус аккаунта: </p>
                        </div>
                        <div class="col-md-4 p-right-right">
                            <p>{{$user->organization}}</p>
                            <p>{{$user->name}}</p>
                            <p>{{$user->lastname}}</p>
                            <p>{{$user->email}}</p>
                            <p>{{$user->number_phone}}</p>
                            <form action="{{route('admin.users.store',[$user->id])}}" method="post">
                                @csrf
                                Включит аккаунт
                                <input type="checkbox" name="confirmed" value="Yes" {{$user->check}}>
                                <input type="submit" name="subconfirmed" value="Сохранить" >
                            </form>
                        </div>
                    </div>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-fw"></i>
                        </li>
                    </ol>
                </div>
        @endforeach
        <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="public/admin/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="public/admin/js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="public/admin/js/plugins/morris/raphael.min.js"></script>
<script src="public/admin/js/plugins/morris/morris.min.js"></script>
<script src="public/admin/js/plugins/morris/morris-data.js"></script>

</body>

</html>

