<aside class="main-sidebar sidebar-dark-primary fixed elevation-4" style="min-height: 100vh"
       @if(app()->getLocale() == "ar")
           dir="rtl"
       @else
           dir="ltr"
        @endif
>
    <a href="{{route('home')}}" class="brand-link text-center">
        <span class="brand-text font-weight-light ">
        <b>Core</b> system
    </span>
    </a>
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a class="nav-link  " href="{{route('home')}}">
                        <i class='bx bxs-dashboard bx-xs'></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header text-muted ">Interface</li>
                @can('hr')
                    <li class="nav-item has-treeview">
                        <a class="nav-link  " href="">
                            <i class='bx bxs-user-detail bx-xs'></i>
                            <p>
                                HR
                                <i class='bx bxs-left-arrow right '></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a class="nav-link  " href="{{route('hr.users.index')}}">
                                    <i class=" "></i>
                                    <p>
                                        Manage Users
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link  " href="{{route('hr.roles.index')}}">
                                    <i class=" "></i>
                                    <p>
                                        Manage Roles
                                    </p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link  " href="{{route('hr.employees.index')}}">
                                    <i class=" "></i>
                                    <p>
                                        Manage Employees
                                    </p>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endcan

                @can('crm')
                    <li class="nav-item has-treeview ">
                        <a class="nav-link  " href="">
                            <i class='bx bx-briefcase bx-xs'></i>
                            <p>
                                CRM
                                <i class='bx bxs-left-arrow right'></i>
                            </p>

                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="nav-link  " href="{{route('crm.clients.index')}}">
                                    <p>
                                        Clients
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link  " href="{{route('crm.companies.index')}}">
                                    <p>
                                        Companies
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link  " href="{{route('crm.actions.index')}}">
                                    <p>
                                        Actions
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('purchases')
                    <li class="nav-item has-treeview ">
                        <a class="nav-link  " href="">
                            <i class='bx bx-purchase-tag bx-xs '></i>
                            <p>
                                Purchases
                                <i class='bx bxs-left-arrow right'></i>
                            </p>

                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="nav-link  " href="{{route('purchases.bills.index')}}">
                                    <p>
                                        Bills
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link  " href="{{route('purchases.payments.index')}}">
                                    <p>
                                        Payments
                                    </p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link  " href="{{route('purchases.vendors.index')}}">
                                    <p>
                                        Vendors
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link  text-left " disabled href="{{--{{route('purchases.returns.index')}}--}}">
                                    <p>
                                        Returns
                                    </p>
                                </button>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('inventory')
                    <li class="nav-item has-treeview ">
                        <a class="nav-link  " href="">
                            <i class='bx bx-cabinet bx-xs '></i>
                            <p>
                                Inventories
                                <i class='bx bxs-left-arrow right'></i>
                            </p>

                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a class="nav-link  " href="{{route('inventory.index')}}">
                                    <p>
                                        Main
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  " href="{{route('inventory.products')}}">
                                    <p>
                                        Products
                                    </p>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endcan

                @can('sales')
                    <li class="nav-item has-treeview ">
                        <a class="nav-link  " href="">
                            <i class='bx bx-line-chart bx-xs'></i>
                            <p>
                                Sales
                                <i class='bx bxs-left-arrow right'></i>
                            </p>

                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="nav-link  " href="{{route('sales.invoices.index')}}">
                                    <p>
                                        Invoices
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  " href="{{route('sales.revenues.index')}}">
                                    <p>
                                        Revenues
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('sales.price-offers.index')}}">
                                    <p>
                                        Price Offer
                                    </p>
                                </a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <button class="nav-link  text-left " disabled href=" {{route('sales.returns.index')}}">--}}
{{--                                    <p>--}}
{{--                                        Returns--}}
{{--                                    </p>--}}
{{--                                </button>--}}
{{--                            </li>--}}
                        </ul>
                    </li>
                @endcan

                @can('accounting')

                    <li class="nav-item">
                        <a class="nav-link  " href="">
                            <i class='bx bxs-bank bx-xs '></i>
                            <p>
                                Accounting
                                <i class='bx bxs-left-arrow right'></i>
                            </p>

                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="nav-link  "  href="{{route('accounting.accounts.index')}}">
                                    <p>
                                        Accounts
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-left"  href="{{route('accounting.journal')}}">
                                    <p>
                                        General Journal
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-left"  href="{{route('accounting.transactions.index')}}">
                                    <p>
                                        Transactions
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-left"  href="{{route('accounting.ledger')}}">
                                    <p>
                                        General Ledger
                                    </p>
                                </a>
                            </li>
                        </ul>
                @endcan
                <li class="nav-header text-muted ">Controls</li>
                @can('reports')
                    <li class="nav-item">
                        <a class="nav-link  " href="{{route('reports.index')}}">
                            <i class='bx bx-paperclip bx-xs'></i>
                            <p>

                                Reports
                            </p>
                        </a>
                    </li>
                @endcan
                {{--                @can('accounting')--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link  " href="{{route('accounting')}}">--}}
                {{--                        <i class='bx bx-line-chart bx-xs' ></i>--}}
                {{--                        <p>--}}
                {{--                            Accounting--}}
                {{--                        </p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--                @endcan--}}

                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link  " href="{{route('dropbox')}}">--}}
                {{--                        <p>--}}
                {{--                            <i class='bx bxl-dropbox bx-xs' ></i>--}}
                {{--                            Dropbox--}}
                {{--                        </p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link  " href="{{route('import.index')}}">--}}
{{--                        <i class='bx bx-import bx-xs'></i>--}}
{{--                        <p>--}}
{{--                            Import--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                @can('import')
                <li class="nav-item">
                    <a class="nav-link  " href="{{route('import.index')}}">
                        <i class='bx bx-import bx-xs'></i>
                        <p>
                            Import
                        </p>
                    </a>
                </li>
                @endcan
                @can('setting')
                    <li class="nav-item">
                        <a class="nav-link  " href="{{route('setting.index')}}">
                            <i class='bx bx-cog bx-xs'></i>
                            <p>
                                Setting
                            </p>
                        </a>
                    </li>
                @endcan

            </ul>
        </nav>
    </div>

</aside>
