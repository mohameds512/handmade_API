@extends('layouts.admin')

@section('content_header')

    <div class="">    <h1>All Users</h1></div>
    <div class="">
        <a href="{{route('hr.users.create')}}" class="btn btn-success">Create User</a></div>
@stop

@section('content')

        <div class="row justify-content-center">
            <div class="col-md-12">


                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                    <div class="container-fluid ">
                     <livewire:tables.users-table />
                    </div>
            </div>
        </div>



@endsection


