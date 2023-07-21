@extends('layouts.admin')

@section('content_header')
    <h1>Work Setting</h1>
@stop

@section('content')
    <div class="row justify-content-center ">
        <div class="col-lg-8 card">
            <div class="card-body">
                <form action="{{route('setting.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="is_element_last_price" value="0">
                    <input type="hidden" name="is_product_last_price" value="0">
                    <input type="hidden" name="is_all_salaries" value="0">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="working_days">Working Days</label>
                        <input type="number" name="working_days" class="form-control" value="{{ setting('working_days') ?? old('working_days')}}">
                        @error('working_days')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="working_hours">Working Hours</label>
                        <input type="number" name="working_hours" class="form-control" value="{{ setting('working_hours') ?? old('working_hours')}}">
                        @error('working_hours')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="element_last_price">working hour with all salaries</label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="is_all_salaries" class="custom-control-input" id="customSwitch3" value="1" @if(setting('is_avg_salary') ) checked @endif>
                            <label class="custom-control-label" for="customSwitch3">working hour with number of worker</label>
                        </div>
                        @error('is_avg_salary')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="avg_salary">Average Salary</label>
                        <input type="number" name="avg_salary" class="form-control" value="{{ setting('avg_salary') ?? old('avg_salary')}}">
                        @error('avg_salary')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="is_element_last_price">Element Average Prices</label>
                        <div class="custom-control custom-switch">
                        <input type="checkbox" name="is_element_last_price" class="custom-control-input " id="customSwitch2" value="1" @if(setting('is_element_last_price') ) checked @endif>
                        <label class="custom-control-label" for="customSwitch2">Element Last price</label>
                        </div>
                            @error('is_element_avg_price')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="is_product_last_price">Product Average Prices </label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="is_product_last_price" class="custom-control-input" id="customSwitch1" value="1" @if(setting('is_product_last_price') ) checked @endif>
                            <label class="custom-control-label" for="customSwitch1">Product Last price</label>
                        </div>

                        @error('is_product_last_price')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">

                    </div>


                    <button type="submit" class="btn bg-gradient-green text-white w-100 h4 mt-4">
                        Save
                    </button>

                </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <!-- Bootstrap Switch -->

    @endpush
