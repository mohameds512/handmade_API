<?php

namespace App\Http\Controllers\Api\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListRequest;
use App\Http\Requests\Purchases\StoreVendorRequest;
use App\Http\Resources\Purchases\VendorsResource;
use App\Models\Accounting\Account;
use App\Models\Accounting\Currency;
use App\Models\Purchases\Vendor;
use App\Models\System\Country;
use App\Models\System\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:purchases');
    }

    public function list(ListRequest $request)
    {
        $input = $request->all();
        //
        return  VendorsResource::collection( Vendor::search($input['keywords'])
//            ->orderBy($input['orderBy'], $input['orderDesc'] ? 'desc' : 'asc')
            ->paginate($input['limit']));
    }

    public function create(){
        $countries = Country::all();
        $currencies = Currency::all();
        return success(['countries' => $countries , 'currencies'=>$currencies]);
    }

    public function getStates(Request $request){
        $states = State::where('country_id', $request->country_id )->get();
//        $states = State::whereHas('country', fn($q)=>$q->where('name',$request->country)->get();
        return success(['states' => $states]);
    }

    public function store(StoreVendorRequest $request,Vendor $vendor = null){

        $validated =  $request->all();
        try {
            DB::beginTransaction();

            $data =  [
                'business_name' => $validated['business_name'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'code' => $validated['code'],
                'phone' => $validated['phone'],
                'telephone' => $validated['telephone'],
                'state_id' => $validated['state_id'],
                'city' => $validated['city'],
                'address' => $validated['address'],
                'email' => $validated['email'],
                'cr' => $validated['cr'],
                'tax_number' => $validated['tax_number'],
            ];

//            $vendor = Vendor::updateOrCreate(
//                ['id',$validated['id']],
//
//            );

            if ($vendor) {
                $vendor->update($data);
            } else {
                $vendor = Vendor::create($data);
            }

           $account = Account::create([
               'name' => $vendor->business_name,
               'type' => 'credit',
               'category_id' => 2,
                'opening_balance' => $validated['opening_balance'],
                'opening_balance_date' => $validated['opening_balance_date'],
           ]);
            DB::commit();
            return response()->json(['message' => 'Vendor created successfully'], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            return response()->json(['message' => 'Failed to create or update Vendor','error'=>$e], 500);
        }
    }
}
