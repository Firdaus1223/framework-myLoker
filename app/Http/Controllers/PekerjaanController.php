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

        // Validasi dan simpan data
        $validatedData = $request->validate([
            'posisi' => 'required|string',
            'pekerjaan_id' => 'required|string|max:20',
            'lokasi' => 'required|string',
            'deskripsi' => 'required|string',
            'gaji' => 'required|string',
            'tanggal_posting' => 'required|string',
            'email_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('public/gambar');
            $validatedData['gambar'] = $imagePath;
        }

        Pekerjaan::create($validatedData);

        return redirect()->route('admin.pekerjaan')->with('success', 'Data Pekerjaan Berhasil Ditambahkan');
    }



    public function edit($id){
        return view('admin.crud.edit',[
        'pekerjaans' => Pekerjaan::all()->where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'posisi' => 'required|string',
            'pekerjaan_id' => 'required|string|max:20'. $id,
            'lokasi' => 'required|string',
            'deskripsi' => 'required|string',
            'gaji' => 'required|string',
            'tanggal_posting' => 'required|string',
            'email_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->update([
            'posisi' => $request->posisi,
            'pekerjaan_id' => $request->pekerjaan_id,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'gaji' => $request->gaji,
            'tanggal_posting' => $request->tanggal_posting,
            'email_id' => $request->email_id,
            'gambar' => $request->gambar,
        ]);

        return redirect()->route('admin.pekerjaan')->with('success', 'Data Pekerjaan Berhasil Diubah');
    }

        public function delete($id){
            $pekerjaan = Pekerjaan::findOrFail($id);
            $pekerjaan->delete();
            return redirect()->route('admin.pekerjaan')->with('success','Data Pekerjaan
            Berhasil Dihapus');
        }



        public function download_excel()
    {
        // Retrieve data from the database
        $pekerjaan = Pekerjaan::all();

        // Generate Excel content
        $content = "ID Pekerjaan\tPosisi\tDeskripsi\tLokasi\tGaji\tTanggal Posting\tEmail ID\tGambar\n";

        foreach ($pekerjaan as $pkj) {
            $content .= "{$pkj->pekerjaan_id}\t{$pkj->posisi}\t{$pkj->deskripsi}\t{$pkj->lokasi}\t{$pkj->gaji}\t{$pkj->tanggal_posting}\t{$pkj->email_id}\t{$pkj->gambar}\n";
        }

        // Set headers for download
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=pekerjaan.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        // Output content to the browser
        echo $content;
        exit;
    }
}
