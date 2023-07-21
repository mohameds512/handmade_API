<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\Vendor;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VendorsImporter implements ToModel , WithHeadingRow,SkipsOnError
{
    use Importable ,SkipsErrors ;


    public function model(array $row)
    {

        if ( Vendor::where('phone',$row['phone'])->first()  ) {
            toastWarning('this phone has been used before',$row['phone']);
            return null;
        }

//        if (!isset($row['name'])) {
//            return null;
//        }


        return new Vendor([
            'name'       => $row['name'],
            'phone'      => $row['phone'],
            'email'      => $row['email'],
            'address'    => $row['address'] ?? 'no address',
            'active'     => true,
            'vat'        => $row['vat'] == 'Y'
        ]);
    }

//    public function rules(): array
//    {
//        return [
//            'name' => [
//                'required',
//                'string',
//            ],
//            'phone' => ['required','unique:vendors'],
//            'email' => ['nullable','email'],
//            'address' => ['required','string'],
//        ];
//    }
//
//
//    public function customValidationMessages()
//    {
//        return [
//            'phone.unique' => 'Correo ya esta en uso.',
//        ];
//    }

}
