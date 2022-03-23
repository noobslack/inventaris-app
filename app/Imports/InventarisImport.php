<?php

namespace App\Imports;

use App\Models\inventaris;
use Maatwebsite\Excel\Concerns\ToModel;

class InventarisImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new inventaris([
            //
        ]);
    }
}
