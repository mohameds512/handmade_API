<div class="container-fluid ">

    <div class="row my-3 d-flex">
        <div class="col-md-6">
            <input type="search" wire:model.debounce.400ms="search" class="form-control" placeholder="search in names">
        </div>
        <div class="col-xs-2">
            <select wire:model="orderBy" class="form-control-sm">
                <option>Id</option>
                <option value="offered_at">Offered</option>
                <option value="created_at">Created</option>
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
        <div class="col-12" >
            <table class="table table-hover table-responsive-md">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Client</th>
                    <th>Offered At</th>
                    <th>Created By</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($priceOffers as  $offer)
                    <tr>
                        <td>{{$offer->id }}</td>
                        <td>
                            <a href="{{route('crm.clients.show',$offer->client->id)}}">{{$offer->client->name}}</a>
                        </td>
                        <td>{{$offer->offered }}</td>


                        <td>by {{ $offer->user->name }} <small>at {{$offer->created_at->format('d-m-Y')}}</small> </td>

                        <td class="d-flex justify-content-between">

                                @if(!$offer->products->isEmpty())
                                    <a href="{{route('sales.price-offers.print',$offer->id)}}" target="_blank" class="btn btn-secondary ">
                                        print
                                    </a>
                                @else
                                    no Offers to print
                                @endif

                                <form action="{{route('sales.price-offers.destroy',$offer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td>
                            no result found
                        </td>
                    </tr>


                @endforelse
                </tbody>
            </table>


        </div>

        <div class="d-flex justify-content-center">
            {{ $priceOffers->links() }}
        </div>
    </div>
</div>
