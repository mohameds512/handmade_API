<div class="row">

    <div class="col-md-8 ">
        <h3>{{$number}}</h3>
        <form method="POST" wire:submit.prevent="save">
            @csrf
            <input type="submit" wire:click.prevent="" class="d-none">
            <div class=" row">
                <div class="col-md-4">
                    <label for="formula_id" class=" col-form-label text-md-right">Formula</label>
                    <select class="form-control " wire:model.lazy="formula_id">
                        <option value="">select Formula</option>
                        @foreach($formulas as $form)
                            <option value="{{$form->id}}">{{$form->name}}
                                -- @if($form->category) {{$form->category->name}} @else no category @endif</option>
                        @endforeach
                    </select>
                    @error('formula_id' )

                    <span class="text-danger">{{ $message }}</span>

                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="amount" class=" col-form-label text-md-right">Amount</label>
                    <input type="number" class="form-control @error('amount') is-invalid @enderror"
                           wire:model.lazy="amount" name="amount" value="{{ old('amount') }}">
                    @error('amount')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="times" class=" col-form-label text-md-right">Times</label>
                    <input type="number" wire:model.lazy="times"
                           class="form-control @error('times') is-invalid @enderror">

                    @error('times')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-2 mt-auto">
                    <button type="submit" wire:click.prevent="generate" class="btn btn-secondary">
                        Generate
                    </button>
                </div>
            </div>
            @if($formula)
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hove table-responsive-md">
                            @foreach($formula->elements as $index => $element)
                                <tr>
                                    <th>{{$element->name}} -- {{$element->code}}</th>
                                    @php
                                        $totalAmount =  ($element->pivot->amount * $amount ) / 100 ;
                                        if(isset($proElement[$element->id])){
                                             $sum = array_sum($proElement[$element->id]) ;
                                        }else{
                                            $sum = 0;
                                        }

                                    @endphp
                                    <th> {{ $totalAmount}} kg</th>
                                    <th> Price</th>
                                    <th> Expire Date</th>
                                    <th>  {{$sum}} kg
                                        @if(isset($ready[$element->id]))
                                            @if($totalAmount > $sum  && !$ready[$element->id])
                                            <i class='bx bx-error bx-xs text-danger mt-auto'></i>
                                            @endif
                                        @else
                                            @if($totalAmount > $sum )
                                                <i class='bx bx-error bx-xs text-danger mt-auto'></i>
                                            @endif
                                        @endif

                                        <input type="checkbox" wire:model.lazy="ready.{{$element->id}}">
                                        <label for="ready">Ready</label>
                                        </th>
                                </tr>
                                @forelse(  App\Models\Item::whereHas('inventory')->where('type','material')->where('element_id',$element->id)->with('element')->get() as $item)
                                    <tr>
                                        <td> {{$item->name}} </td>
                                        <td>{{$item->quantity}} kg</td>
                                        <td>{{$item->price}} {{setting('currency')}}</td>
                                        <td>{{$item->created}}</td>
                                        <td><input type="number" step=".01" class="form-control"
                                                   @if(isset($ready[$element->id]) && $ready[$element->id])   disabled
                                                   @endif wire:model.lazy="invElement.{{$element->id}}.{{$item->id}}" min="0"
                                                   max="{{$item->quantity}}" value="0"></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-danger">There is no Elements of this category in inventory</td>
                                    </tr>
                                @endforelse
                            @endforeach
                        </table>
                    </div>
                </div>
            @endif
        </form>
    </div>
    <div class="col-md-4">
        <h3>Total {{$total}} %</h3>
        @if($formula)
            <table class="table table-hove table-responsive-md">
                <tr>
                    <th>Formula</th>
                    <td>{{$formula->name}}</td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>{{$amount}} kg</td>
                </tr>
                <tr>
                    <th>Per Time</th>
                    <td>
                        @if($times )
                        {{ number_format(floatval($amount / $times) , 2)}}
                        @else
                            0
                        @endif

                    </td>
                </tr>
                <tr>
                    <th>Material Cost</th>
                    <td>{{ number_format(floatval($cost) , 2)}} </td>
                </tr>
                <tr>
                    <th>Elements</th>
                </tr>
                <tr>
                @foreach($formula->elements as $element)
                    <tr>
                        <th>{{$element->name}}</th>

                        @php
                           $t = (float)   number_format( $element->pivot->amount * ($amount / $times) / 100,3)
                        @endphp

                        <td><b> @if($t > 1) {{$t}} kg  @else {{$t * 1000}} g  @endif</b></td>
                    </tr>
                    @endforeach
                    </tr>
            </table>
        @endif
        <button type="submit" wire:click.prevent="save" class="btn btn-dark w-100 h4">
            Go
        </button>

    </div>

</div>
