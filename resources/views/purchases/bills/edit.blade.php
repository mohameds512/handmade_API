@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content_header')
    <div class="">
        <h1>Edit Bill</h1>
    </div>
    <div class="">
        <a href="{{ route('purchases.bills.index') }}" class="btn btn-outline-primary">All Bills</a>
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
            <livewire:forms.bill-form :bill="$bill"/>
        </div>
    </div>
@endsection


@push('js')
    <script>
        window.addEventListener('closeModel', () => {
            $('#vendorModal').modal('hide');
            $('#itemModal').modal('hide');
        })
    </script>
@endpush
