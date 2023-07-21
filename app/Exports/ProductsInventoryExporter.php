<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;


class ProductsInventoryExporter implements FromCollection , ShouldAutoSize ,WithMapping ,WithHeadings,WithEvents
{
    private $items ;
    public function __construct($items)
    {
        //  dd($selectedOrders);
        $this->items = $items;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Item::with(['productionOrder','inventory','creator'])->find($this->items);
       // return Item::query()->whereIn('id',$this->items);
    }


    public function map($item): array
    {
        // TODO: Implement map() method.
        return [
            $item->name,
            $item->description,
            $item->quantity . $item->unit,
            number_format($item->cost,2) + 0,
            $item->productionOrder?->number,
            $item->inventory->name,
            $item->price,
            $item->creator->name,
            $item->created_at->format('d/m/Y')
        ];
    }
    public function headings():array
    {

        return [
            'Item',
            'Description',
            'Quantity',
            'Cost',
            'Production Order',
            'Inventory',
            'Price',
            'Created By',
            'Created'
        ];
    }

    public function registerEvents(): array
    {
        // TODO: Implement registerEvents() method.
        return [
            AfterSheet::class => function(AfterSheet $event){
         //       $event->sheet->getDelegate()->setRightToLeft(true);
                $event->sheet->getStyle('A1:J1')->applyFromArray(
                    [
                        'font'=>['bold'=>true]
                    ]);
            }
        ];
    }



}
