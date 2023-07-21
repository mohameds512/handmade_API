<div>
    <form method="POST" action="{{ route('sales.invoices.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-5 ">
                <div class="card-body">
                    <h2>Client</h2>
                    @if($client)
                        <p>{{$client->name}} -- {{$client->phone}}</p>
                        <p>{{$client->company?->address}} , {{$client->company?->state}}</p>

                        <div wire:click.pervent="clearClient" class="btn btn-secondary btn-sm">choose another Client
                        </div>
                    @else
                        <div class="form-group sidebar-search-open w-100">
                            <div class="input-group">
                                <input class="form-control " wire:model.debounce.200ms="query" type="search"
                                       placeholder="Search Clients..."
                                       aria-label="Search">

                            </div>
                            <div class="list-group">
                                <div class="list-group-item" wire:loading wire:target="query">
                                    Loading Clients...
                                </div>
                            </div>

                            @if(!empty($query))

                                <div class="list-group" wire:loading.remove>
                                    @forelse($searchClients as $cli)
                                        <a href="#" wire:click.prevent="selectClient({{$cli->id}})"
                                           class="list-group-item text-decoration-none">
                                            <div class="">{{$cli->name}} -- {{$cli->phone}}</div>
                                            <small class="">{{$cli->address}}</small>
                                        </a>
                                    @empty
                                        <div class="list-group-item">
                                            No Clients Found
                                        </div>
                                    @endforelse
                                </div>
                            @endif
                        </div>
                        <livewire:forms.client-modal-form/>
                    @endif
                </div>
            </div>
            <div class="col-md-7 ">
                <div class="form-group row card-body">
                    <div class="col-md-6">
                        <label for="billed_at">Billed At</label>
                        <input type="date" wire:model.lazy="invoiced_at" class="form-control">
                        @error('invoiced_at')
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
                        <label for="number">Invoice Number</label>
                        <input type="text" wire:model.lazy="number" disabled class="form-control">
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
                    @forelse($invoiceItems as $index => $itm)
                        <tr>
                            <td><input type="text" class="form-control" wire:model.lazy="invoiceItems.{{$index}}.name"
                                       placeholder="enter name...">
                                @error('invoiceItems.'.$index.'.name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </td>
                            <td><input type="text" class="form-control"
                                       wire:model.lazy="invoiceItems.{{$index}}.description"
                                       placeholder="description...">
                                @error('invoiceItems.'.$index.'.description')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </td>
                            <td colspan="1"><input type="number" class="form-control"
                                                   wire:model.lazy="invoiceItems.{{$index}}.quantity"
                                                   placeholder="add quantity">
                                @error('invoiceItems.'.$index.'.quantity')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                                <small> available {{$invoiceItems[$index]['amount']}} kg</small>
                            </td>
                            <td colspan="1"><input type="number" class="form-control"
                                                   wire:model.lazy="invoiceItems.{{$index}}.price" placeholder="add price">
                                @error('invoiceItems.'.$index.'.price')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </td>
                            <td>{{ number_format( floatval($amount[$index] ?? 0 ) ,2)}}</td>
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
                            <livewire:forms.item-invoice-modal-form/>
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

            <a href="{{route('sales.invoices.index')}}" onclick="return confirm('Are you sure?')"
               class="btn btn-outline-secondary btn-lg">
                Cancel
            </a>
            <button type="submit" wire:click.pervent="save" class="btn btn-icon btn-lg btn-{{$color}}">
                {{$button}}
            </button>


        </div>
    </div>
</div>
