<div class="container-fluid ">
    <div class="row my-3 d-flex">
        <div class="col-md-6">
            <input type="search" wire:model.debounce.400ms="search" class="form-control" placeholder="search in names">
        </div>
        <div class="col-xs-2">
            <select wire:model="orderBy" class="form-control-sm">
                <option>Id</option>
                <option>Quantity</option>
                @can('purchases')  <option>Price</option> @endcan
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
        <table class="table table-hover table-responsive-sm ">
            <thead>
            <th class="border  py-2">Name</th>
            <th class="border  py-2">Description</th>
            <th class="border  py-2">Quantity</th>

            @can('purchases')
                <th class="border  py-2">Price</th>
            @endcan
            <th class="border  py-2">Created At</th>
            {{--                <th class="border  py-2">Edit</th>--}}
            {{--                <th class="border  py-2">Delete</th>--}}
            </thead>
            <tbody>
            @forelse($items as $item)
                <tr>
                    <td class="border  py-2">{{$item->name}}</td>
                    <td class="border  py-2">{{$item->description ?? 'no description'}}</td>
                    <td class="border  py-2">{{$item->quantity}} {{$item->unit}}</td>
                    @can('purchases')
                        <td class="border  py-2">
                            {{$item->price}}
                        </td>
                    @endcan
                    <td class="border  py-2">{{$item->created_at->format('d-m-Y')}}</td>
                </tr>
            @empty
                <tr>
                    <th>
                        no result found
                    </th>

                </tr>

            @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $items->links() }}
    </div>
    <div class="row">
        <div class="btn btn-danger" wire:click="export">
            Export
        </div>
    </div>

</div>
