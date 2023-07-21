@extends('layouts.admin')

@section('content_header')
    <h1>Taxes</h1>
@stop

@section('content')
    <div class="row justify-content-center ">
        <div class="col-lg-8 card">
            <div class="card-body">

                <div class="form-group row">
                    <div class="col-md-12">
                        <livewire:forms.tax-form />
                    </div>
                    <br>
                    <div class="col-md-12">
                        <h2>All Taxes</h2>
                        <livewire:tables.taxes-table />
                    </div>


                </div>

            </div>

        </div>
    </div>
@endsection
