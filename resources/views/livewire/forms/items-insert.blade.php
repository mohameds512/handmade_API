<div>
    <form method="POST"   wire:submit.prevent="save"  >
        @csrf
        <input type="submit" wire:click.prevent="" class="d-none">
    @foreach($insertItems as $iItem)

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="element_id" class=" col-form-label text-md-right">Element</label>
                    <select  class="form-control " wire:model.lazy="element_id.{{$loop->iteration}}" name="element_id[]" >
                        <option value="">select Element</option>
                        @foreach($elements as $element)
                            <option value="{{$element->id}}">{{$element->name}} -- {{$element->code}}</option>
                        @endforeach
                    </select>
                    @error('element_id.'.$loop->iteration )
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="amount" class=" col-form-label text-md-right">Amount</label>
                    <input  type="number" class="form-control @error('amount.'.$loop->iteration) is-invalid @enderror" wire:model.lazy="amount.{{$loop->iteration}}" name="amount[]" value="{{ old('amount.'.$loop->iteration) }}"  >
                    @error('amount.'.$loop->iteration)
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="unit" class=" col-form-label text-md-right">unit</label>
                    <select  wire:model="unit.{{$loop->iteration}}" class="form-control @error('unit.'.$loop->iteration) is-invalid @enderror" >
                        <option value="">select Unit</option>
                        @foreach($units as $unit)
                            <option value="{{$unit}}">{{$unit}}</option>
                        @endforeach
                    </select>
                    @error('unit.'.$loop->iteration)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="expire_at" class=" col-form-label text-md-right">Expire At</label>
                    <input  type="date" class="form-control @error('expire_at.'.$loop->iteration) is-invalid @enderror" wire:model.lazy="expire_at.{{$loop->iteration}}" name="expire_at[]" value="{{ old('expire_at.'.$loop->iteration) }}"  >
                    @error('expire_at.'.$loop->iteration)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>

{{--        <livewire:forms.items-form  />--}}
    @endforeach

    <div class="row justify-content-between">
        <div class=" mt-auto">
            <button type="submit" wire:click.prevent="addItem" class="btn btn-primary">
                Add
            </button>
        </div>
        <div class=" mt-auto">
            <button type="submit" class="btn btn-success">
                Save
            </button>
        </div>
    </div>
        </form>
</div>
