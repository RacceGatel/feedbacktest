@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Ваши заявки</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Компания</th>
                                <th scope="col">Название</th>
                                <th scope="col">Текст</th>
                                <th scope="col">Файл</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->company }}</td>
                                    <td>{{ $order->order_name }}</td>
                                    <td><textarea name="" id="" cols="50" rows="1" readonly>{{ $order->message }}</textarea></td>
                                    <td>@if($order->file)<a href="{{ url('/download/'.$order->id) }}" title="Скачать">Скачать</a>
                                        @else
                                            Нет файла
                                        @endif</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
