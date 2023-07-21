<div>
    <form method="POST"  action="{{route('items.store')}}"  >
        @csrf
        <div class="form-group row">
            <div class="col-md-3">
                <label for="element_id" class=" col-form-label text-md-right">Element</label>
                <select  class="form-control " wire:model.lazy="element_id[]" name="element_id[]" >
                    <option value="">select Element</option>
                    @foreach($elements as $element)
                        <option value="{{$element->id}}">{{$element->name}}</option>
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
                <input  type="text" class="form-control @error('amount.'.$loop->iteration) is-invalid @enderror" wire:model.lazy="amount[]" name="amount[]" value="{{ old('amount.'.$loop->iteration) }}"  >
                @error('amount.'.$loop->iteration)
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="unit" class=" col-form-label text-md-right">unit</label>
                <input  type="text" class="form-control @error('unit.'.$loop->iteration) is-invalid @enderror" wire:model.lazy="unit[]"  name="unit[]" value="{{ old('unit.'.$loop->iteration) }}"  >
                @error('unit.'.$loop->iteration)
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="expire_at" class=" col-form-label text-md-right">Expire At</label>
                <input  type="date" class="form-control @error('expire_at.'.$loop->iteration) is-invalid @enderror" wire:model.lazy="expire_at[]" name="expire_at[]" value="{{ old('expire_at.'.$loop->iteration) }}"  >
                @error('expire_at.'.$loop->iteration)
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </form>
</div>
