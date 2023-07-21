<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSettingRequest;
use App\Models\Setting;
use App\Models\System\Tax;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:setting');
    }


    public function index()
    {
        return view('setting.index');
    }

    public function default()
    {
        $currencies     = Setting::$currencies;
        $languages = Setting::$languages;

        $taxes = Tax::where('active',true)->get();

        return view('setting.default',compact('currencies','languages','taxes'));
    }
    public function company()
    {
        return view('setting.company');
    }
    public function invoices()
    {
        return view('setting.invoices');
    }

    public function working()
    {
      //  Cache::forget('setting');
        return view('setting.working');
    }
    public function taxes()
    {
        return view('setting.taxes');
    }

    public function store(StoreSettingRequest $request)
    {

       $input = $request->validated();

        if (isset($input['default_taxes'])){
            $input['default_taxes'] = json_encode($input['default_taxes']);
        }

        if (isset($input['company_logo'])){
            $path ='uploads/setting/logo';
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            if(setting('company_logo')){
                if(File::exists(storage_path().'/app/public/'.setting('company_logo'))){
                    //dd('found');
                    File::delete(storage_path().'/app/public/'.setting('company_logo'));
                }
            }
            $photoPath =  $input['company_logo']->store($path,'public');
            $settingLogo =  Setting::firstOrCreate(['name' => 'company_logo']);
            $settingLogo->value = $photoPath;
            $settingLogo->save();
            unset($input['company_logo']) ;
        }

       foreach ($input as $key => $value){
           $setting =  Setting::firstOrCreate(['name' => $key]);
           $setting->value = $value;
           $setting->save();
           Cache::forget('setting-'.$key );
       }
        unset($setting);




        //toastSuccess('Setting updated Successfully');
        return redirect()->route('setting.index');




    }

}
