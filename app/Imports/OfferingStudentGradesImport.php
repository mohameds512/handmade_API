<?php

namespace App\Imports;

use App\Model\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class OfferingStudentGradesImport implements ToModel, WithValidation, WithHeadingRow, WithChunkReading
{
    private $columns;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function __construct($columns)
    // {
    //     $this->columns = $columns;
    // }

    public function model(array $row)
    {
        // return new User([
        //     'first_name' => $row['first_name'],
        //     'last_name' => $row['last_name'],
        //     'email' => $row['email'],
        //     'age_group_id' => $row['age_group_id'],
        //     'type' => $row['type'],
        //     'state' => $row['state'],
        //     'country' => $row['country'],
        //     'city' => $row['city'],
        //     'zip_code' => $row['zip_code'],
        // ]);
      
    }

    public function rules(): array
    {
        return [
          //  '*.email' => 'unique:users',
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }


}
