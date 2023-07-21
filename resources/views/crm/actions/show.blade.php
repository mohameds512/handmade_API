@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content_header')
    <h1>User {{$user->name}}</h1>
@stop

@section('content')


        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('users.index')}}">Manage Users</a>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <label>User Name</label>
                <p><b>{{$user->name}}</b></p> <hr>
                <label>User Email</label>
                <p><b>{{$user->email}}</b></p> <hr>
                <label>User Role</label>
                <p><b>@if (isset($roles))
                        @foreach($roles as $role)
                        {{$role }}
                        @endforeach
                        @else
                          {{$user->role  }}
                        @endif
                    </b></p> <hr>
                <div class="d-flex ">

                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-info o">edit</a>

                    <form class="ml-5" action="{{route('users.destroy',$user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="delete">
                    </form>

                </div>


            </div>
        </div>

@endsection

