<?php

namespace App\Http\Controllers;

use App\Exports\ProductsInventoryExporter;
use App\Imports\BillsImporter;
use App\Imports\ClientsImporter;
use App\Imports\CompaniesImporter;
use App\Imports\ElementsImporter;
use App\Imports\FinalProductsImporter;
use App\Imports\ItemsImporter;
use App\Imports\ProductionOrdersImporter;
use App\Imports\VendorsImporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('import');
    }


    public function clients(Request $request)
    {
        $this->validate($request ,[
            'clients'          => 'required|mimes:xlsx',
        ]);

        //  Excel::import(new ClientsImporter(), $request->file('clients')->store('temp'));
        $file = $request->file('clients')->store('import');
        $importer = new ClientsImporter()  ;
        $importer->import($file);
        //  dd($importer);
        if (! $importer->errors()->isEmpty()){
            dd($importer->errors());
        }
        toastSuccess('Done Importing ');
        return back();
    }

    public function companies(Request $request)
    {

//        $this->validate($request ,[
//            'companies'          => 'required|mimes:xlsx',
//        ]);
//        Excel::import(new CompaniesImporter(), $request->file('companies')->store('temp'));
        $this->validate($request ,[
            'companies'          => 'required|mimes:xlsx',
        ]);
        $file = $request->file('companies')->store('import');
        $importer = new CompaniesImporter()  ;
        $importer->import($file);

        if (! $importer->errors()->isEmpty()){
            dd($importer->errors());
        }
        //   toastSuccess('new companies imported ','success');
        toastSuccess('Done Importing ');
        return back();
    }

    public function vendors(Request $request)
    {
        $this->validate($request ,[
            'vendors'          => 'required|mimes:xlsx',
        ]);
        // dd( $request->file('vendors'));
        //    Excel::import(new VendorsImporter(), $request->file('vendors')->store('temp'));

        $importer = new VendorsImporter()  ;
        $importer->import($request->file('vendors'));
        if (! $importer->errors()->isEmpty()){
            dd($importer->errors());
        }

        //    toastSuccess('new vendors imported ','success');
        toastSuccess('Done Importing ');

        return back();
    }
    public function elements(Request $request)
    {
        $this->validate($request ,[
            'elements'          => 'required|mimes:xlsx',
        ]);
        $file = $request->file('elements')->store('import');
        //  dd( $request->file('elements'));
        //Excel::import(new ElementsImporter(), $request->file('elements')->store('temp'));
        $importer = new ElementsImporter()  ;
        $importer->import($file);

        if (! $importer->errors()->isEmpty()){
            dd($importer->errors());
        }
        //   toastSuccess('new elements created ','success');
        toastSuccess('Done Importing ');
        return back();
    }
    public function items(Request $request)
    {
        $this->validate($request ,[
            'items'          => 'required|mimes:xlsx',
        ]);
        // dd( $request->file('vendors'));

        $importer = new ItemsImporter()  ;
        $importer->import($request->file('items'));
        //  Excel::import(new ItemsImporter(), $request->file('items')->store('temp'));
        if (! $importer->errors()->isEmpty()){
            dd($importer->errors());
        }
        toastSuccess('check Main Inventory','products imported');
        return back();
    }
    public function products(Request $request)
    {
        //  Excel::import(new ProductsInventoryExporter(), $request->file('products')->store('temp'));
        $this->validate($request ,[
            'products'          => 'required|mimes:xlsx',
        ]);
        $file = $request->file('products')->store('import');
        //  dd( $request->file('elements'));
        //Excel::import(new ElementsImporter(), $request->file('elements')->store('temp'));
        $importer = new FinalProductsImporter()  ;
        $importer->import($file);

        if (! $importer->errors()->isEmpty()){
            dd($importer->errors());
        }

        toastSuccess('check Final Product inventory','products imported');

        return back();
    }

    public function bills(Request $request)
    {
        $this->validate($request ,[
            'bills'          => 'required|mimes:xlsx',
        ]);
        // dd( $request->file('vendors'));

        $importer = new BillsImporter()  ;
        $importer->import($request->file('bills'));
        //  Excel::import(new ItemsImporter(), $request->file('items')->store('temp'));
        if (! $importer->errors()->isEmpty()){
            dd($importer->errors());
        }
        toastSuccess('bills imported');
        return back();
    }
    public function productionOrders(Request $request)
    {
        $this->validate($request ,[
            'production-orders'          => 'required|mimes:xlsx',
        ]);
        // dd( $request->file('vendors'));

        $importer = new ProductionOrdersImporter()  ;
        $importer->import($request->file('items'));
        //  Excel::import(new ItemsImporter(), $request->file('items')->store('temp'));
        if (! $importer->errors()->isEmpty()){
            dd($importer->errors());
        }
        toastSuccess('Production Orders imported');
        return back();
    }


}
