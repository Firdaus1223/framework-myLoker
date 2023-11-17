<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PelamarController;

class PelamarController extends Controller
{
    public function tambah(){
        return view('admin.crud.add', [
        'pelamars' => Pelamar::all()
        ]);
    }

    public function store(Request $request)
    {

        // Validasi dan simpan data
        $validatedData = $request->validate([
            'nama_pelamar' => 'required|string',
            'email' => 'required|string|max:20',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string',
            'pengalaman_kerja' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'keterampilan' => 'required|string',
            'pekerjaan_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('public/gambar');
            $validatedData['gambar'] = $imagePath;
        }

        Pelamar::create($validatedData);

        return redirect()->route('admin.pekerjaan')->with('success', 'Data Pekerjaan Berhasil Ditambahkan');
    }



    public function edit($id){
        return view('admin.crud.edit',[
        'pekerjaans' => Pelamar::all()->where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelamar' => 'required|string',
            'email' => 'required|string|max:20'. $id,
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string',
            'pengalaman_kerja' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'keterampilan' => 'required|string',
            'pekerjaan_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pelamar = Pelamar::findOrFail($id);
        $pelamar->update([
            'nama_pelamar' => $request->nama_pelamar,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'pengalaman_kerja' => $request->pengalaman_kerja,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'keterampilan' => $request->keterampilan,
            'pekerjaan_id' => $request->pekerjaan_id,
            'gambar' => $request->gambar,
        ]);

        return redirect()->route('admin.pelamar')->with('success', 'Data Pelamar Berhasil Diubah');
    }

        public function delete($id){
            $pelamar = Pelamar::findOrFail($id);
            $pelamar->delete();
            return redirect()->route('admin.pelamar')->with('success','Data Pelamar
            Berhasil Dihapus');
        }



        public function download_excel()
    {
        // Retrieve data from the database
        $pelamar = Pelamar::all();

        // Generate Excel content
        $content = "ID nama pelamar\email\alamat\nomor_telepon\pengalaman_kerja\tpendidikan_terakhir\tketerampilan\tpekerjaan_id\tGambar\n";

        foreach ($pelamar as $pml) {
            $content .= "{$pml->nama_pelamar}\t{$pml->email}\t{$pml->alamat}\t{$pml->nomor_telepon}\t{$pml->pengalaman_kerja}\t{$pml->pendidikan_terakhir}\t{$pml->keterampilan}\t{$pml->tpekerjaan_id}\t{$pml->gambar}\n";
        }

        // Set headers for download
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=pelamar.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        // Output content to the browser
        echo $content;
        exit;
    }
}
