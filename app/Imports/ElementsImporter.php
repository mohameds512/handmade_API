<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Element;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithCustomChunkSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ElementsImporter implements ToModel ,WithHeadingRow ,WithBatchInserts ,WithCustomChunkSize ,SkipsOnError
{
    use Importable , SkipsErrors;

    private $categories;
    public function __construct()
    {
        $this->categories = Category::where('type','element')->select('id','name');
    }

//    public function rules(): array
//    {
//        return [
//            'name'             => 'required',
//            'code'            => 'required|unique:elements',
//            'category_id'            => 'required',
//            'last_price'              => 'nullable|numeric',
//        ];
//
//    }
//
//    public function customValidationMessages()
//    {
//        return [
//            #All Email Validation for Teacher Email
//            'code.unique'      => 'The Element code has already been used',
//            #Max Lenght Validation
//            'name.required'               => 'Element name must not be empty!',
//        ];
//    }


    public function model(array $row)
    {
        if ( !isset($row['category'])  ) {
            toastWarning('category can\'t be blank');
            return null;
        }
        if ( !isset($row['code'])  ) {
            toastWarning('code can\'t be blank');
            return null;
        }
        if ( !isset($row['name'])  ) {
            toastWarning('name can\'t be blank');
            return null;
        }
        if ( Element::where('code',$row['code'])->first()  ) {
            toastWarning('this code has been used before',$row['code']);
            return null;
        }
        // ?? Category::create(['name' => trim( $row['category']) ,'type'=>'element'])
        $category = $this->categories->where('name',trim($row['category']))->first() ;
        if ( !$category  ) {
            toastWarning('Category not found',$row['category']);
            return null;
        }
        return new Element([
            'name'              =>  trim($row["name"]),
            'code'             =>  trim($row["code"]),
            'category_id'               =>  $category->id ,
            'last_price'               => trim($row["last_price"]),
        ]);
    }

    public function onError(\Throwable $e)
    {
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
}
