<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\Element;
use App\Models\Item;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ItemsImporter implements ToModel ,WithHeadingRow ,SkipsOnError
{
    use Importable ,SkipsErrors ;
    private $elements;
    private $userId;
    public function __construct()
    {
        $this->userId = auth()->id();
        $this->elements = Element::select('id','name','code')->get();
    }
    public function model(array $row)
    {
       // dd($collection);

//            Validator::make($row, [
//               // '*.name' => 'required',
//                'quantity' => 'required',
//                'cost' => 'required',
//                'element_code' => 'required',
//
//                'description' => 'nullable',
//                'unit' => 'nullable',
//                'bill_code' => 'nullable',
//
//            ])->validate();

        if ( !isset($row['cost'])  ) {
            toastWarning('price can\'t be blank');
            return null;
        }
        if (!isset($row['quantity']) ) {
            toastWarning('quantity can\'t be blank');
            return null;
        }
        if ( !isset($row['element_code'])) {
            toastWarning('Element code can\'t be blank');
            return null;
        }
                $element = $this->elements->where('code' ,  trim($row['element_code']) )->first();

        if (!isset($element)) {
            toastError("Not an element name or code" , $row['element_code']);
            return null;
        }

        return Item::create([
            'name' => $element->name,
            'quantity' => $row['quantity'],
            'description' => $row['description'] ?? 'no description',
            'unit' => $row['unit'] ?? 'kg',
            'price' => $row['cost'],
            'expire_at' => $row['expire_at'] ?? null,
            'bill_id' => 0,
            'element_id' => $element->id,
            'type' => 'material',
            'user_id' => $this->userId,
            'inventory_id' => 1,
        ]);
    }
    public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
        toastr()->error('something went wrong please try again later','oops');
       // throw($e);
    }
}
