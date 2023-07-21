@extends('layouts.admin')

@section('content_header')
        <h1>All Revenues</h1>
        <a href="{{route('sales.revenues.create')}}" class="btn btn-success">Add Revenue</a>
@stop

@section('content')

    <div class="row ">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <livewire:tables.revenues-table />
        </div>
    </div>

@endsection


