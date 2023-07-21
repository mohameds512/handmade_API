<div>
    <form method="POST" action="{{ route('purchases.bills.store') }}">
        @csrf
        <div class="row">

            <div class="col-md-5 ">

                <div class="card-body">
                    <h2>{{$code}}</h2>
                    <h3>Vendor</h3>
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
                        <label for="billed_at">Billed At</label>
                        <input type="date" wire:model.lazy="billed_at" class="form-control">
                        @error('billed_at')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="due_at">Due At</label>
                        <input type="date" wire:model.lazy="due_at" class="form-control">
                        @error('due_at')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="number">Bill Number</label>
                        <input type="text" wire:model.lazy="number"  class="form-control">
                        @error('number')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="status_id">Status</label>
                        <select wire:model.lazy="status_id" class="form-control">
                            <option value="">Select Status</option>
                            @foreach($statuses as $stat)
                                <option value="{{$stat->id}}">{{$stat->name}}</option>
                            @endforeach
                        </select>
                        @error('status_id')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    @if($partial)
                        <div class="col-md-4">
                            <label for="partial_amount">Amount</label>
                            <input type="number" wire:model.lazy="partial_amount" class="form-control">

                            @error('partial_amount')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-12">
                <table class="table table-bordered table-responsive-md">

                    <thead class="thead-light">
                    <tr>
                        <th colspan="2">Item</th>
                        <th>QUANTITY</th>
                        <th>PRICE</th>
                        <th>AMOUNT</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($billItems as $index => $itm)
                        <tr>
                            <td><input type="text" class="form-control" wire:model.lazy="billItems.{{$index}}.name"
                                       placeholder="enter name...">
                                @error('billItems.'.$index.'.name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </td>
                            <td><input type="text" class="form-control"
                                       wire:model.lazy="billItems.{{$index}}.description"
                                       placeholder="description...">
                                @error('billItems.'.$index.'.description')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </td>
                            <td colspan="1"><input type="number"  step="0.25" class="form-control"
                                                   wire:model.lazy="billItems.{{$index}}.quantity"
                                                   placeholder="add quantity">
                                @error('billItems.'.$index.'.quantity')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </td>
                            <td colspan="1"><input type="number" class="form-control" step="0.01"
                                                   wire:model.lazy="billItems.{{$index}}.price" placeholder="add price">
                                @error('billItems.'.$index.'.price')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </td>
                            <td>{{number_format($amount[$index] ?? 0)}}</td>
                            <td>
                                <span class="text-danger" wire:click.pervent="deleteItem({{$index}})" style="cursor: pointer">
                                    <i class="bx bx-trash bx-sm"></i>
                                </span>
                            </td>
                        </tr>

                    @empty
                    @endforelse
                    <tr>
                        <td colspan="7" class="bg-white">
                            <livewire:forms.item-bill-modal-form/>
                        </td>
                    </tr>
                    @if($subTotal)
                        <tr>
                            <td colspan="3">
                                <label for="notes">Notes</label>
                                <textarea type="text" wire:model.lazy="notes" class="form-control"></textarea>
                            </td>
                            <td colspan="4">
                                <table class="table">
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>{{$subTotal}} EGP</td>
                                    </tr>
                                    <tr>
                                        <th>Tax
                                            <select wire:model="tax_id" class="form-control-sm">
                                                <option value="">Select Tax</option>
                                                @foreach($taxes as $tax)
                                                    <option value="{{$tax->id}}">{{$tax->name}} ({{$tax->percent}}%)
                                                    </option>
                                                @endforeach
                                            </select>
                                        </th>
                                        <td>
                                            {{ $taxTotal  }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Discount</th>
                                        <td><input type="number" wire:model.lazy="discount" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>{{$total}} EGP</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-footer  d-flex justify-content-between">

            <a href="{{route('purchases.bills.index')}}" onclick="return confirm('Are you sure?')"
               class="btn btn-outline-secondary btn-lg">
                Cancel
            </a>
            <button type="submit" wire:click.pervent="save" class="btn btn-icon btn-lg btn-{{$color}}">
                {{$button}}
            </button>


        </div>
    </div>
</div>
