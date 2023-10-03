<?php

namespace App\Http\Controllers;

use App\Models\PengajuanBarang;
use App\Http\Requests\StorePengajuanBarangRequest;
use App\Http\Requests\UpdatePengajuanBarangRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;
use App\Exports\PengajuanExport;
use Maatwebsite\Excel\Facades\Excel;


class PengajuanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['pengajuan'] = PengajuanBarang::orderBy('created_at', 'DESC')->get();

            return view('pengajuan.index')->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponses($error->getMessage(), $error->getCode());
        }
    }
    public function export()
    {
        return Excel::download(new PengajuanExport, 'Pengajuan.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengajuanBarangRequest $request)
    {
        $input = $request->all();
        $input['terpenuhi'] = true;
        $input['tidak_terpenuhi'] = false;
        PengajuanBarang::create($input);

        return redirect('pengajuan')->with('success', 'Data Pengaju berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengajuanBarang $pengajuanBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengajuanBarang $pengajuanBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengajuanBarangRequest $request, PengajuanBarang $pengajuanBarang, $id)
    {
        $pengajuanBarang->find($id)->update($request->all());

        return redirect('pengajuan')->with('success', 'Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengajuanBarang $pengajuanBarang, $id)
    {
        $pengajuanBarang->find($id)->delete();
        return redirect('pengajuan')->with('success', 'Data Pengajuan berhasil dihapus!');
    }
}
