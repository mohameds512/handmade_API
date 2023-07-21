<div class="container-fluid ">

    <div class="row my-3 d-flex">
        <div class="col-md-6">
            <input type="search" wire:model.debounce.400ms="search" class="form-control" placeholder="search in names">
        </div>
        <div class="col-xs-2">
            <select wire:model="orderBy" class="form-control-sm">
                <option>Id</option>
                <option>Amount</option>
                <option value="created_at">Created</option>
            </select>
        </div>
        <div class="col-xs-2">
            <select wire:model="orderDesc" class="custom-select-sm border">
                <option value="1">Desc</option>
                <option value="0">Asc</option>

            </select>
        </div>
        <div class="col-xs-2">
            <select wire:model="perPage" class="form-control-sm">
                <option>5</option>
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12" >
            <table class="table table-hover table-responsive-md">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Formula</th>
                    <th>Amount</th>
                    <th>Inventory</th>
                    <th>production</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($productionOrders as $k=> $order)
                    <tr>
                        <td>{{$order->number}}</td>
                        <td>
                            <a href="{{route('production.show',$order->id)}}">{{$order->formula?->code}}</a>
                        </td>
                        <td>{{$order->amount }} kg</td>

                        <td>

                            @if(!$order->items->isEmpty())
                            <a href="{{route('production.print',$order->id)}}" target="_blank" class="btn btn-secondary ">
                                print
                            </a>
                            @else
                                no items to print
                            @endif
                        </td>


                        <td>
                            <a href="{{route('production.pdf',$order->id)}}" target="_blank" class="btn btn-dark ">
                                print
                            </a>
                        </td>
                        <td> {{$order->created_at->format('d-m-Y')}} <small>by {{ $order->user->name }}</small> </td>
                        <td class="d-flex justify-content-between">
                            @if(!$order->done_at)
                            <a href="{{route('production.done',$order->id)}}" class="btn btn-dark">done</a>

                            <a href="{{route('production.edit',$order->id)}}" class="btn btn-info">Edit</a>

                                <form action="{{route('production.destroy',$order->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>

                            @else
                                done at {{$order->done}}
                            @endif
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td>
                            no result found
                        </td>
                    </tr>


                @endforelse
                </tbody>
            </table>


        </div>

        <div class="d-flex justify-content-center">
            {{ $productionOrders->links() }}
        </div>
    </div>
</div>
