<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplatesController extends Controller
{
    public function clients ()
    {
        $file = public_path(). "/storage/templates/clients.xlsx";

        $headers = ['Content-Type: application/pdf'];


        if (file_exists($file)) {
            return \Response::download($file, 'clients.xlsx', $headers);
        } else {
            return back()->with('File not found.');
        }

        //   return Storage::download('templates/clients.xlsx');
    }

    public function companies ()
    {
        $file = public_path(). "/storage/templates/companies.xlsx";

        // $headers = ['Content-Type: application/pdf'];

        if (file_exists($file)) {
            return \Response::download($file, 'companies.xlsx');
        } else {
            return back()->with('File not found.');
        }


        //     return Storage::download('templates/companies.xlsx');
    }

    public function vendors ()
    {
        $file = public_path() . "/storage/templates/vendors.xlsx";
        if (file_exists($file)) {
            return \Response::download($file, 'vendors.xlsx');
        } else {
            return back()->with('File not found.');
        }
    }
    public function elements ()
    {
        $file = public_path() . "/storage/templates/elements.xlsx";
        if (file_exists($file)) {
            return \Response::download($file, 'elements.xlsx');
        } else {
            return back()->with('File not found.');

        }
    }
    public function items ()
    {
        $file = public_path() . "/storage/templates/items.xlsx";
        if (file_exists($file)) {
            return \Response::download($file, 'items.xlsx');
        } else {
            return back()->with('File not found.');
        }
    }
    public function products ()
    {
        $file = public_path() . "/storage/templates/products.xlsx";
        if (file_exists($file)) {
            return \Response::download($file, 'products.xlsx');
        } else {
            return back()->with('File not found.');

        }
    }

    public function bills ()
    {
        $file = public_path() . "/storage/templates/bills.xlsx";
        if (file_exists($file)) {
            return \Response::download($file, 'bills.xlsx');
        } else {
          //  toastError('File not found.');
            return back()->with('File not found.');
        }
    }
    public function productionOrders ()
    {
        $file = public_path() . "/storage/templates/production-orders.xlsx";
        if (file_exists($file)) {
            return \Response::download($file, 'production orders.xlsx');
        } else {
            return back()->with('File not found.');

        }
    }
}
