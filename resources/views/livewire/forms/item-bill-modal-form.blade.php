<div>

    <div class="btn btn-link w-100"  data-toggle="modal" data-target="#itemModal">+ Add Item</div>




    <div wire:ignore.self class="modal fade" id="itemModal" tabindex="-1" role="dialog"  aria-hidden="true" aria-labelledby="itemModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="itemModalLabel">Select Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
{{--                    <livewire:forms.product-modal-form/>--}}
                    <hr>
                    <div class="form-group sidebar-search-open w-100">
                        <div class="input-group">
                            <input class="form-control " wire:model.debounce.200ms="query" type="search"
                                   placeholder="Search Items..."
                                   aria-label="Search">
                        </div>
                        <div class="list-group">
                            <div class="list-group-item" wire:loading wire:target="query">
                                Loading Items...
                            </div>
                        </div>

                        @if(!empty($query))

                            <div class="list-group" wire:loading.remove>
                                @forelse($searchItems as $itm)
                                    <a href="#" wire:click.prevent="addItem({{$itm->id}})"
                                       class="list-group-item text-decoration-none">
                                        <div class="">{{$itm->name}} -- {{$itm->code}}</div>
                                    </a>
                                @empty
                                    <div class="list-group-item">
                                        No Items Found
                                    </div>
                                @endforelse
                            </div>
                        @endif
                    </div>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" wire:click.pervent="close" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click.pervent="createItem">Insert Item</button>
                </div>
            </div>
        </div>
    </div>


</div>
