
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Reports</h1>
    <div class="">

    </div>
@stop

@section('content')

    <h2>Income & Expense</h2>
    <div class="row d-flex justify-content-between">

        <div class=" card flex-md-fill m-1">
            <div class="card-header">Expense Summary</div>
            <div class="card-body d-inline-flex">
                <i class='bx bx-cart bx-lg  my-auto' ></i>
                <p class=" my-auto">Monthly expense summary by category.</p>
            </div>
        </div>
        <div class=" card  flex-md-fill m-1">
            <div class="card-header">Income Summary</div>
            <div class="card-body d-inline-flex">
                <i class='bx bx-money bx-lg  my-auto' ></i>
                <p class=" my-auto">Monthly income summary by category.</p>
            </div>
        </div>
        <div class=" card  flex-md-fill m-1">
            <div class="card-header">Income vs Expense</div>
            <div class="card-body d-inline-flex">
                <i class='bx bx-money bx-lg my-auto' ></i>
                <p class="my-auto">Monthly income vs expense summary by category.</p>
            </div>
        </div>
    </div>

    <h2>Accounting</h2>
    <div class="row d-flex justify-content-between">
        <div class="card  flex-md-fill m-1">
            <div class="card-header">Profits & loss</div>
            <div class="card-body d-inline-flex">
                <i class='bx bx-heart bx-lg  my-auto' ></i>
                <p class=" my-auto">Quarterly profit & loss by category.</p>
            </div>
        </div>
    </div>

@endsection




