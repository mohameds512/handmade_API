@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Company {{$company->name}}</h1>
    <a href="{{route('crm.companies.index')}}" class="btn btn-primary">Manage Companies</a>
@stop

@section('content')


        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <label>Company Name</label>
                <p><b>{{$company->name}}</b></p> <hr>
                <label>Company Address</label>
                <p><b>{{$company->address}}, {{$company->state}}</b></p> <hr>
                    <label>Company Clients</label>
                    @forelse($company->clients as $client)
                        <p><a href="{{route('crm.clients.show',$client->id)}}">{{$client->name}}</a></p>
                    @empty
                        <p>Company dosen't have any clients</p>
                    @endforelse

                    <hr>
                <div class="d-flex ">

                    <a href="{{ route('crm.companies.edit',$company->id) }}" class="btn btn-info o">edit</a>

                    <form class="ml-5" action="{{route('crm.companies.destroy',$company->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="delete">
                    </form>

                </div>


            </div>
            <div class="col-md-6">
                <h3>History</h3>
                <p>No History yet</p>
            </div>
        </div>

@endsection

