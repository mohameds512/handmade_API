<?php

namespace App\Imports;


use App\Models\Company;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithCustomChunkSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CompaniesImporter implements ToModel ,WithHeadingRow ,WithBatchInserts ,WithCustomChunkSize  ,SkipsOnError
{
    // use SkipsFailures ;
    use Importable,SkipsErrors ;
    public function model(array $row)
    {
        if ( !isset($row['name'])  ) {
            toastWarning('name can\'t be blank');
            return null;
        }
        if ( !isset($row['state'])  ) {
            toastWarning('state can\'t be blank');
            return null;
        }

        if ( Company::where('name',$row['name'])->first()  ) {
            toastWarning('this name has been used before',$row['name']);
            return null;
        }
       //   dd($row);

            return new Company([
                'name' => $row['name'],
                'address' =>$row['address'] ?? 'no address',
                'state' => $row['state'],
                'active'     => true,
            ]);




    }
    public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
        toastError('something went wrong please try again later','oops');
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
//            'name' => ['required','unique:companies'],
//            'address' => 'nullable',
//            'state' => 'nullable',
//            // Can also use callback validation rules
////            '0' => function($attribute, $value, $onFailure) {
////                if ($value !== 'Patrick Brouwers') {
////                    $onFailure('Name is not Patrick Brouwers');
////                }
////            }
//        ];
//    }
}
