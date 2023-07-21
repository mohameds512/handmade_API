@extends('layouts.admin')

@section('content_header')
    <div class="">    <h1>All Roles</h1></div>
    <div class="">   <a href="{{route('hr.roles.permissions')}}" class="btn btn-outline-primary">permissions</a></div>
    <div class="">
        <a href="{{route('hr.roles.create')}}" class="btn btn-success">Create Role</a>

     </div>

@stop
@section('content')

        <div class="row justify-content-center">
            <div class="col-md-12">



                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-hover">

                    <thead>

                    <th>Role</th>

                    <th>Role ID</th>


                    <th>Created at</th>

                    </thead>

                    <tbody>

                    @foreach($roles as $role)

                        <tr>

                            <td><a href="{{ route('hr.roles.show',$role->id) }}"> {{$role->name}} </a></td>

                            <td>{{$role->id}} </td>


                            <td>{{$role->created_at}} </td>

                                <td><a href="{{ route('hr.roles.edit',$role->id) }}" class="btn btn-info">edit</a></td>

                                <td>
                                    <form action="{{route('hr.roles.destroy',$role->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="delete">
                                    </form>
                                </td>


                        </tr>
                    @endforeach

                    </tbody>

                </table>
                {{ $roles->links() }}
            </div>
        </div>

@endsection

