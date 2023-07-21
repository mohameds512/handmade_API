@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('hr.users.index')}}">{{__('names.manage')}} {{__('names.users')}}</a>
            <h1 class="text-center">{{__('auth.edit')}} {{__('names.user')}} {{$user->name}}</h1>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('auth.name') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}"  autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('auth.bio') }}</label>
                    <div class="col-md-6">
                        <input id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ $user->profile->bio  }}"  >
                        @error('bio')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('auth.email') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}"  autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('auth.phone') }}</label>
                    <div class="col-md-6">
                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone  }}"  autocomplete="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">{{__('auth.address')}}</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->profile->address  }}"  >

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
{{--                <div class="form-group row">--}}
{{--                    <label for="area" class="col-md-4 col-form-label text-md-right">{{__('names.area')}}</label>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <select id="area" class="form-select form-control @error('area') is-invalid @enderror" name="area"  aria-label="Default select example" >--}}
{{--                            @foreach($areas as $area)--}}
{{--                            <option value="{{$area}}" @if($area === $user->profile->area)--}}
{{--                                {{ __('selected') }}--}}
{{--                                @endif>{{$area}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        @error('area')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label for="state" class="col-md-4 col-form-label text-md-right">{{__('auth.state')}}</label>--}}

{{--                    <div class="col-md-6">--}}
{{--                        <select name="state" class="form-select form-control"  aria-label="Default select example" >--}}
{{--                            @foreach($states as $state)--}}
{{--                            <option value="{{$state->id}}" @if($state=== $user->state->name)--}}
{{--                                {{ __('selected') }}--}}
{{--                                @endif>{{$state->name}}</option>--}}
{{--                            @endforeach--}}

{{--                        </select>--}}
{{--                        @error('state')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label text-md-right">{{__('auth.url')}}</label>

                    <div class="col-md-6">
                        <input id="url" type="tel" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $user->profile->url  }}"  >

                        @error('url')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="profile_photo" class="col-md-4 col-form-label text-md-right">{{__('auth.photo')}}</label>
                    <div class="col-md-6">
                        <input id="profile_photo" type="file" class="form-control @error('profile_photo') is-invalid @enderror" name="profile_photo" >
                        @error('profile_photo')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-2">
                        <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                             alt="preview image" style="max-height: 250px;">
                    </div>
                </div>





                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{__('auth.update')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">

    $(document).ready(function (e) {


        $('#profile_photo').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

    });

</script>
@endsection



