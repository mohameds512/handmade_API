<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\Company;
use App\Models\System\Status;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithCustomChunkSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImporter implements ToModel ,WithHeadingRow ,WithBatchInserts ,WithCustomChunkSize  ,SkipsOnError
{
    use Importable ,SkipsErrors ;
   // use SkipsFailures ;
    private $statuses;
    private $companies;
    public function __construct()
    {
        $this->statuses = Status::where('type','client')->select('id','name');
        $this->companies = Company::select('id','name');

    }


    public function model(array $row)
    {

        if ( Client::where('code',$row['code'])->first()  ) {
            toastWarning('this code has been used before',$row['code']);
            return null;
        }
        if ( Client::where('phone',$row['phone'])->first()  ) {
            toastWarning('this phone has been used before',$row['phone']);
            return null;
        }
        $company = $this->companies->where('name',trim($row['company_name']))->first() ?? Company::create(['name' => trim($row['company_name'])]);
        // dd($company);
        $status = $this->statuses->where('name',trim($row['status']))->first();
        //  dd($status->id);
        return new Client([
            'name' => trim($row['name']),
            'phone' => trim($row['phone']),
            'type' => trim($row['type']),
            'status_id' => $status->id,
            'company_id' =>$company->id,
            'location' => trim($row['location']),
            'vat' => $row['vat'] == 'Y',
            'code' => trim($row['code']),
            'payment' => trim($row['payment']),
        ]);


    }
    public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
          toastr()->error('something went wrong please try again later','oops');
        throw($e);
    }
    public function chunkSize(): int
    {
        return 5000;
    }
    public function batchSize(): int
    {
        return 1000;
    }


//    public function rules(): array
//    {
//
////        $validate =  ->validate($row, [
////
////            //  's' => 'required',
////        ])->validate();
//
//        return [
//            'name' => 'required',
//            'phone' => ['required','unique:clients'],
//            'status' => 'required',
//            'company_name' => 'required',
//            'code' => ['nullable','unique:clients'],
//
//            // Can also use callback validation rules
////            '0' => function($attribute, $value, $onFailure) {
////                if ($value !== 'Patrick Brouwers') {
////                    $onFailure('Name is not Patrick Brouwers');
////                }
////            }
//        ];
//    }
}
