<?php

namespace App\Imports;

use App\Models\Services\Applicant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ApplicantImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Applicant([
            'name'     => $row['alasm'],
            'national_id' => $row['alrkm_alkomy'],
            'total'   => $row['almgmoaa'],
            'phone'   => $row['altlyfon'],
            'email' => $row['albryd_alalktrony'],
        ]);
    }
}
