@extends('layouts.admin')

@section('content_header')

    <div class="">    <h1>All Employees</h1></div>
    <div class="">            <a href="{{route('hr.employees.create')}}" class="btn btn-success">Create Employee</a></div>
@stop

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <table class="table table-hover table-responsive-md table-bordered">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Position</td>
                    <td>Salary</td>
                    <td>Active</td>
                    <td>join_at</td>
                </tr>
                </thead>
                <tbody>
                @forelse($employees as $employee)
                    <tr>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->phone ?? 'no phone'}}</td>
                        <td>{{$employee->position ?? 'no position'}}</td>
                        <td>{{$employee->salary ?? 'no salary'}}</td>
                        <td>
                            <livewire:main.toggle-button :model="$employee" :field="'active'" :key="$user->id">
                        </td>

                        <td>{{$employee->joined ?? 'no date'}}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('hr.employees.edit',$employee->id) }}"
                                   class="btn btn-secondary">edit</a>
                                <form action="{{route('hr.employees.destroy',$employee->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>No Employees yet</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $employees->links() }}
        </div>
    </div>



@endsection


