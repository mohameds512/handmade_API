@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content_header')
    <div class="">    <h1>Edit User</h1></div>
    <div class="">           <a href="{{route('hr.users.index')}}">Manage Users</a></div>

@stop
@section('content')

        <div class="row justify-content-center">
            <div class="col-md-8">


                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{route('hr.users.update',$user->id)}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}"  autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}"  autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

                        <div class="col-md-6">
                            <select name="role" class="form-select" aria-label="Default select example" >
                            @foreach($roles as $role)
                                <option value="{{$role}}" @if(isset($userRole[0])&&$role === $userRole[0]){{ __('selected') }}@elseif($role=== $user->role){{ __('selected') }} @endif>{{$role}}</option>
                             @endforeach
                            </select>
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection



