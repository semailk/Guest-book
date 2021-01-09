@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center">
        <h1>Гостевая Книга</h1>
        <p>Добро пожаловать в наш сервис.:)</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    @if($errors->any())
                        <div class="alert-danger">
                            @foreach($errors->all() as $error)
                                <h6>{{$error}}</h6>
                            @endforeach
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert-success">
                            <h6>{{session('success')}}</h6>
                        </div>
                    @endif
                    <form action="{{route('forum.store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <label for="comment">Ваш комментарий</label>
                        <textarea name="message" class="form-control" rows="5" id="comment"
                                  placeholder="Впишите свой текст..."></textarea>
                        <input type="file" name="img" class="mt-1">
                        <button class="btn badge-primary mt-1">Отправить</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-2">
            </div>
        </div>
    </div>
    <div class="container">
        @foreach($messages as $message)
        <div class="col-md-2">
            <div class="card mt-3" style="width: 18rem;">
                <img src="{{asset('storage/'. $message->img)}}" class="card-img-top" height="200" alt="img">
                <div class="card-body">
                    <p class="card-text">{{$message->message}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
