<div>
    <h2>{{$title}} Tax</h2>
    <form method="POST"  action="#" wire:submit.prevent="save" >
        @csrf
        <input type="submit" wire:click.prevent="" class="d-none">
        <div class="form-group row">
            <div class="col-md-6">
                <label for="name" class=" col-form-label text-md-right">Tax Name</label>
                <input  type="text" class="form-control @error('name') is-invalid @enderror" wire:model.lazy="name" name="name" value="{{ old('name') }}"  >
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="rate" class=" col-form-label text-md-right">Tax Rate</label>
                <input  type="text" class="form-control @error('rate') is-invalid @enderror" wire:model.lazy="rate" name="rate" value="{{ old('rate') }}"  >
                @error('rate')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 ">
                <button type="submit" class="btn btn-{{$color}}">
                    {{ $button }}
                </button>
            </div>
        </div>
    </form>
</div>

{{--@push('js')--}}
{{--        <script>--}}
{{--          $(document).ready(function () {--}}
{{--              $('#category_id').select2({--}}
{{--                  placeholder: "select Qategory",--}}
{{--               //   multiple: true,--}}
{{--                  allowClear: true,--}}
{{--              });--}}
{{--                $('#category_id').on('change', function (e) {--}}
{{--                    var data = $('#category_id').select2("val");--}}
{{--                    let closeButton = $('.select2-selection__clear')[0];--}}
{{--                    if(typeof(closeButton)!='undefined'){--}}
{{--                        if(data.length<=0)--}}
{{--                        {--}}
{{--                            $('.select2-selection__clear')[0].children[0].innerHTML = '';--}}
{{--                        } else{--}}
{{--                            $('.select2-selection__clear')[0].children[0].innerHTML = 'x';--}}
{{--                        }--}}
{{--                    }--}}
{{--                @this.set('category_id', data);--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}
{{--@endpush--}}

