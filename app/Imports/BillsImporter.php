<?php

namespace App\Imports;

use App\Models\Bill;
use App\Models\Element;
use App\Models\Item;
use App\Models\Product;
use App\Models\System\Status;
use App\Models\Vendor;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BillsImporter implements ToModel ,WithHeadingRow,SkipsOnError
{
    use Importable ,SkipsErrors;
    private $vendors;
    private $userId;
    private $statuses;
    private $elements;
    public function __construct()
    {

        $this->userId = auth()->id();
        $this->vendors = Vendor::select('id', 'name');
        $this->statuses = Status::where('type', 'bill')->select('id', 'name');
        $this->elements = Element::select('id','name','code')->get();
    }
    /**
    * @param array $row
    */
    public function model(array $row)
    {




        if ( !isset($row['vendor'])  ) {
            toastWarning('vendor can\'t be blank');
            return null;
        }
        if (!isset($row['status']) ) {
            toastWarning('status can\'t be blank');
            return null;
        }
        if ( !isset($row['billed_at'])) {
            toastWarning('Bill Date can\'t be blank');
            return null;
        }
        if ( !isset($row['total'])) {
            toastWarning('total can\'t be blank');
            return null;
        }

        $vendor = $this->vendors->where('name', trim($row['vendor']))->first();
        if (!isset($vendor)) {
            toastError("Vendor not found" , $row['vendor']);
            return null;
        }
        $status = $this->statuses->where('name', trim($row['status']))->first();
        if (!isset($status)) {
            toastError("Status not valid" , $row['status']);
            return null;
        }
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

        $resentBill = Bill::where('number',trim($row['number']))->first();

        if ($resentBill){
           return Item::create([
               'name' => $element->name,
               'quantity' => $row['quantity'],
               'description' => $row['description'] ?? 'no description',
               'unit' => $row['unit'] ?? 'kg',
               'price' => $row['cost'],
               'expire_at' => $row['expire_at'] ?? null,
               'bill_id' => $resentBill->id,
               'element_id' => $element->id,
               'type' => 'material',
               'user_id' => $this->userId,
               'inventory_id' => 1,
           ]);
        }
        $latest = Bill::latest()->first()->id ?? 0;
        return  Bill::create([
            'vendor_id' => $vendor->id,
            'status_id' => $status->id,
            'number' => $row['number'] ,
            'notes' => $row['notes'] ?? 'no notes',
            'billed_at' => gmdate("d-m-Y H:i:s",  ($row['billed_at'] - 25569) * 86400 ),
            'due_at' => gmdate("d-m-Y H:i:s",  ($row['due_at'] - 25569) * 86400 ) ,
            'partial_amount' => $row['partial_amount'] ,
            'sub_total' => $row['sub_total'],
            'tax_total' => $row['tax_total'],
            'discount' => $row['discount'],
            'total' => $row['total'],
            'code' => 'bill-' . (str_pad((int)$latest + 1, 5, '0', STR_PAD_LEFT)),
            'user_id' => $this->userId,
            'inventory_id' => 2,
        ])  ;
//        Item::create([
//        'name' => $element->name,
//        'quantity' => $row['quantity'],
//        'description' => $row['description'] ?? 'no description',
//        'unit' => $row['unit'] ?? 'kg',
//        'price' => $row['cost'],
//        'expire_at' => $row['expire_at'] ?? null,
//        'bill_code' => 0,
//        'element_id' => $element->id,
//        'type' => 'material',
//        'user_id' => $this->userId,
//        'inventory_id' => 1,
//    ]) ;
    }
}
