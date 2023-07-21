<div class="container-fluid ">
        <div class="row my-3 d-flex">
            <div class="col-md-6">
                <input type="search" wire:model.debounce.400ms="search" class="form-control" placeholder="search in names">
            </div>
            <div class="col-xs-2">
                <select wire:model="orderBy" class="form-control-sm">
                    <option>Id</option>
                    <option>Name</option>
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
            <table class="table table-hover table-responsive-sm ">
                <thead>
                <th class="border  py-2">ID</th>
                <th class="border  py-2">Username</th>
                <th class="border  py-2">Email</th>
                <th class="border  py-2">Role</th>
                <th class="border  py-2">Active</th>
                <th class="border  py-2">Edit</th>
                <th class="border  py-2">Delete</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="border  py-2">{{$user->id}} </td>
                        <td class="border  py-2"> <a href="{{ route('hr.users.show',$user->id) }}"> {{$user->name}} </a></td>
                        <td class="border  py-2">{{$user->email}} </td>
                        <td class="border  py-2"><a href="{{ route('hr.roles.show',  $user->roles->first()) }}">{{$user->roles->first()->name}}</a></td>

                            <td class="border  py-2">
                                {{--                                {{$user->active}}--}}
                                {{--                                @livewire('main.toggle-button',['model' => $user,'field'=>'active'])--}}
                                <livewire:main.toggle-button :model="$user" :field="'active'" :key="$user->id">
                            </td>

                            <td class="border  py-2"><a href="{{ route('hr.users.edit',$user->id) }}" class="btn btn-info">edit</a></td>

                            <td class="border  py-2">
                                <form action="{{route('hr.users.destroy',$user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" name="delete" value="delete">
                                </form>
                            </td>

                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>









