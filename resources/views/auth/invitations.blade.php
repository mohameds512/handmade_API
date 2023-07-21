@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="page-header justify-content-between " style="margin-top: 0">
        <h1>Invitation Requests</h1>
    </div>

    <div class="panel panel-default" style="margin-top: 20px">

        <div class="flex justify-content-between">
            <div class="h5">Pending Requests <span class="badge badge-dark">{{ count($invitations) }}</span></div>
            <a href="{{ route('invite') }}"  class="btn btn-primary ml-auto">Invite</a>
        </div>


        <div class="panel-body" style="padding: 0;">
            @if (!empty($invitations))
            <table class="table table-responsive table-striped" style="margin-bottom: 0">
                <thead>
                <tr>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Sender</th>
                    <th>Invitation Link</th>
                    <th>Registered at</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($invitations as $invitation)
                <tr>
                    <td><a href="mailto:{{ $invitation->email }}">{{ $invitation->email }}</a></td>
                    <td>{{ $invitation->created_at }}</td>
                    <td>{{ $invitation->sender->name }}</td>
                    <td>
                        <kbd>{{ $invitation->getLink() }}</kbd>
                    </td>
                    <td>{{ $invitation->registered ?? 'Not yet' }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <p>No invitation requests!</p>
            @endif
        </div>
    </div>
</div>
@endsection