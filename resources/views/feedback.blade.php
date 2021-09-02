@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="card">
                    <div class="card-header">{{ __('Форма обратной связи') }}</div>
                    <div class="card-body">
                        <form action="{{ url('/feedback') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{__('Имя')}}</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp"
                                       placeholder="Андрей" required>
                                <small id="nameHelp" class="form-text text-muted">{{__('Введите свое имя')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="phone">{{__('Номер телефона')}}</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                       pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}"
                                       placeholder="+7(___)___-__-_"
                                       aria-describedby="phoneHelp" value="+7" required>
                                <small id="phoneHelp" class="form-text text-muted">{{__('Формат +7(___)___-__-_')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="company">{{__('Компания')}}</label>
                                <input type="text" class="form-control" id="company" name="company"
                                       placeholder="My company" required>
                            </div>
                            <div class="form-group">
                                <label for="order_name">{{__('Название заявки')}}</label>
                                <input type="text" class="form-control" id="order_name" name="order_name"
                                       placeholder="Название" required>
                            </div>
                            <div class="form-group">
                                <label for="message">{{__('Сообщение')}}</label>
                                <textarea class="form-control" id="message" name="message" placeholder="..." required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="file-upload">Прикрепить файл</label>
                                <input type="file" class="form-control-file" id="file-upload" name="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
