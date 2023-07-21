@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content_header')

        <h1>Create Invoice</h1>

        <a href="{{ route('sales.invoices.index') }}" class="btn btn-outline-primary">All Invoices</a>


@stop
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">


            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <livewire:forms.invoice-form/>
        </div>
    </div>
@endsection


@push('js')
    <script>
        window.addEventListener('closeModel', () => {
            $('#clientModal').modal('hide');
            $('#itemModal').modal('hide');
        })
    </script>
@endpush
