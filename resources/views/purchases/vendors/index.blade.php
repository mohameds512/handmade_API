@extends('layouts.admin')

@section('content_header')
    <h1>All Vendors</h1>
    <a href="{{route('purchases.vendors.create')}}" class="btn btn-success">Create Vendor</a>
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
                    <td>Code</td>
                    <td>Email</td>
                    <td>Adderss</td>
                </tr>
                </thead>
                <tbody>
                @forelse($vendors as $vendor)
                    <tr>
                        <td><a href="{{route('purchases.vendors.show',$vendor->id)}}">{{$vendor->name}}</a></td>
                        <td>{{$vendor->phone ?? 'no phone'}}</td>
                        <td>{{$vendor->code ?? 'no phone'}}</td>
                        <td>{{$vendor->email ?? 'no email'}}</td>
                        <td>{{$vendor->address ?? 'no address'}}</td>
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



@endsection


