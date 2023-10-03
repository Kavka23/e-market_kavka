<?php

namespace App\Exports;

use App\Models\PengajuanBarang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengajuanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PengajuanBarang::all();
    }

    public function headings(): array
    {
        return [
            'no',
            'nama_pengaju',
            'nama_barang',
            'qty',
            'terpenuhi'
        ];
    }
}
