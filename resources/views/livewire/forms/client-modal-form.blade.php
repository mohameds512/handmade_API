<div>
    <div type="button" class="btn btn-sm btn-success" data-toggle="modal" wire:click.pervent="open" data-target="#clientModal">
        Create Client
    </div>

    <div wire:ignore.self class="modal fade" id="clientModal" tabindex="-1" role="dialog"  aria-hidden="true" aria-labelledby="clientModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clientModalLabel">Create Client</h5>
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
                                <div class="col-md-6">
                                    <label for="status" class=" col-form-label text-md-right">Status</label>
                                    <select wire:model.lazy="status_id" name="status_id" class="form-control "  >
                                        <option value="">Select Status</option>
                                        @foreach($statuses as $status)
                                            <option value="{{$status->id}}">{{$status->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('status_id')
                                    <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="company" class=" col-form-label text-md-right">Company</label>
                                    <select wire:model.lazy="company_id"  name="company_id" class="form-control "  >
                                        <option value="">Select Company</option>
                                        @foreach($companies as $company)
                                            <option value="{{$company->id}}">{{$company->name}}</option>

                                        @endforeach
                                    </select>
                                    @error('company_id')
                                    <strong>{{ $message }}</strong>
                                    @enderror
                                </div>


{{--                            <div class="col-md-4">--}}
{{--                                <label for="email" class=" col-form-label text-md-right">Email</label>--}}
{{--                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" wire:model.lazy="email"  autocomplete="email" >--}}
{{--                                @error('email')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="col-md-8">--}}
{{--                                <label for="address" class=" col-form-label text-md-right">Address</label>--}}
{{--                                <input type="text" class="form-control @error('address') is-invalid @enderror" wire:model.lazy="address"   autocomplete="address">--}}

{{--                                @error('address')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="type" class=" col-form-label text-md-right">{{ __('Type') }}</label>
                                <select wire:model.lazy="type" class="form-control "  >
                                    <option value="">Select Type</option>
                                    @foreach($types as $type)
                                        <option value="{{$type}}">{{$type}}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="payment" class=" col-form-label text-md-right">{{ __('Payment') }}</label>
                                <select wire:model.lazy="payment" class="form-control "  >
                                    <option value="">Select Payment</option>
                                    @foreach($payments as $payment)
                                        <option value="{{$payment}}">{{$payment}}</option>
                                    @endforeach
                                </select>
                                @error('payment')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="location" class=" col-form-label text-md-right">{{ __('Location') }}</label>
                                <input  type="text" class="form-control @error('location') is-invalid @enderror" wire:model.lazy="location" autocomplete="location" >

                                @error('location')
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
