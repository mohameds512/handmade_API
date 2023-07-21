@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="main-body  justify-content-center">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="/storage/{{ $user->profile->profile_photo ?? 'pics/profile.png'}}" alt="profile picture"  class="rounded-circle border" width="150">
                                <div class="mt-3">
                                    <h4>@lang('messages.welcome') {{$user->name}}</h4>
                                    <p class="text-secondary mb-1 ">{{$user->profile->bio}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 align-items-md-center ml-5">
                                    <a class="btn btn-info w-75" href="{{ route('profile.edit') }}">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($user->profile->url)
                        <div class="card mt-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <i class="fas fab-facebook" ></i>
                                    <a href="{{$user->profile->url}}"  class="text-secondary">{{$user->profile->url}}</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{__('auth.name')}}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{__('auth.email')}}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{__('auth.phone')}}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->phone}}
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{__('auth.address')}}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" dir="rtl">
                                    {{$user->profile->address}} ,{{$user->profile->area}},
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>
                    <div class="row gutters-sm">
{{--                        @if($allTasks > 0)--}}

{{--                            <div class="col-sm-6 mb-3">--}}
{{--                                <div class="card h-100">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <h6 class="d-flex align-items-center mb-3">{{__('names.tasks')}} </h6>--}}
{{--                                        <small>{{__('names.task')}} {{__('names.status')}}</small>--}}
{{--                                        <div class="progress mb-3" style="height: 12px">--}}
{{--                                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar"  style="width: {{($doneTasks / $allTasks) * 100   }}%" aria-valuenow="{{$doneTasks}}" aria-valuemin="0" aria-valuemax="{{$allTasks}}">--}}
{{--                                                {{$doneTasks}} of  {{$allTasks}}--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                        @endif--}}
{{--                        @if($allOrders > 0)--}}
{{--                            <div class="col-sm-6 mb-3">--}}
{{--                                <div class="card h-100">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <h6 class="d-flex align-items-center mb-3">{{__('names.orders')}} </h6>--}}
{{--                                        <small>{{__('names.orders')}} {{__('names.status')}}</small>--}}
{{--                                        <div class="progress mb-3" style="height: 12px">--}}
{{--                                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar"  style="width: {{($doneOrders / $allOrders) * 100   }}%" aria-valuenow="{{$doneOrders}}" aria-valuemin="0" aria-valuemax="{{$allOrders}}">--}}
{{--                                                {{$doneOrders}} of  {{ $allOrders}}--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                        @endif--}}
                    </div>



                </div>
            </div>
            <div class="container-fluid py-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">{{ __('Profile Information') }}</h6>
                    </div>
                    <div class="card-body pt-4 p-3">

                        @if (false)
                            <div wire:model="showDemoNotification" class="mt-3  alert alert-primary alert-dismissible fade show"
                                 role="alert">
                        <span class="alert-text text-white">
                            {{ __('You are in a demo version, you can\'t update the profile.') }}</span>
                                <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        @endif

                        @if (false)
                            <div wire:model="showSuccesNotification"
                                 class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                                <span
                                    class="alert-text text-white">{{ __('Your profile information have been successfuly saved!') }}</span>
                                <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        @endif

                        <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user-name" class="form-control-label">{{ __('Full Name') }}</label>
                                        <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                            <input wire:model="user.name" class="form-control" type="text" placeholder="Name"
                                                   id="user-name">
                                        </div>
                                        @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                                        <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                            <input wire:model="user.email" class="form-control" type="email"
                                                   placeholder="@example.com" id="user-email">
                                        </div>
                                        @error('user.email') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user.phone" class="form-control-label">{{ __('Phone') }}</label>
                                        <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                            <input wire:model="user.phone" class="form-control" type="tel"
                                                   placeholder="40770888444" id="phone">
                                        </div>
                                        @error('user.phone') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user.location" class="form-control-label">{{ __('Location') }}</label>
                                        <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                            <input wire:model="user.location" class="form-control" type="text"
                                                   placeholder="Location" id="name">
                                        </div>
                                        @error('user.location') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="about">{{ 'About Me' }}</label>
                                <div class="@error('user.about')border border-danger rounded-3 @enderror">
                            <textarea wire:model="user.about" class="form-control" id="about" rows="3"
                                      placeholder="Say something about yourself"></textarea>
                                </div>
                                @error('user.about') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

@endsection

