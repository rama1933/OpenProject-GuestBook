<?php

namespace App\Http\Controllers\tamu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tamu;
use File;
use PDF;

class TamuController extends Controller
{
    //
    public function index()
    {
        $data['tamu'] = Tamu::all();
        return view('tamu.index', $data);
    }

    public function index_tambah()
    {

        return view('tamu.index_tambah');
    }

    public function index_edit(Request $request, $id)
    {
        $data['tamu'] = Tamu::where('id', $id)->get();
        return view('tamu.index_edit', $data);
    }

    public function store(Request $request)
    {
        $will_insert = $request->except(['foto', 'tanggal', '_token']);
        $tanggal = strtotime($request->input('tanggal'));
        $will_insert['tanggal'] = date('Y-m-d', $tanggal);
        if ($request->hasFile('foto')) {
            $this->validate(
                $request,
                [
                    'foto' => 'max:2000',
                ],
                [
                    'foto.max' => 'Maksimal 2 Mb',
                ]

            );
            $path_file = $request->file('foto')->store(
                'foto',
                'public'
            );

            $will_insert['foto'] = $path_file;
        }

        $tamu = Tamu::create($will_insert);

        return redirect('tamu')->with('message', 'Berhasil menyimpan data');
    }

    public function update(Request $request)
    {
        $will_insert = $request->except(['foto', 'tanggal', '_token', '_method']);
        $tanggal = strtotime($request->input('tanggal'));
        $will_insert['tanggal'] = date('Y-m-d', $tanggal);
        if ($request->hasFile('foto')) {
            $this->validate(
                $request,
                [
                    'foto' => 'max:2000',
                ],
                [
                    'foto.max' => 'Maksimal 2 Mb',
                ]

            );
            $path_file = $request->file('foto')->store(
                'foto',
                'public'
            );

            $will_insert['foto'] = $path_file;
        }

        $Tamu = Tamu::where('id', $request->input('id'))->update($will_insert);
        // return response()->json(true);
        return redirect('tamu')->with('message', 'Berhasil menyimpan data');
    }

    public function hapus(Request $request, $id)
    {
        // hapus file
        $tamu = Tamu::where('id', $id)->first();
        File::delete('storage/' . $tamu->foto);

        // hapus data
        Tamu::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Berhasil menghapus data');
    }

    public function pdf(Request $request)
    {

        $query = Tamu::select(['tbl_master_tamu.*']);

        if ($request->input('nik') != null) {
            $query->where('tbl_master_tamu.nik', $request->input('nik'));
        }
        if ($request->input('tanggal') != null) {
            $query->where('tbl_master_tamu.tanggal', $request->input('tanggal'));
        }
        if ($request->input('tahun') != null) {
            $query->whereYear('tbl_master_tamu.tanggal', $request->input('tahun'));
        }

        $data['data'] = $query->get();
        $pdf = PDF::loadview('tamu.indexpdf', $data)->setPaper('a4', 'landscape');
        return $pdf->download('buku_tamu.pdf');
    }
}
