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
                        <label for="offered_at">Offered At</label>
                        <input type="date" wire:model.lazy="offered_at" class="form-control">
                        @error('offered_at')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-12">
                <table class="table table-bordered table-responsive-md">

                    <thead class="thead-light">
                    <tr>
                        <th colspan="2">Product</th>
                        <th>Last Price</th>
                        <th>PRICE</th>
                        <th>AMOUNT</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($offerProducts as $index => $itm)
                        <tr>
                            <td><input type="text" class="form-control" wire:model.lazy="offerProducts.{{$index}}.name"
                                       placeholder="enter name...">
                                @error('offerProducts.'.$index.'.name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </td>
                            <td><input type="text" class="form-control"
                                       wire:model.lazy="offerProducts.{{$index}}.description"
                                       placeholder="description...">
                                @error('offerProducts.'.$index.'.description')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </td>
                            <td colspan="1">
                                <p>{{$offerProducts[$index]['last_price']}} {{setting('currency')}}</p>
                                @error('offerProducts.'.$index.'.quantity')
                                <small class="text-danger">{{$message}}</small>
                                @enderror

                            </td>
                            <td colspan="1"><input type="number" class="form-control"
                                                   wire:model.lazy="offerProducts.{{$index}}.price" placeholder="add price">
                                @error('offerProducts.'.$index.'.price')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                                <small>expected cost {{$offerProducts[$index]['cost']}} eg</small>
                            </td>
                            <td>{{ number_format( floatval($amount[$index] ?? 0 ) ,2)}}</td>
                            <td>
                                <span class="text-danger" wire:click.pervent="deleteProduct({{$index}})" style="cursor: pointer">
                                    <i class="bx bx-trash bx-sm"></i>
                                </span>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    <tr>
                        <td colspan="7" class="bg-white">
                            <livewire:forms.product-price-offer-modal-form/>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <label for="notes">Notes</label>
                <textarea type="date" wire:model.lazy="notes" class="form-control" rows="5"></textarea>
                @error('notes')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
    </form>

    <div class="card mt-2">
        <div class="card-footer  d-flex justify-content-between">

            <a href="{{route('sales.price-offers.index')}}" onclick="return confirm('Are you sure?')"
               class="btn btn-outline-secondary btn-lg">
                Cancel
            </a>
            <a type="submit" wire:click.pervent="save" class="btn btn-icon btn-lg btn-success">
                Save
            </a>


        </div>
    </div>
</div>
