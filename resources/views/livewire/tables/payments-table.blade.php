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
                <th>Vendor</th>
                <th>Amount</th>
                <th>Paid At</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>
            @forelse($payments as $payment)
                <tr>
                    <td><a href="{{route('purchases.bills.show',$payment->bill->id)}}">{{$payment->bill?->code}}</a></td>
                    <td>{{$payment->vendor?->name ?? 'no data'}}</td>
                    <td>{{$payment->amount}} EGP</td>
                    <td>{{$payment->paid ?? ''}}</td>

                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('purchases.payments.edit',$payment->id) }}"
                               class="btn btn-secondary">edit</a>
                            <form action="{{route('purchases.payments.destroy',$payment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No Payments yet</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $payments->links() }}
    </div>
</div>










