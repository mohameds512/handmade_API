@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content_header')
    <div class=""><h1>Create Employee</h1></div>
    <div class="">  <a href="{{ route('hr.employees.index') }}" class="btn btn-outline-primary">All Employees</a></div>

@stop
@section('content')

        <div class="row justify-content-center">
            <div class="col-md-12">


                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('hr.employees.store') }}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="phone" class=" col-form-label text-md-right">Phone</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone">

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="salary" class=" col-form-label text-md-right">Salary</label>
                            <input type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}"  autocomplete="salary">
                            @error('salary')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-8">
                            <label for="position" class=" col-form-label text-md-right">Position</label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}"  autocomplete="position">

                            @error('position')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="joined_at" class=" col-form-label text-md-right">Joined At</label>
                            <input type="date" class="form-control @error('joined_at') is-invalid @enderror" name="joined_at" value="{{ old('joined_at') }}"  autocomplete="joined_at">
                            @error('joined_at')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>





                    <div class="form-group row mb-0">
                        <div class="col-md-6 ">
                            <button type="submit" class="btn btn-success">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection

