@extends('layouts.main')

@section('content')
    <div class="text-center">
        <form enctype="multipart/form-data" method="post">
            <input type="file" name="#">
            <button class="btn-success" type="submit">Отправить</button>
        </form>
    </div>


    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Раздел</th>
            <th scope="col">Производитель</th>
            <th scope="col">Товар</th>
            <th scope="col">Валюта</th>
            <th scope="col">Гарантия</th>
            <th scope="col">Наличие на складе</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>...</td>
            <td>...</td>
            <td>...</td>
            <td>...</td>
            <td>...</td>
            <td>...</td>

        </tr>
        <tr>
            <th scope="row">2</th>
            <td>...</td>
            <td>...</td>
            <td>...</td>
            <td>...</td>
            <td>...</td>
            <td>...</td>

        </tr>
        <tr>
            <th scope="row">3</th>
            <td>...</td>
            <td>...</td>
            <td>...</td>
            <td>...</td>
            <td>...</td>
            <td>...</td>

        </tr>

        </tbody>
    </table>

@endsection
