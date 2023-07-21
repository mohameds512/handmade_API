@extends('layouts.admin')

@section('content_header')
    <h1>Setting</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <a href="{{route('setting.default')}}" class=" card shadow">
                <div class="row  card-body">
                    <div class="col-auto">
                        <div class="badge bg-gradient-cyan settings-icons"><i class="bx bx-cog bx-lg"></i>
                        </div>
                    </div>
                    <div class="col ml--2"><h4 class="mb-0">Default</h4>
                        <p class="text-sm text-muted mb-0">Change app name, language, etc.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6">
            <a href="{{route('setting.company')}}" class="link-muted card shadow">
                <div class="row  card-body">
                    <div class="col-auto">
                        <div class="badge bg-gradient-cyan settings-icons">
                            <i class="bx bx-buildings bx-lg"></i>
                        </div>
                    </div>
                    <div class="col ml--2"><h4 class="mb-0">Company</h4>
                        <p class="text-sm text-muted mb-0">Change company name, email, address, tax number
                            etc</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 ">
            <a href="{{route('setting.working')}}" class="link-muted card shadow">
                <div class="row  card-body">
                    <div class="col-auto">
                        <div class="badge bg-gradient-cyan settings-icons">
                            <i class="bx bx-network-chart bx-lg"></i>
                        </div>
                    </div>
                    <div class="col ml--2"><h4 class="mb-0">Working</h4>
                        <p class="text-sm text-muted mb-0">Change working days, hours, price calculation, etc.</p></div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6">
            <a href="{{route('setting.invoices')}}" class="link-muted card shadow">
                <div class="row  card-body" >
                    <div class="col-auto">
                        <div class="badge bg-gradient-cyan settings-icons"><i class="bx bx-receipt bx-lg"></i>
                        </div>
                    </div>
                    <div class="col ml--2 " style="text-decoration: none;"><h4 class="mb-0 ">Invoices</h4>
                        <p class="text-sm text-muted mb-0" style="text-decoration: none;">Change invoice color, email, address, tax number, notes etc</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 ">
            <a href="{{route('setting.taxes')}}" class="link-muted card shadow">
                <div class="row  card-body">
                    <div class="col-auto">
                        <div class="badge bg-gradient-cyan settings-icons">
                            <i class='bx bx-money-withdraw bx-lg'></i>
                        </div>
                    </div>
                    <div class="col ml--2"><h4 class="mb-0">Taxes</h4>
                        <p class="text-sm text-muted mb-0">Change company name, email, address, tax number etc</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection
