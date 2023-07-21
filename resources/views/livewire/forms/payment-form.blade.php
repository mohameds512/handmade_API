<div>
    <form method="POST" action="{{ route('purchases.bills.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-5 ">
                <div class="card-body">
                    <h2>Vendor</h2>
                    @if($vendor)
                        <p>{{$vendor->name}} -- {{$vendor->phone}}</p>
                        <p>{{$vendor->address}}</p>

                        <div wire:click.pervent="clearVendor" class="btn btn-secondary btn-sm">choose another Vendor
                        </div>
                    @else
                        <div class="form-group sidebar-search-open w-100">
                            <div class="input-group">
                                <input class="form-control " wire:model.debounce.200ms="query" type="search"
                                       placeholder="Search Vendors..."
                                       aria-label="Search">

                            </div>
                            <div class="list-group">
                                <div class="list-group-item" wire:loading wire:target="query">
                                    Loading Vendors...
                                </div>
                            </div>

                            @if(!empty($query))

                                <div class="list-group" wire:loading.remove>
                                    @forelse($searchVendors as $ven)
                                        <a href="#" wire:click.prevent="selectVendor({{$ven->id}})"
                                           class="list-group-item text-decoration-none">
                                            <div class="">{{$ven->name}} -- {{$ven->phone}}</div>
                                            <small class="">{{$ven->address}}</small>
                                        </a>
                                    @empty
                                        <div class="list-group-item">
                                            No Vendors Found
                                        </div>
                                    @endforelse
                                </div>
                            @endif
                        </div>
                        <livewire:forms.vendor-modal-form/>
                    @endif
                </div>
            </div>
            <div class="col-md-7 ">
                <div class="form-group row card-body">
                    <div class="col-md-6">
                        <label for="paid_at">Paid At</label>
                        <input type="date" wire:model.lazy="paid_at" class="form-control">
                        @error('paid_at')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="amount">Amount</label>
                        <input type="number" wire:model.lazy="amount" class="form-control">
                        @error('amount')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    @if($vendor)
                    <div class="col-md-6">
                        <label for="bill_id">Bill</label>
                        <select wire:model.lazy="bill_id" class="form-control">
                            <option value="">Select Bill</option>
                            @foreach($bills as  $bill)
                                <option value="{{$bill->id}}">{{$bill->billed}} -- {{ $bill->number }}</option>
                            @endforeach
                        </select>
                        @error('bill_id')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                        @if($sub)
                        <div class="col-md-6">
                            <h4 class="mt-4">remain {{$sub}} EGP To pay </h4>
                        </div>
                        @endif
                    @endif

                </div>
            </div>
        </div>

    </form>

    <div class="card">
        <div class="card-footer  d-flex justify-content-between">

            <a href="{{route('purchases.payments.index')}}" onclick="return confirm('Are you sure?')"
               class="btn btn-outline-secondary btn-lg">
                Cancel
            </a>
            <button type="submit" wire:click.pervent="save" class="btn btn-icon btn-lg btn-{{$color}}">
                {{$button}}
            </button>


        </div>
    </div>
</div>
