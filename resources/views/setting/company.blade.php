@extends('layouts.admin')

@section('content_header')
    <h1>Company Setting</h1>
@stop

@section('content')
    <div class="row justify-content-center ">
        <div class="col-lg-8 card">
            <div class="card-body">
                <form action="{{route('setting.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="company_name">Company Name</label>
                            <input type="text" name="company_name" value="{{ setting('company_name') ?? old('company_name')}}" class="form-control">
                            @error('company_name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone">phone</label>
                            <input type="tel" name="phone" class="form-control" value="{{ setting('phone') ?? old('phone')}}">
                            @error('phone')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ setting('email') ?? old('email')}}">
                            @error('email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ setting('address') ?? old('address')}}">
                            @error('address')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" value="{{ setting('city') ?? old('city')}}">
                            @error('city')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="website">Website</label>
                            <input type="text" name="website" class="form-control" value="{{ setting('website') ?? old('website')}}">
                            @error('website')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>



                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="company_logo" class="label">Logo</label>
                            <input type="file" name="company_logo" id="company_logo"  class="form-control  @error('company_logo') is-invalid @enderror" >
                            @error('company_logo')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <img id="preview-image-before-upload"  src="{{asset(setting('company_logo')) }}"
                                 alt="preview image" style="max-height: 250px;">
                        </div>
                    </div>
                    <button type="submit" class="btn bg-gradient-green text-white w-100 h4 mt-4">
                        Save
                    </button>
                </form>

            </div>

        </div>
    </div>
@endsection

@push('js')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">

        $(document).ready(function (e) {


            $('#company_logo').change(function(){

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });

    </script>

@endpush
