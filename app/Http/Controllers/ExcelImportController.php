<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use App\Imports\PengajuanImport; // Gantilah dengan nama Import yang sesuai


class ExcelImportController extends Controller
{

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new PengajuanImport, $file);

        // Tambahkan logika lain jika diperlukan

        return redirect()->back()->with('success', 'Data berhasil diimpor');
    }
}
