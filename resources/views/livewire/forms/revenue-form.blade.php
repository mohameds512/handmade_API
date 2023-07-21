<div>
    <form method="POST" action="{{ route('sales.revenues.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-5 ">
                <div class="card-body">
                    <h2>Client</h2>
                    @if($client)
                        <p>{{$client->name}} -- {{$client->phone}}</p>
                        <p>{{$client->company?->address}}</p>

                        <div wire:click.pervent="clearClient" class="btn btn-secondary btn-sm">choose another Cleint
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

                    @if($client)
                        <div class="col-md-6">
                            <label for="invoice_id">Invoice</label>
                            <select wire:model.lazy="invoice_id" class="form-control">
                                <option value="">Select Invoice</option>
                                @foreach($invoices as  $invoice)
                                    <option value="{{$invoice->id}}">{{$invoice->invoiced}} -- {{ $invoice->number }}</option>
                                @endforeach
                            </select>
                            @error('invoice_id')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        @if($sub )
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

            <a href="{{route('sales.revenues.index')}}" onclick="return confirm('Are you sure?')"
               class="btn btn-outline-secondary btn-lg">
                Cancel
            </a>
            <button type="submit" wire:click.pervent="save" class="btn btn-icon btn-lg btn-{{$color}}">
                {{$button}}
            </button>


        </div>
    </div>
</div>
