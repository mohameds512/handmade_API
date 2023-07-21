<div class="container-fluid ">
    <div class="row my-3 d-flex">
        <div class="col-md-6">
            <input type="search" wire:model.debounce.400ms="search" class="form-control" placeholder="search in names">
        </div>
        <div class="col-xs-2">
            <select wire:model="orderBy" class="form-control-sm">
                <option value="paid_at">Paid At</option>
                <option>Amount</option>
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
        <table class="table table-hover table-responsive-md table-bordered">
            <thead>
            <tr>
                <th>Number</th>
                <th>Client</th>
                <th>Amount</th>
                <th>Paid At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($revenues as $revenue)
                <tr>
                    <td>{{$revenue->invoice?->number ?? 'no data'}}</td>
                    <td>{{$revenue->client?->name ?? 'no data'}}</td>

                    <td>{{$revenue->amount}} EGP</td>
                    <td>{{$revenue->paid ?? ''}}</td>

                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('sales.revenues.edit',$revenue->id) }}"
                               class="btn btn-secondary">edit</a>
                            <form action="{{route('sales.revenues.destroy',$revenue->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No Revenues yet</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $revenues->links() }}
    </div>
</div>










