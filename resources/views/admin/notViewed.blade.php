@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('admin.forum.notViewed')}}">Не просмотренные</a>
        <a class="ml-5" href="{{route('admin.forum.viewed')}}">Просмотренные</a>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Message</th>
                <th>Date</th>
                <th>Act</th>
            </tr>
            </thead>
            <tbody>
            @foreach($messages as $message)
                <tr class="danger">
                    <td>{{$message->id}}</td>
                    <td>{{$message->message}}</td>
                    <td>{{$message->created_at}}</td>
                    <td><a href="{{route('admin.forum.update',$message->id)}}"><button type="button" class="btn btn-primary">Добавить</button></a>
                        <a href="{{route('admin.forum.delete',$message->id)}}"><button type="button" class="btn btn-danger">Удалить</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(session('success'))
            <div class="alert-success">
                {{session('success')}}
            </div>
            @endif
    </div>

@endsection
