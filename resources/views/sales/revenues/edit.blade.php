@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content_header')
    <div class="">
        <h1>Edit Revenue</h1>
    </div>
    <div class="">
        <a href="{{ route('sales.revenues.index') }}" class="btn btn-outline-primary">All Revenues</a>
    </div>

@stop
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">


            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <livewire:forms.revenue-form :revenue="$revenue"/>
        </div>
    </div>
@endsection



