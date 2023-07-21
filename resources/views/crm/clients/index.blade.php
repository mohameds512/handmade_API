@extends('layouts.admin')

@section('content_header')
    <h1>All Clients</h1>
    <a href="{{route('crm.clients.create')}}" class="btn btn-success">Create Client</a>
@stop

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <table class="table table-hover table-responsive-md table-bordered">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Code</td>
                    <td>Status</td>
                    <td>Company</td>
                </tr>
                </thead>
                <tbody>
                @forelse($clients as $client)
                    <tr>
                        <td><a href="{{route('crm.clients.show',$client->id)}}">{{$client->name}}</a></td>
                        <td>{{$client->phone ?? 'no phone'}}</td>
                        <td>{{$client->code ?? 'no phone'}}</td>
                        <td>{{$client->status->name ?? 'no status'}}</td>
                        <td>{{$client->company->name ?? 'none'}}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('crm.clients.edit',$client->id) }}"
                                   class="btn btn-secondary">edit</a>
                                <form action="{{route('crm.clients.destroy',$client->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>No Clients yet</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $clients->links() }}
        </div>
    </div>



@endsection


