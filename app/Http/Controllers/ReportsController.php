<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:reports');
    }

    public function index()
    {
        return view('reports.index');
    }
}
