@extends('layouts.admin')

@section('meta')
    <style>
        .invoice {
            background: #fff;
            padding: 20px
        }

        .invoice-company {
            font-size: 20px
        }

        .invoice-header {
            margin: 0 -20px;
            background: #f0f3f4;
            padding: 20px
        }

        .invoice-date,
        .invoice-from,
        .invoice-to {
            display: table-cell;
            width: 1%
        }

        .invoice-from,
        .invoice-to {
            padding-right: 20px
        }

        .invoice-date .date,
        .invoice-from strong,
        .invoice-to strong {
            font-size: 16px;
            font-weight: 600
        }

        .invoice-date {
            text-align: right;
            padding-left: 20px
        }

        .invoice-price {
            background: #f0f3f4;
            display: table;
            width: 100%
        }

        .invoice-price .invoice-price-left,
        .invoice-price .invoice-price-right {
            display: table-cell;
            padding: 20px;
            font-size: 20px;
            font-weight: 600;
            width: 75%;
            position: relative;
            vertical-align: middle
        }

        .invoice-price .invoice-price-left .sub-price {
            display: table-cell;
            vertical-align: middle;
            padding: 0 20px
        }

        .invoice-price small {
            font-size: 12px;
            font-weight: 400;
            display: block
        }

        .invoice-price .invoice-price-row {
            display: table;
            float: left
        }

        .invoice-price .invoice-price-right {
            width: 25%;
            background: #2d353c;
            color: #fff;
            font-size: 28px;
            text-align: right;
            vertical-align: bottom;
            font-weight: 300
        }

        .invoice-price .invoice-price-right small {
            display: block;
            opacity: .6;
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 12px
        }

        .invoice-footer {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            font-size: 10px
        }

        .invoice-note {
            color: #999;
            margin-top: 80px;
            font-size: 85%
        }

        .invoice>div:not(.invoice-footer) {
            margin-bottom: 20px
        }

        .btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
            color: #2d353c;
            background: #fff;
            border-color: #d9dfe3;
        }
        @media print {
            .invoice{
                width: 100%;
                height: 100%;
            }
            .hidden-print {
                display: none;
            }
        }
    </style>

@endsection

@section('content_header')
        <h1>All Bills</h1>
        <a href="{{route('purchases.bills.create')}}" class="btn btn-success">Create Bill</a>
@endsection

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 invoice">
            <!-- begin invoice-company -->
            <div class="invoice-company text-inverse  d-flex justify-content-between">
                Bill
                <span class="pull-right hidden-print">
            <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class='bx bxs-file-blank bx-xs text-danger' ></i> Export as PDF</a>
            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class='bx bxs-printer bx-xs'></i> Print</a>
            </span>

            </div>
            <!-- end invoice-company -->
            <!-- begin invoice-header -->
            <div class="invoice-header">
                <div class="invoice-from">
                    <small>from</small>
                    <address class="m-t-5 m-b-5">
                        <strong class="text-inverse">{{$bill->vendor->name}}</strong><br>
                        {{$bill->vendor->address}}<br>
                        {{$bill->vendor->phone}}<br>

                    </address>
                </div>
                <div class="invoice-to">
                    <small>to</small>
                    <address class="m-t-5 m-b-5">
                        <strong class="text-inverse"> {{setting('company_name')}}</strong><br>
                        {{setting('address')}}<br>
                        {{setting('city')}}<br>
                        {{setting('phone')}}<br>
                        {{setting('email')}}
                    </address>
                </div>
                <div class="invoice-date">
                    <small>Bill / July period</small>
                    <div class="date text-inverse m-t-5">{{$bill->billed}}</div>
                    <div class="invoice-detail">
                        {{$bill->number}}<br>
                    </div>
                </div>
            </div>
            <!-- end invoice-header -->
            <!-- begin invoice-content -->
            <div class="invoice-content">
                <!-- begin table-responsive -->
                <div class="table-responsive">
                    <table class="table table-invoice">
                        <thead>
                        <tr>
                            <th>Item</th>
                            <th class="text-center" width="10%">Quantity</th>
                            <th class="text-center" width="10%">PRICE</th>
                            <th class="text-right" width="20%">LINE TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bill->items as $item)
                            <tr>
                                <td>
                                    <span class="text-inverse">{{$item->name}}</span><br>
                                    <small>{{$item->description}}</small>
                                </td>
                                <td class="text-center">{{$item->quantity}}</td>
                                <td class="text-center">{{$item->price}}</td>
                                <td class="text-right">{{ $item->quantity * $item->price}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
                <!-- begin invoice-price -->
                <div class="invoice-price">
                    <div class="invoice-price-left">
                        <div class="invoice-price-row">
                            <div class="sub-price">
                                <small>SUBTOTAL</small>
                                <span class="text-inverse">{{$bill->sub_total}} {{setting('currency')}}</span>
                            </div>
                            @if($bill->tax_total)
                            <div class="sub-price">
                                <i class="bx bx-plus bx-sm text-muted"></i>
                            </div>
                            <div class="sub-price">
                                <small>Tax</small>
                                <span class="text-inverse">{{ $bill->tax_total }} {{setting('currency')}}</span>
                            </div>
                            @endif
                            @if($bill->discount)
                                <div class="sub-price">
                                    <i class="bx bx-minus bx-sm text-muted"></i>
                                </div>
                                <div class="sub-price">
                                    <small>DISCOUNT</small>
                                    <span class="text-inverse">{{$bill->discount}} {{setting('currency')}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="invoice-price-right">
                        <small>TOTAL</small> <span class="f-w-600">{{$bill->total}} {{setting('currency')}}</span>
                    </div>
                </div>
                <!-- end invoice-price -->
            </div>
            <!-- end invoice-content -->
            <!-- begin invoice-note -->
            <div class="invoice-note">
                {{ setting('notes')}}
            </div>
            <!-- end invoice-note -->
            <!-- begin invoice-footer -->
            <div class="invoice-footer">
                <p class="text-center m-b-5 f-w-600">
                    {{ setting('footer')}}
                </p>
                <p class="text-center">
                    <span class="m-r-10"><i class="bx  bx-xs bx-globe"></i>{{ setting('website')}}</span>
                    <span class="m-r-10"><i class="bx  bx-xs bxs-phone"></i> {{ setting('phone')}}</span>
                    <span class="m-r-10"><i class="bx  bx-xs bx-envelope"></i> {{ setting('email') }}</span>
                </p>
            </div>
            <!-- end invoice-footer -->

        </div>
        <div class="col-md-6 hidden-print">
            <div class="card my-5 ">
                <div class="card-body">
                    <h3>History</h3>
                    @forelse($bill->payments as $payment)
                        <hr>
                        <p>{{$payment->amount}} {{setting('currency')}} <small>at {{$payment->paid}}</small></p>
                    @empty
                        <p>No Transactions Yet</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
