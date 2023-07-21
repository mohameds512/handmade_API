@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Client</h1>
    <a href="{{route('crm.clients.index')}}">Manage Clients</a>
@stop
@section('content')

        <div class="row">
            <div class="col-md-12">


                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{route('crm.clients.update',$client->id)}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $client->name }}"  autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class=" col-form-label text-md-right">Phone</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $client->phone }}"  autocomplete="phone">

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="code" class=" col-form-label text-md-right">Code</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ $client->code }}"  autocomplete="code">

                            @error('code')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="status" class=" col-form-label text-md-right">Status</label>
                            <select name="status_id" class="form-control "  >
                                <option value="">Select Status</option>
                                @foreach($statuses as $status)
                                    <option value="{{$status->id}}" @if($status->id = $client->status?->id) selected  @endif >{{$status->name}}</option>
                                @endforeach
                            </select>
                            @error('Company')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="company" class=" col-form-label text-md-right">Company</label>
                            <select name="company_id" class="form-control "  >
                                <option value="">Select Company</option>
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}"  @if($company->id = $client->company?->id) selected  @endif>{{$company->name}}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 ">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection



