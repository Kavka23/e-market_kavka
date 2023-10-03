<?php

// app/Imports/ProductsImport.php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\PengajuanBarang;

class PengajuanImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new PengajuanBarang([
            'nama_pengaju' => $row['nama_pengaju'],
            'nama_barang'  => $row['nama_barang'],
            'qty' => $row['qty'],
            'terpenuhi' => $row['terpenuhi']
        ]);
    }
}
