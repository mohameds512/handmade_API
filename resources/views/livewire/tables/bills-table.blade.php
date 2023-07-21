<div class="container-fluid ">
    <div class="row my-3 d-flex">
        <div class="col-md-6">
            <input type="search" wire:model.debounce.400ms="search" class="form-control" placeholder="search in names">
        </div>
        <div class="col-xs-2">
            <select wire:model="orderBy" class="form-control-sm">
                <option value="number">Bill Number</option>
                <option>Total</option>
                <option>Status</option>
                <option value="billed_at">billed At</option>
                <option>due_at</option>
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
                <th>Code</th>
                <th>Vendor</th>
                <th>Amount</th>
                <th>Status</th>
                <th>billed_at</th>
                <th>due_at</th>

                <th>notes</th>
            </tr>
            </thead>
            <tbody>
            @forelse($bills as $bill)
                <tr>
                    <td><a href="{{route('purchases.bills.show',$bill->id)}}">{{$bill->code}}</a></td>
                    <td>{{$bill->vendor->name}}</td>
                    <td>{{$bill->total}} {{setting('currency')}}</td>
                    <td>{{$bill->status->name}}</td>
                    <td>{{$bill->billed}}</td>
                    <td>{{$bill->due}}</td>
                    <td>{{$bill->notes ?? 'no notes'}}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('purchases.bills.edit',$bill->id) }}"
                               class="btn btn-secondary">edit</a>
                            <form action="{{route('purchases.bills.destroy',$bill->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No Bills yet</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $bills->links() }}
    </div>
</div>










