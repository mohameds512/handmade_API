@extends('layouts.admin')

@section('content_header')
    <h1>Pending Products</h1>
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
            <form action="{{route('inventory.products.add')}}" method="post">
                @csrf
                <table class="table table-responsive-md table-hover">
                    <tr>
                        <th class="border  py-2">select</th>
                        <th class="border  py-2">Name</th>
                        <th class="border  py-2">Description</th>
                        <th class="border  py-2">Quantity</th>

                        @can('purchases')
                            <th class="border  py-2">Price</th>
                        @endcan
                        <th class="border  py-2">Created At</th>
                    </tr>
                    @forelse($pendingItems as $item)
                        <tr>
                            <td><input type="checkbox" name="items[]" value="{{$item->id}}"></td>
                            <td> @if($item->element)
                                    <a href="{{route('formulas.elements.show',$item->element->id)}}">
                                        {{$item->element?->name }}
                                    </a>
                                @else
                                    {{$item->name}}
                                @endif
                            </td>
                            <td>{{$item->description ?? 'no description'}}</td>
                            <td>{{$item->quantity}} {{$item->unit}}</td>
                            <td>{{$item->price}} EGP</td>
                            <td>{{$item->created}}</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">There is no pending Products, you can create order  at <a href="{{route('production.create')}}">Production</a></td>
                        </tr>
                    @endforelse

                </table>
                <button class="btn btn-dark">Add to Inventory</button>
            </form>
        </div>
    </div>


    {{--            <livewire:forms.items-insert :inventoryId="$id" />--}}
@endsection



