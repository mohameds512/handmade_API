@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Vendor {{$vendor->name}}</h1>
    <a href="{{route('purchases.vendors.index')}}">Manage Vendors</a>
@stop

@section('content')


        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <label>Vendor Name</label>
                <p><b>{{$vendor->name}}</b></p> <hr>
                    <label>Vendor Phone</label>
                    <p><b>{{$vendor->phone}}</b></p> <hr>
                <label>Vendor Email</label>
                <p><b>{{$vendor->email}}</b></p> <hr>
                    <label>Vendor Address</label>
                    <p><b>{{$vendor->address}}</b></p> <hr>
                <div class="d-flex ">

                    <a href="{{ route('purchases.vendors.edit',$vendor->id) }}" class="btn btn-info o">edit</a>

                    <form class="ml-5" action="{{route('purchases.vendors.destroy',$vendor->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="delete">
                    </form>

                </div>


            </div>
            <div class="col-md-6 ">

                <h3>Vendor Balance</h3>
                <table class="table table-responsive-md table-hover">
                    <tr>
                        <th>Total balance</th>
                        <td>  {{$totalPayments}} {{ setting('currency') }}</td>
                    </tr>
                    <tr>
                        <th>Total Paid</th>
                        <td>  {{$totalBills}} {{ setting('currency') }}</td>
                    </tr>
                    <tr>
                        <th>Open Bills</th>
                        <td>  {{$totalBills - $totalPayments}} {{ setting('currency') }}</td>
                    </tr>
                </table>


                <div class="card">
                    <div class="card-body">
                        <h3>History</h3>

                        <h5>{{$vendor->bills_count}} Bills </h5>
                        @forelse($vendor->payments()->take(10)->get() as $payment)
                            <p class="">{{ $payment->amount }}
                                    {{setting('currency')}} to <a href="{{route('purchases.bills.show',$payment->bill_id)}}">{{$payment->bill->number}} </a>  <small> at {{$payment->paid}}</small></p>
                        @empty
                            <p>No Transactions Yet</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

@endsection





