@extends('layouts.admin')

@section('content_header')
    <h1>All Companies</h1>
    <a href="{{route('crm.companies.create')}}" class="btn btn-success">Create Company</a>
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
                    <td>Email</td>
                    <td>Address</td>
                    <td>State</td>
                    <td>Active</td>
                    <td>Last Action</td>
                </tr>
                </thead>
                <tbody>
                @forelse($companies as $company)
                    <tr>
                        <td>{{$company->name}}</td>
                        <td>{{$company->phone ?? 'no phone'}}</td>
                        <td>{{$company->email ?? 'no email'}}</td>
                        <td>{{$company->address }}</td>
                        <td>{{$company->state }}</td>
                        <td>
                            <livewire:main.toggle-button :model="$company" :field="'active'" :key="$company->id">
                        </td>
                        <td>{{$employee->last_action_at ?? 'no actions'}}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('crm.companies.edit',$company->id) }}"
                                   class="btn btn-secondary">edit</a>
                                <form action="{{route('crm.companies.destroy',$company->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>No Companies yet</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $companies->links() }}
        </div>
    </div>



@endsection


