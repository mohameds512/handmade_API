@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center">Notifications</h1>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-12">
                @foreach($notifications as $notification)
                    <p>{{$notification->data['message']}}</p> <small>{{$notification->created_at->diffForHumans()}}</small>
                @endforeach
            </div>
        </div>
    </div>
@endsection

