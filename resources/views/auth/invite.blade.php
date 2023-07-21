@extends('layouts.admin')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">


                <div class="panel panel-default card">
                    <div class="panel-heading card-header ">Requesting Invitation</div>

                    <div class=" card-body">
                        <p>{{ config('app.name') }} is a closed community. You must have an invitation link to register. You can request your link below.</p>

                        <form class="form-horizontal" method="POST" action="{{ route('process') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Request An Invitation
                                    </button>

                                    <a class="btn btn-link" href="{{ route('login') }}">
                                        Already Have An Account?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
