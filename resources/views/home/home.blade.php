@extends('layouts.main')


@section('content')

    <div class="d-flex justify-content-around">
        <form enctype="multipart/form-data" action="{{route('processingPrice')}}" method="post">
            @csrf
            <input type="file" name="price" required>
            <button class="btn-success" type="submit">Отправить</button>
        </form>

        <form action="{{route('pullPriceList','')}}" method="post">
            @csrf
            <button class="btn-success" type="submit">Стянуть прайсы от поставщиков</button>
        </form>

{{--        {{$ha}}--}}
        <div id="primary_nav_wrap">
            <ul>
                <li><a class="btn-success dropdown-toggle" href="#">Прайсы поставщиков</a>
                    <ul>
                        <li class="d-flex justify-content-center mt-2 mb-2">
                            <label class="form-check-label">
                                product supplier 1
                            </label>
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                        </li>
                        <li class="d-flex justify-content-center mt-2 mb-2">
                            <label class="form-check-label">
                                product supplier 1
                            </label>
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                        </li>
                    </ul>

                </li>
            </ul>
        </div>
    </div>

    {{--    <div class="btn-group">--}}
    {{--        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">--}}
    {{--            Кликабельно внутри--}}
    {{--        </button>--}}
    {{--        <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">--}}
    {{--            <li><a class="dropdown-item" href="#">Элемент меню</a></li>--}}
    {{--            <li><a class="dropdown-item" href="#">Элемент меню</a></li>--}}
    {{--            <li><a class="dropdown-item" href="#">Элемент меню</a></li>--}}
    {{--        </ul>--}}
    {{--    </div>--}}







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
            <th scope="col">Наличие на складе</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $value)
            <tr>

                <td>{{$value->chapter}}</td>
                <td>{{$value->article}}</td>
                <td>{{$value->manufacturer}}</td>
                <td>{{$value->product}}</td>
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

