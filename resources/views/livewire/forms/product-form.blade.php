<div>
    <h2>{{$title}} Product</h2>
    <form method="POST"  action="#" wire:submit.prevent="save" >
        @csrf
        <input type="submit" wire:click.prevent="" class="d-none">
        <div class="form-group row">
            <div class="col-md-6">
                <label for="name" class=" col-form-label text-md-right">Name</label>
                <input  type="text" class="form-control @error('name') is-invalid @enderror" wire:model.lazy="name" name="name" value="{{ old('name') }}"  >
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="code" class=" col-form-label text-md-right">Code</label>
                <input  type="text" class="form-control @error('code') is-invalid @enderror" wire:model.lazy="code" name="code" value="{{ old('code') }}"  >
                @error('code')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="formula_id" class=" col-form-label text-md-right">Formula</label>
                <select  class="form-control " wire:model.lazy="formula_id" >
                    <option value="">select Formula</option>
                    @foreach($formulas as $formula)
                        <option value="{{$formula->id}}">{{$formula->name}} -- {{$formula->code}}</option>
                    @endforeach
                </select>
                @error('formula_id')

                <strong>{{ $message }}</strong>

                @enderror
            </div>
            <div class="col-md-6">
                <label for="category_id" class=" col-form-label text-md-right">Category</label>
                <select  class="form-control " wire:model.lazy="category_id" >
                    <option value="">select Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')

                <strong>{{ $message }}</strong>

                @enderror
            </div>
            <div class="col-md-6">
                <label for="texture" class=" col-form-label text-md-right">Texture</label>
                <select  class="form-control " wire:model.lazy="texture" >
                    <option value="">select Texture</option>
                    @foreach($textures as $texture)
                        <option value="{{$texture}}">{{$texture}}</option>
                    @endforeach
                </select>
                @error('texture')
                        <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="gloss" class=" col-form-label text-md-right">gloss</label>
                <input  type="text" class="form-control @error('gloss') is-invalid @enderror" wire:model.lazy="gloss" name="gloss" value="{{ old('gloss') }}"  >
                @error('gloss')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="color_family" class=" col-form-label text-md-right">color Family</label>
                <input  type="text" class="form-control @error('color_family') is-invalid @enderror" wire:model.lazy="color_family" name="color_family" value="{{ old('color_family') }}"  >
                @error('color_family')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="curing_time" class=" col-form-label text-md-right">curing Time</label>
                <input  type="text" class="form-control @error('curing_time') is-invalid @enderror" wire:model.lazy="curing_time" name="curing_time" value="{{ old('curing_time') }}"  >
                @error('curing_time')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="last_price" class=" col-form-label text-md-right">Last Price</label>
                <input  type="number" min="0" class="form-control @error('last_price') is-invalid @enderror" wire:model.lazy="last_price" name="last_price" value="{{ old('last_price') }}"  >
                @error('last_price')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 ">
                <button type="submit" class="btn btn-{{$color}}">
                    {{ $button }}
                </button>
            </div>
        </div>
    </form>
</div>
