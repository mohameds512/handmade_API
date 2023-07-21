@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Company</h1>
    <a href="{{ route('crm.companies.index') }}" class="btn btn-outline-primary">All Companies</a>
@stop
@section('content')

        <div class="row">
            <div class="col-md-12">



                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{route('crm.companies.update',$company->id)}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $company->name }}"  autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="phone" class=" col-form-label text-md-right">Phone</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $company->phone }}"  autocomplete="phone">

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="email" class=" col-form-label text-md-right">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $company->email }}" autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="state" class=" col-form-label text-md-right">State</label>
                            <select name="state" class="form-control "  >
                                <option value="">Select State</option>
                                @foreach($states as $state)
                                    <option value="{{$state}}" @if($state == $company->state) selected @endif >{{$state}}</option>
                                @endforeach
                            </select>
                            @error('state')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <label for="address" class=" col-form-label text-md-right">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $company->address }}"  autocomplete="address">

                            @error('address')
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



