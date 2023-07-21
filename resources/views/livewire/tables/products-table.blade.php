<div class="container-fluid ">
    <div class="row my-3 d-flex">
        <div class="col-md-6">
            <input type="search" wire:model.debounce.400ms="search" class="form-control" placeholder="search in names">
        </div>
        <div class="col-xs-2">
            <select wire:model="orderBy" class="form-control-sm">
                <option>Id</option>
                <option>Name</option>
                <option>Code</option>
                <option>Texture</option>
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
            <th class="border  py-2">Name</th>
            <th class="border  py-2">Code</th>
            <th class="border  py-2">Texture</th>
            <th class="border  py-2">Category</th>
            <th class="border  py-2">Formula</th>
            <th class="border  py-2">Edit</th>
            <th class="border  py-2">Delete</th>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>

                    <td class="border  py-2"> <a href="{{ route('production.products.show',$product->id) }}"> {{$product->name}} </a></td>
                    <td class="border  py-2">{{$product->code}} </td>
                    <td class="border  py-2">{{$product->texture}} </td>
                    <td class="border  py-2"><a href="{{ route('formulas.categories.show',  $product->category->id) }}">{{$product->category->name}}</a></td>
                    <td class="border  py-2"><a href="{{ route('formulas.formulas.show',  $product->formula->id) }}">{{$product->formula->name}}</a></td>

                    <td>
                        <button wire:click="edit({{ $product->id }})" class="btn btn-primary">Edit</button>
                    </td>


                    <td>
                        <button wire:click="delete({{ $product->id }})" class="btn btn-danger">Delete</button>
                    </td>

                </tr>
            @endforeach

            </tbody>

        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>









