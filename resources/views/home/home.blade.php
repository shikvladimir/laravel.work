@extends('layouts.main')


@section('content')

    <div class="d-flex justify-content-around">
        <form enctype="multipart/form-data" action="{{route('processingPrice')}}" method="post">
            @csrf
            <input type="file" name="price" required>
            <button class="btn-success" type="submit">Отправить</button>
        </form>

        <form action="{{route('pullPriceList')}}" method="post">
            @csrf
            <button class="btn-success" type="submit">Стянуть прайсы от поставщиков</button>
        </form>


        <div id="primary_nav_wrap">
            <ul>
                <form action="{{route('allPricesLists')}}" method="post">

                @csrf
                    <li class="d-flex">
                        <button class="btn-success dropdown-toggle" type="submit" >Обработать прайсы</button>
                        <ul>
                            @foreach($files as $key => $file)
                                <li class="d-flex justify-content-between">
                                    <label class="form-check-label">
{{--                                        {{$key}}--}}
                                        {{$file}}
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="isChecked[]" value="{{$key}}"
                                           id="flexCheckIndeterminate">
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </form>
            </ul>
        </div>
        <form action="{{route('uploadPrice')}}" method="post">
            @csrf
            <button class="btn-success" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0z"/>
                </svg>
            </button>
        </form>
    </div>


    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">Раздел</th>
            <th scope="col">Артикул</th>
            <th scope="col">Производитель</th>
            <th scope="col">Товар</th>
            <th scope="col">Цена</th>
            <th scope="col">Валюта</th>
            <th scope="col">Гарантия</th>
            <th scope="col">Наличие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $value)
            <tr>

                <td>{{$value->chapter}}</td>
                <td>{{$value->article}}</td>
                <td>{{$value->manufacturer}}</td>
                <td id="{{$value->product}}">{{$value->product}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->currency}}</td>
                <td>{{$value->guarantee}}</td>
                <td>{{$value->stock}}</td>

            </tr>
        @endforeach
        </tbody>

    </table>

    {{$datas->links()}}


    <style>
        #primary_nav_wrap {
            margin-top: 0px
        }

        #primary_nav_wrap ul {
            list-style: none;
            position: relative;
            float: left;
            margin: 0;
            padding: 0
        }

        #primary_nav_wrap ul a {
            display: block;
            color: #ffffff;
            text-decoration: none;
            font-weight: 700;
            font-size: 12px;
            line-height: 32px;
            padding: 0 15px;
            font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif
        }

        #primary_nav_wrap ul li {
            position: relative;
            float: left;
            margin: 0;
            padding: 0
        }

        #primary_nav_wrap ul li.current-menu-item {
            background: #ddd
        }

        #primary_nav_wrap ul li:hover {
            background: #f6f6f6
        }

        #primary_nav_wrap ul ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: #fff;
            padding: 0 12px;
        }

        #primary_nav_wrap ul ul li {
            float: none;
            width: 200px
        }

        #primary_nav_wrap ul ul a {
            line-height: 120%;
            padding: 10px 15px
        }

        #primary_nav_wrap ul ul ul {
            top: 0;
            left: 100%
        }

        #primary_nav_wrap ul li:hover > ul {
            display: block
        }
    </style>
@endsection

