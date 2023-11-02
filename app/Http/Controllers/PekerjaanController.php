<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PekerjaanController;

class PekerjaanController extends Controller
{
    public function tambah(){
        return view('admin.crud.add', [
        'pelamars' => Pelamar::all()
        ]);
    }

    public function store(Request $request)
    {
        // Validate and store data
        $validatedData = $request->validate([
            'pekerjaan_id' => 'required|string|max : 20',
            'posisi' => 'required|string',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'gaji' => 'required|integer',
            'tanggal_posting' => 'required|date',
        ]);

        Pekerjaan::create($validatedData);

        return redirect()->route('admin.pekerjaan')->with('success', 'Data Pekerjaan Berhasil Ditambahkan');
    }


    public function edit($id){
        return view('admin.crud.edit',[
        'pekerjaans' => Pekerjaan::all()->where('id', $id)->first(),
        'pelamars' => Pelamar::all(),
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
        'pekerjaan_id' => 'required|string|max : 20',
        'posisi' => 'required|string',
        'deskripsi' => 'required|string',
        'lokasi' => 'required|string',
        'gaji' => 'required|integer',
        'tanggal_posting' => 'required|date'
        ]);
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->update([
        'pekerjaan_id' => $request->pekerjaan_id,
        'posisi' => $request->posisi,
        'deskripsi' => $request->deskripsi,
        'lokasi' => $request->lokasi,
        'gaji' => $request->gaji,
        'tanggal_posting' => $request->tanggal_posting,
        ]);
        return redirect()->route('admin.pekerjaan')->with('success','Data Pekerjaan
        Berhasil Diubah');
        }

        public function delete($id){
            $pekerjaan = Pekerjaan::findOrFail($id);
            $pekerjaan->delete();
            return redirect()->route('admin.pekerjaan')->with('success','Data Pekerjaan
            Berhasil Dihapus');
        }
}
