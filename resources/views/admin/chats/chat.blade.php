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
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/admin/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/admin/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <h1 class="page-header">
                    Чат <small>Чат с пользователем </small>
                </h1>
            </div>
            <style>
                .block{
                    display: flex;
                    justify-content: start;
                    align-items: center;
                }
            </style>

                @foreach($contentAll as $item)
                <div class="block">
                    <u><h5>{{$item->any_user_name}}:</h5></u>

                    <h4>{{$item->content}}</h4>
                </div>
                @endforeach



            <!-- /.row -->
            <div class="chat-popup bg-light">
                <form action="{{route('admin.chat.store',['chat_id'=>$id])}}" method="post" class="form-container">
                    @csrf

                    <label>Сообщение</label>
                    <div>
                        <textarea
                            class="form-control"
                            type="text"
                            name="content"
                            placeholder="Введите Сообщение..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Отправить</button>
                </form>
            </div>


            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-fw"></i>
                </li>
            </ol>
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


