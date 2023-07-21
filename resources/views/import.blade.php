@extends('layouts.admin')

@section('title', 'Import')

@section('content_header')
    <h1>Import</h1>
@stop

@section('content')

    <div class="row  d-flex justify-content-between ">
        <div class="card  flex-md-fill m-1 ">
            <h3 class="card-header">Clients</h3>
            <form action="{{ route('import.clients') }}" method="POST" enctype="multipart/form-data" class="card-body">
                @csrf
                <a class="btn btn-dark" href="{{ route('template.clients') }}">Download Template</a>
                <hr>
                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                    <div class="custom-file text-left">
                        <input type="file" name="clients" class="custom-file-input" id="clients">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @error('clients')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <button class="btn btn-primary">Import data</button>
                {{--            <a class="btn btn-success" href="{{ route('import') }}">Export data</a>--}}
            </form>
        </div>

        <div class="card flex-md-fill m-1">
            <h3 class="card-header">Companies</h3>
            <form action="{{ route('import.companies') }}" method="POST" enctype="multipart/form-data" class="card-body">
                @csrf
                <a class="btn btn-dark" href="{{ route('template.companies') }}">Download Template</a>
                <hr>
                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                    <div class="custom-file text-left">
                        <input type="file" name="companies" class="custom-file-input" id="companies">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                @error('companies')
                <small class="text-danger">{{$message}}</small>
                @enderror
                <button class="btn btn-primary">Import data</button>
                {{--            <a class="btn btn-success" href="{{ route('import') }}">Export data</a>--}}
            </form>
        </div>
        <div class="card flex-md-fill m-1">
            <h3 class="card-header">Vendors</h3>
            <form action="{{ route('import.vendors') }}" method="POST" enctype="multipart/form-data" class="card-body">
                @csrf
                <a class="btn btn-dark" href="{{ route('template.vendors') }}">Download Template</a>
                <hr>
                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                    <div class="custom-file text-left">
                        <input type="file" name="vendors" class="custom-file-input" id="vendors">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @error('vendors')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button class="btn btn-primary">Import data</button>
                {{--            <a class="btn btn-success" href="{{ route('') }}">Export data</a>--}}
            </form>
        </div>
    </div>

    <div class="row  d-flex justify-content-between ">
        <div class="card  flex-md-fill m-1 ">
            <h3 class="card-header">Elements</h3>
            <form action="{{ route('import.elements') }}" method="POST" enctype="multipart/form-data" class="card-body">
                @csrf
                <a class="btn btn-dark" href="{{ route('template.elements') }}">Download Template</a>
                <hr>
                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                    <div class="custom-file text-left">
                        <input type="file" name="elements" class="custom-file-input" id="elements">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @error('elements')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <button class="btn btn-primary">Import data</button>
                {{--            <a class="btn btn-success" href="{{ route('import') }}">Export data</a>--}}
            </form>
        </div>

        <div class="card flex-md-fill m-1">
            <h3 class="card-header">Items</h3>
            <form action="{{ route('import.items') }}" method="POST" enctype="multipart/form-data" class="card-body">
                @csrf
                <a class="btn btn-dark" href="{{ route('template.items') }}">Download Template</a>
                <hr>
                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                    <div class="custom-file text-left">
                        <input type="file" name="items" class="custom-file-input" id="items">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                @error('items')
                <small class="text-danger">{{$message}}</small>
                @enderror
                <button class="btn btn-primary">Import data</button>
                {{--            <a class="btn btn-success" href="{{ route('import') }}">Export data</a>--}}
            </form>
        </div>
        <div class="card flex-md-fill m-1">
            <h3 class="card-header">Final Products</h3>
            <form action="{{ route('import.products') }}" method="POST" enctype="multipart/form-data" class="card-body">
                @csrf
                <a class="btn btn-dark" href="{{ route('template.products') }}">Download Template</a>
                <hr>
                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                    <div class="custom-file text-left">
                        <input type="file" name="products" class="custom-file-input" id="products">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @error('products')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button class="btn btn-primary">Import data</button>
                {{--            <a class="btn btn-success" href="{{ route('') }}">Export data</a>--}}
            </form>
        </div>
    </div>

    <div class="row  d-flex justify-content-between ">
        <div class="card  flex-md-fill m-1 ">
            <h3 class="card-header">Bills</h3>
            <form action="{{ route('import.bills') }}" method="POST" enctype="multipart/form-data" class="card-body">
                @csrf
                <a class="btn btn-dark" href="{{ route('template.bills') }}">Download Template</a>
                <hr>
                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                    <div class="custom-file text-left">
                        <input type="file" name="bills" class="custom-file-input" id="elements">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @error('bills')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <button class="btn btn-primary">Import data</button>
                {{--            <a class="btn btn-success" href="{{ route('import') }}">Export data</a>--}}
            </form>
        </div>

        <div class="card flex-md-fill m-1">
            <h3 class="card-header">Production Orders</h3>
            <form action="{{ route('import.production-orders') }}" method="POST" enctype="multipart/form-data" class="card-body">
                @csrf
                <button class="btn btn-dark" disabled href="{{ route('template.production-orders') }}">Download Template</button>
                <hr>
                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                    <div class="custom-file text-left">
                        <input type="file" disabled name="production-orders" class="custom-file-input" id="items">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                @error('production-orders')
                <small class="text-danger">{{$message}}</small>
                @enderror
                <button class="btn btn-primary" disabled>Import data</button>
                {{--            <a class="btn btn-success" href="{{ route('import') }}">Export data</a>--}}
            </form>
        </div>

    </div>

@endsection


