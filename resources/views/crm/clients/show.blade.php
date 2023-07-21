@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Client {{$client->name}}</h1>
    <a href="{{route('crm.clients.index')}}" class="btn btn-primary">All Clients</a>
@stop

@section('content')


        <div class="row justify-content-center">
            <div class="col-md-6 mb-3">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <label>Client Name</label>
                <p><b>{{$client->name}}</b></p> <hr>
                <label>Client Phone</label>
                <p><b>{{$client->phone}}</b></p> <hr>
                @if($client->email)
                <label>Client Email</label>
                <p><b>{{$client->email}}</b></p> <hr>
                @endif
                    @if($client->company)
                        <label>Company </label>
                        <p><b><a href="{{route('crm.companies.show',$client->company_id)}}">{{$client->company->name}}</a></b></p> <hr>
                    @endif
                <div class="d-flex ">
                    <a href="{{ route('crm.clients.edit',$client->id) }}" class="btn btn-info o">edit</a>
                    <form class="ml-5" action="{{route('crm.clients.destroy',$client->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="delete">
                    </form>
                </div>


            </div>
            <div class="col-md-6 ">

                        <h3>Client Balance</h3>
                        <table class="table table-responsive-md table-hover">
                            <tr>
                                <th>Total balance</th>
                                <td>  {{$totalInvoices}} {{ setting('currency') }}</td>
                            </tr>
                            <tr>
                                <th>Total Paid</th>
                                <td>  {{$totalRevenues}} {{ setting('currency') }}</td>
                            </tr>
                            <tr>
                                <th>Open Invoices</th>
                                <td>  {{$totalInvoices - $totalRevenues}} {{ setting('currency') }}</td>
                            </tr>
                        </table>


        <div class="card">
            <div class="card-body">
                <h3>History</h3>

                <h5>{{$client->invoices_count}} Invoice </h5>
                @forelse($client->revenues()->take(10)->get() as $revenue)
                    <p class="">{{ $revenue->amount }}
                        {{setting('currency')}} <a href="{{route('sales.invoices.show',$revenue->invoice_id)}}"> {{$revenue->invoice->number}} </a> <small> at {{$revenue->paid}}</small></p>
                    @empty
                    <p>No Transaction Yet</p>
                @endforelse
            </div>
        </div>
            </div>
        </div>

@endsection

