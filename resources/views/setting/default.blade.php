@extends('layouts.admin')

@section('content_header')
    <h1>Default Setting</h1>
@stop

@section('content')
    <div class="row justify-content-center ">
        <div class="col-lg-8 card">
            <div class="card-body">
                <form action="{{route('setting.store')}}" method="post">
                    @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="default_language">Language</label>
                        <select name="default_language"  class="form-control select2">
                            @foreach($languages as $lang)
                                <option @if($lang == setting('default_language')) selected @endif>{{$lang}} </option>
                            @endforeach
                        </select>
                        @error('default_language')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="currency">Currency</label>
                        <select name="currency"  class="form-control select2">
                            @foreach($currencies as $currency)
                                <option @if($currency == setting('currency')) selected @endif>{{$currency}} </option>
                            @endforeach
                        </select>
                        @error('currency')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="default_taxes">Tax</label>
                        <select name="default_taxes[]" multiple class="form-control select2">
                            @forelse($taxes as $tax)
                            <option value="{{$tax->id}}" @if($tax->active ) selected  @endif>{{$tax->name}} ({{$tax->percent}} %)</option>
                                @empty
                                <option value="">Add at least on tax at the setting</option>
                            @endforelse
                        </select>
                        @error('default_taxes')
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
