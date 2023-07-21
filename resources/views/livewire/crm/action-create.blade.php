<div class="card">
    <div class="card-header bg-{{$color}}">
        <h2>{{$title}} Action</h2>
    </div>
<div class="card-body">
    <form action="" wire:submit.prevent="save">
        <div class="form-group row">
            <div class="col-md-6">
                <label for="type">Type</label>
                <select wire:model="type" class="form-control" >
                    <option value="">Select Type</option>
                    @foreach($types as $type)
                        <option value="{{$type}}">{{$type}}</option>
                    @endforeach
                </select>
                @error('type')
                <small class="text-danger"> {{$message}}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="due_at">due_at</label>
                <input type="datetime-local" wire:model.lazy="due_at" class="form-control">
                @error('due_at')
                <small class="text-danger"> {{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <label for="description">Description</label>
                <input type="text" wire:model.lazy="description" placeholder="enter description" class="form-control">
                @error('description')
                <small class="text-danger"> {{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="employee">employee</label>
                <select wire:model="employee_id" class="form-control" >
                    <option value="">Select employee</option>
                    @foreach($employees as $employee)
                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                    @endforeach
                </select>
                @error('employee_id')
                <small class="text-danger"> {{$message}}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="client">client</label>
                <select wire:model="client_id" class="form-control" >
                    <option value="">Select client</option>
                    @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>
                @error('client_id')
                <small class="text-danger"> {{$message}}</small>
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

</div>
