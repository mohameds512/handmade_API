<div class="container-fluid ">
    <div class="row my-3 d-flex">
        <div class="col-md-6">
            <input type="search" wire:model.debounce.400ms="search" class="form-control" placeholder="search in names">
        </div>
        <div class="col-xs-2">
            <select wire:model="orderBy" class="form-control-sm">
                <option>Id</option>
                <option>Name</option>
                <option>Phone</option>
                <option>Email</option>
                <option>active</option>
            </select>
        </div>
        <div class="col-xs-2">
            <select wire:model="orderDesc" class="custom-select-sm border">
                <option value="1">Desc</option>
                <option value="0">Asc</option>
            </select>
        </div>
        <div class="col-xs-2">
            <select wire:model="perPage" class="form-control-sm">
                <option>5</option>
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover table-responsive-md table-bordered">
            <thead>
            <tr>
                <td>Name</td>
                <td>Phone</td>
                <td>Email</td>
                <td>Address</td>
                <td>Active</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @forelse($vendors as $vendor)
                <tr>
                    <td><a href="{{route('purchases.vendors.show',$vendor->id)}}">{{$vendor->name}}</a></td>
                    <td>{{$vendor->phone ?? 'no phone'}}</td>
                    <td>{{$vendor->email ?? 'no phone'}}</td>
                    <td>{{$vendor->address ?? 'no phone'}}</td>
                    <td>  <livewire:main.toggle-button :model="$vendor" :field="'active'" :key="$vendor->id">
                    </td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('purchases.vendors.edit',$vendor->id) }}"
                               class="btn btn-secondary">edit</a>
                            <form action="{{route('purchases.vendors.destroy',$vendor->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No Vendors yet</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $vendors->links() }}
    </div>
</div>










