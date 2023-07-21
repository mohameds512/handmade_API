<?php

namespace App\Imports;

use App\Models\Element;
use App\Models\Item;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FinalProductsImporter implements  ToModel ,WithHeadingRow ,SkipsOnError
{
    use Importable, SkipsErrors;

    private $products;
    private $userId;

    public function __construct()
    {
        $this->userId = auth()->id();
        $this->products = Product::select('id', 'name', 'code');
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

        if ( !isset($row['price'])  ) {
            toastWarning('price can\'t be blank');
            return null;
        }
        if (!isset($row['quantity']) ) {
            toastWarning('quantity can\'t be blank');
            return null;
        }
        if ( !isset($row['product'])) {
            toastWarning('product can\'t be blank');
            return null;
        }
        $product = $this->products->where('code', trim($row['product']))->orWhere('name',trim($row['product']))->first();

        if (!isset($product)) {
            // dd($this->elements->get());
            toastError("Not a product name or code" , $row['product']);

            return null;
        }
        return Item::create([
            'name' => $product->name,
            'quantity' => $row['quantity'],
            'description' => $row['description'] ?? 'no description',
            'unit' => $row['unit'] ?? 'kg',
            'cost' => $row['cost'] ,
            'price' => $row['price'],
            'expire_at' => $row['expire_at'] ?? null,
            'invoice_code' => 0,
            'product_id' => $product->id,
            'type' => 'product',
            'user_id' => $this->userId,
            'inventory_id' => 2,
        ]);
    }

    public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
        toastr()->error('something went wrong please try again later', 'oops');
        // throw($e);
    }
}
