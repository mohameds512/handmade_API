<div>

    <div class="btn btn-link w-100"  data-toggle="modal" data-target="#productModal">+ Add Product</div>




    <div wire:ignore.self class="modal fade" id="productModal" tabindex="-1" role="dialog"  aria-hidden="true" aria-labelledby="productModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Select Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group sidebar-search-open w-100">
                        <div class="input-group">
                            <input class="form-control " wire:model.debounce.200ms="query" type="search"
                                   placeholder="Search Products..."
                                   aria-label="Search">

                        </div>
                        <div class="list-group">
                            <div class="list-group-item" wire:loading wire:target="query">
                                Loading Products...
                            </div>
                        </div>

                        @if(!empty($query))

                            <div class="list-group" wire:loading.remove>
                                @forelse($searchProducts as $product)
                                    <a href="#" wire:click.prevent="addProduct({{$product->id}})"
                                       class="list-group-item text-decoration-none">
                                        <div class="">{{$product->name}} ({{$product->code}}) </div>
                                    </a>
                                @empty
                                    <div class="list-group-item">
                                        No Products Found
                                    </div>
                                @endforelse
                            </div>
                        @endif
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click.pervent="close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


</div>
