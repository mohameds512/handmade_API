<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductionOrdersImporter implements  ToModel ,WithHeadingRow ,SkipsOnError
{
    use Importable ,SkipsErrors;
    /**
     * @param array $row
     */
    public function model(array $row)
    {
        //
    }
}
