@extends('layouts.main')


@section('content')

    <div class="text-center">
        <form enctype="multipart/form-data" action="{{route('processingPrice')}}" method="post">
            @csrf
            <input type="file" name="price">
            <button class="btn-success" type="submit">Отправить</button>
        </form>
    </div>



    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">Раздел</th>
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

@endsection
