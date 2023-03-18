<?php

namespace App\Http\Controllers;

use App\Models\Nama;
use App\Models\Tipe;
use App\Helper\Helper;
use Illuminate\Database\QueryException;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreNamaRequest;
use App\Http\Requests\UpdateNamaRequest;
use App\Models\Barang;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class NamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partials.nama_barang.daftarNama', [
            'nama' => Nama::with('tipe')->get(),
            'title' => 'Daftar Nama Barang',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partials.nama_barang.addNama', [
            'title' => 'add nama barang',
            'tipe' => Tipe::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNamaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNamaRequest $request)
    {
        $req = $request->validate([
            'nama_barang' => 'required',
            'merk' => 'required',
            'tipe' => 'required',
            'spesifikasi' => 'required'
        ]);
        try {
            Nama::create([
                'kode_barang' => Helper::IdGenerator(new Nama, 'kode_barang', 5, 'BRG'),
                'nama_barang' => $req['nama_barang'],
                'merk' => $req['merk'],
                'tipe_id' => $req['tipe'],
                'spesifikasi' => $req['spesifikasi']
            ]);
            return redirect('barang')->with('success', 'data berhasil ditambah');
        } catch (QueryException $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nama  $nama
     * @return \Illuminate\Http\Response
     */
    public function show($kode)
    {
        Nama::where('kode_barang', $kode)->update([
            'jumlah_barang' => Nama::find($kode)->barang->count(),
            'rusak' => Barang::where('nama_kode_barang', $kode)->where('kondisi', 'rusak')->count(),
            'kurang_baik' => Barang::where('nama_kode_barang', $kode)->where('kondisi', 'kurang_baik')->count(),
            'baik' => Barang::where('nama_kode_barang', $kode)->where('kondisi', 'baik')->count(),
        ]);
        return view('partials.barang.daftarBarang', [
            'barang' => Barang::where('nama_kode_barang', $kode)->filter()->paginate(10),
            'nama' => Nama::find($kode),
            'title' => 'Daftar Barang ',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nama  $nama
     * @return \Illuminate\Http\Response
     */
    public function edit($nama)
    {
        // return dd(Nama::find($nama));
        return view('partials.nama_barang.editNama', [
            'nama' => Nama::find($nama),
            'tipe' => Tipe::all(),
            'title' => 'Edit Nama Barang',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNamaRequest  $request
     * @param  \App\Models\Nama  $nama
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNamaRequest $request, $nama)
    {
        $req = $request->validate([
            'nama_barang' => 'required',
            'merk' => 'required',
            'tipe_id' => 'required',
            'spesifikasi' => 'required'
        ]);
        try {
            Nama::where('kode_barang', $nama)->update($req);
            return redirect('/barang')->with('success', 'data berhasil diupdate');
        } catch (QueryException $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nama  $nama
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode)
    {
        try {
            Nama::destroy($kode);
            return redirect('/barang')->with('success', 'data berhasil dihapus');
        } catch (QueryException $exception) {
            return redirect('/barang')->with('error', $exception->getMessage());
        }
    }
}
