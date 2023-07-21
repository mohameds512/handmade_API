@extends('layouts.admin')

@section('content_header')
    <h1>Accounts Tree</h1>
    <a href="{{route('accounting.accounts.create')}}" class="btn btn-success">Create Account</a>
@stop

@section('content')

    <div class="row ">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        </div>
    </div>

@endsection


