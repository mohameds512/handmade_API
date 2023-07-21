@extends('layouts.admin')

@section('content_header')
    <h1>All Actions</h1>
@stop

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


            <livewire:crm.actions-list />

            {{--            <table class="table table-hover table-responsive-md table-bordered">--}}
            {{--                <thead>--}}
            {{--                <tr>--}}
            {{--                    <td>Name</td>--}}
            {{--                    <td>Phone</td>--}}
            {{--                    <td>Position</td>--}}
            {{--                    <td>Salary</td>--}}
            {{--                    <td>Active</td>--}}
            {{--                    <td>join_at</td>--}}
            {{--                </tr>--}}
            {{--                </thead>--}}
            {{--                <tbody>--}}
            {{--                @forelse($actions as $action)--}}
            {{--                    <tr>--}}
            {{--                        <td>{{$action->type}}</td>--}}
            {{--                        <td>{{$action->description }}</td>--}}
            {{--                        <td>{{$action->employee->name }}</td>--}}
            {{--                        <td>{{$action->company->name  }}</td>--}}
            {{--                        <td>{{$action->due_at }}</td>--}}
            {{--                        <td>--}}
            {{--                            <div class="d-flex justify-content-between">--}}
            {{--                                <a href="{{ route('crm.actions.edit',$action->id) }}"--}}
            {{--                                   class="btn btn-secondary">edit</a>--}}
            {{--                                <form action="{{route('crm.actions.destroy',$action->id) }}" method="POST">--}}
            {{--                                    @csrf--}}
            {{--                                    @method('DELETE')--}}
            {{--                                    <input type="submit" class="btn btn-danger" value="delete">--}}
            {{--                                </form>--}}
            {{--                            </div>--}}
            {{--                        </td>--}}
            {{--                    </tr>--}}
            {{--                @empty--}}
            {{--                    <tr>--}}
            {{--                        <td>No Actions yet</td>--}}
            {{--                    </tr>--}}
            {{--                @endforelse--}}
            {{--                </tbody>--}}
            {{--            </table>--}}
        </div>
        <div class="col-md-4">

            <livewire:crm.action-create />
        </div>
    </div>



@endsection

@push('js')

    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
            Livewire.emit('$refresh');
        })
    </script>
@endpush


