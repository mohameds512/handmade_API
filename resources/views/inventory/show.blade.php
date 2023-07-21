@extends('layouts.admin')

@section('content_header')

    <div class="">    <h1>Inventory {{$inventory->name}}</h1></div>
    <div class="">  <a href="{{route('inventory.insert',$inventory->id)}}" class="btn btn-dark">Insert Items</a></div>
@stop

@section('content')

        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">

                <livewire:tables.inventory-table :inventoryId="$inventory->id"   />
            </div>
        </div>



@endsection


