<div>
    <h2>{{$title}} Category</h2>
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
                <label for="type" class=" col-form-label text-md-right">Type</label>
                <select  class="form-control " wire:model.lazy="type" >
                    <option value="">select Type</option>
                    @foreach($types as $ty)
                        <option value="{{$ty}}">{{$ty}}</option>
                    @endforeach
                </select>
                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="parent_id" class=" col-form-label text-md-right">Parent</label>
                <select  class="form-control " wire:model.lazy="parent_id" >
                    <option value="">select Parent</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('parent_id')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
