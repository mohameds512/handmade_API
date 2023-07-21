<div>
    <div type="button" class="btn btn-sm btn-success" data-toggle="modal" wire:click.pervent="open" data-target="#vendorModal">
        Create Vendor
    </div>

    <div wire:ignore.self class="modal fade" id="vendorModal" tabindex="-1" role="dialog"  aria-hidden="true" aria-labelledby="vendorModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vendorModalLabel">Create Vendor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  wire:submit.prevent="save">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>
                                <input  type="text" class="form-control @error('name') is-invalid @enderror" wire:model.lazy="name" autocomplete="name" >

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class=" col-form-label text-md-right">Phone</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" wire:model.lazy="phone"  autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="email" class=" col-form-label text-md-right">Email</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" wire:model.lazy="email"  autocomplete="email" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <label for="address" class=" col-form-label text-md-right">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" wire:model.lazy="address"   autocomplete="address">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Modal -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click.pervent="close" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click.pervent="save">Save & Select</button>
                </div>
            </div>
        </div>
    </div>
</div>
