@extends('layouts.admin')

@section('content_header')
    <div class="">    <h1>Edit Role</h1></div>
    <div class="">   <a href="{{route('hr.roles.index')}}">Manage Roles</a></div>

@stop
@section('content')

        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('hr.roles.update',$role->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Role Name</label>
                        <div class="col-md-6">
                            <input  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$role->name}}"  autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            @foreach($permissions as $permission)
                                <input type="checkbox" id="{{$permission->name}}" name="permissions[]" value="{{$permission->name}}"  @if(in_array($permission->id ,$rolePermissions)) {{__('checked')}}@endif >
                                <label for="{{$permission->name}}">{{$permission->name}}</label><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-info">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection

