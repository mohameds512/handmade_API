<div class="card">
    <div class="card-header ">
        <h3 class="card-title">
            <i class="ion ion-clipboard mr-1"></i>
            To Do List
        </h3>

        <div class="card-tools">
            {{$actions->links()}}
            <span class="text-bold" style="cursor: pointer" wire:click.pervent="$refresh"><i class='bx bx-refresh bx-sm'></i></span>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <ul class="todo-list ui-sortable" data-widget="todo-list" wire:init="$refresh">
            @forelse($actions as $k => $action)
                <li class=" @if($action->done_at) done @endif ">
                    <!-- drag handle -->

                <i class='bx bx-dots-horizontal-rounded bx-xs'></i>

                    <!-- checkbox -->
                    <div class="icheck-primary d-inline ml-2">
                        <label for="todoCheck{{$k}}"> </label>
                        <input type="checkbox" @if($action->done_at) checked @endif wire:click="done({{$action->id}})"
                               name="todo{{$k}}" id="todoCheck{{$k}}" value="todoCheck{{$k}}">
                    </div>
                    <!-- todo text -->
                    <span class="text">
                       <span class="text-cyan">{{$action->type}}</span> for {{$action->client?->name}}
                       <small>{{$action->description}} @if($action->employee) <span
                               class="text-primary">by {{$action->employee?->name}}</span>  @endif</small>
                      </span>
                    <!-- Emphasis label -->
                    <small class="badge badge-@if($action->due_at >= now())primary @else{{'danger'}}
                    @endif"><i class='bx bx-time '></i>{{$action->due_at->diffForHumans()}}</small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                        <i class='bx bxs-edit bx-sm ' style="cursor: pointer" wire:click="edit({{ $action->id }})"></i>
                        <i class='bx bxs-trash bx-sm' style="cursor: pointer"
                           wire:click="delete({{ $action->id }})"></i>
                    </div>
                </li>
            @empty
                <p>there is no actions this week, have a good time.</p>
            @endforelse

        </ul>
    </div>
    <!-- /.card-body -->
    {{--    <div class="card-footer clearfix">--}}

    {{--    </div>--}}
</div>
