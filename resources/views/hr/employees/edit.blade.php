@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content_header')
    <div class="">    <h1>Edit Employee</h1></div>
    <div class="">  <a href="{{route('hr.employees.index')}}">Manage Employees</a></div>

@stop
@section('content')

        <div class="row">
            <div class="col-md-12">


                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{route('hr.employees.update',$employee->id)}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{ $employee->name }}"  autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="phone" class=" col-form-label text-md-right">Phone</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone"  value="{{ $employee->phone }}"  autocomplete="phone">

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="salary" class=" col-form-label text-md-right">Salary</label>
                            <input type="number" class="form-control @error('salary') is-invalid @enderror" name="salary"  value="{{ $employee->salary }}" autocomplete="salary">
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
                            <input type="text" class="form-control @error('position') is-invalid @enderror" name="position"  value="{{ $employee->position }}" autocomplete="position">

                            @error('position')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="joined_at" class=" col-form-label text-md-right">Joined At</label>
                            <input type="date" class="form-control @error('joined_at') is-invalid @enderror" name="joined_at"  value="{{ $employee->joined_at?->format('Y-m-d') }}"  autocomplete="joined_at">
                            @error('joined_at')
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



