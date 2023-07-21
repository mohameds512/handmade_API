@extends('layouts.admin')

@section('content_header')

      <h1>{{$inventory->name}} Inventory </h1>
     <a href="{{route('inventory.pending')}}" class="btn btn-dark">Pending Items</a>
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
                <livewire:tables.inventory-table :inventoryId="$inventory->id"  />
            </div>
        </div>

@endsection


