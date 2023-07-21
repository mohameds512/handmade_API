@extends('layouts.admin')

@section('content_header')
    <h1>Invoices Setting</h1>
@stop

@section('content')
    <div class="row justify-content-center ">
        <div class="col-lg-8 card">
            <div class="card-body">
                <h3>Invoice</h3>
                <form action="{{route('setting.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="show_logo" value="0">
                    <input type="hidden" name="show_item_description" value="0">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="number_prefix">Number Prefix</label>
                        <input type="text" name="number_prefix" class="form-control"  value="{{ setting('number_prefix') ?? old('number_prefix')}}">
                        @error('number_prefix')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="due_to_days">Due To Days</label>
                        <input type="number" name="due_to_days" class="form-control"  value="{{ setting('due_to_days') ?? old('due_to_days')}}">
                        @error('due_to_days')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="show_item_description">Show Item Description</label>
                        <input type="checkbox" name="show_item_description" class="form-control"  value="1" @if(setting('show_item_description')) checked @endif >
                        @error('show_item_description')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="show_logo">Show Logo</label>
                        <input type="checkbox" name="show_logo" class="form-control"  value="1" @if(setting('show_logo')) checked @endif>
                        @error('show_logo')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
{{--                    <div class="col-md-6">--}}
{{--                        <label for="color">Color</label>--}}
{{--                        <input type="color" name="color" class="form-control"  value="{{ setting('color') ?? old('color')}}">--}}
{{--                        @error('color')--}}
{{--                        <small class="text-danger">{{$message}}</small>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
                    <div class="col-md-6">
                        <label for="invoice_notes">Invoice Notes</label>
                        <textarea type="text" dir="rtl"  name="invoice_notes" class="form-control" rows="5"  >{{ setting('invoice_notes') ?? old('invoice_notes')}} </textarea>
                        @error('invoice_notes')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="invoice_footer">Invoice Footer</label>
                        <textarea type="text" dir="rtl"  name="invoice_footer" class="form-control" rows="2" > {{ setting('invoice_footer') ?? old('invoice_footer')}}</textarea>
                        @error('invoice_footer')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <br>
                    <hr>
                    <div class="col-md-12">
                        <h3>Price Offer</h3>
                    </div>
                    <div class="col-md-6">
                        <label for="price_offer_notes">Price Offer Notes</label>
                        <textarea type="text" dir="rtl" name="price_offer_notes" class="form-control" rows="5" >{{ setting('price_offer_notes') ?? old('price_offer_notes')}} </textarea>
                        @error('price_offer_notes')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="price_offer_footer">Footer</label>
                        <textarea type="text" dir="rtl"  name="price_offer_footer" class="form-control" rows="2" > {{ setting('price_offer_footer') ?? old('price_offer_footer')}}</textarea>
                        @error('price_offer_footer')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
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
