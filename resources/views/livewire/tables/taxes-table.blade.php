<div>
    <div class="container-fluid ">
        <div class="row my-3 d-flex">
            <div class="col-md-6">
                <input type="search" wire:model.debounce.400ms="search" class="form-control" placeholder="search in Taxes">
            </div>
            <div class="col-xs-2">
                <select wire:model="orderBy" class="form-control-sm">
                    <option>Id</option>
                    <option>Name</option>
                    <option>Rate</option>
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
                <th class="border  py-2">Rate</th>
                <th class="border  py-2">Active</th>
                <th class="border  py-2">Edit</th>
{{--                <th class="border  py-2">Delete</th>--}}
                </thead>
                <tbody>
                @foreach($taxes as $tax)
                    <tr>
                        <td class="border  py-2">{{$tax->id}} </td>
                        <td class="border  py-2">{{$tax->name}}</td>
                        <td class="border  py-2">{{$tax->rate}} %</td>
                        <td class="border  py-2">
                            {{--                                {{$user->active}}--}}
                            {{--                                @livewire('main.toggle-button',['model' => $user,'field'=>'active'])--}}
                            <livewire:main.toggle-button :model="$tax" :field="'active'" :key="$tax->id">
                        </td>

                        <td>
                            <button wire:click="edit({{ $tax->id }})" class="btn btn-primary">Edit</button>
                        </td>


{{--                        <td>--}}
{{--                            <button wire:click="delete({{ $tax->id }})" class="btn btn-danger">Delete</button>--}}
{{--                        </td>--}}

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $taxes->links() }}
        </div>

    </div>


</div>






