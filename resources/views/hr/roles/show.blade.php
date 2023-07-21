@extends('layouts.admin')
@section('content_header')

    <div class="">    <h1>Role {{$role->name}}</h1></div>
    <div class="">  <a href="{{route('hr.roles.index')}}" class="btn btn-primary">Manage Roles</a></div>
@stop
@section('content')

        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif <br>
                <label>Role ID</label>
                <p><b>{{$role->id}}</b></p> <hr>
                <label>Role Name</label>
                <p><b>{{$role->name}}</b></p> <hr>
                <label>Role Permissions</label>
                <p>@foreach($rolePermissions as $permission)
                        <span class="badge badge-success">{{$permission->name}}</span>

                    @endforeach
                </p> <hr>

                <div class="d-flex ">

                    <a href="{{ route('hr.roles.edit',$role->id) }}" class="btn btn-info o">edit</a>

                    <form class="ml-5" action="{{route('hr.roles.destroy',$role->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="delete">
                    </form>
                </div>
            </div>
        </div>

@endsection

