<div>
    <div class="container-fluid ">
        <div class="row my-3 d-flex">
            <div class="col-md-6">
                <input type="search" wire:model.debounce.400ms="search" class="form-control" placeholder="search in names">
            </div>
            <div class="col-xs-2">
                <select wire:model="orderBy" class="form-control-sm">
                    <option>Id</option>
                    <option>Name</option>
                    <option>Type</option>
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
            <table class="table table-hover table-responsive-sm ">
                <thead>
                <th class="border  py-2">ID</th>
                <th class="border  py-2">Name</th>
                <th class="border  py-2">Type</th>
                <th class="border  py-2">Parent</th>
                <th class="border  py-2">Edit</th>
                <th class="border  py-2">Delete</th>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td class="border  py-2">{{$category->id}} </td>
                        <td class="border  py-2"> <a href="{{ route('formulas.categories.show',$category->id) }}"> {{$category->name}} </a></td>
                        <td class="border  py-2">{{$category->type}} </td>
                        <td class="border  py-2">
                            @if($category->parent)
                                <a href="{{route('formulas.categories.show',$category->parent->id)}}">{{$category->parent->name}}</a>
                            @else
                                no parent
                            @endif
                        </td>
                        @can('category-edit')
                            <td>
                                <button wire:click="edit({{ $category->id }})" class="btn btn-primary">Edit</button>
                            </td>

                        @endcan
                        @can('category-delete')
                            <td>
                                <button wire:click="delete({{ $category->id }})" class="btn btn-danger">Delete</button>
                            </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $categories->links() }}
        </div>

    </div>


</div>






