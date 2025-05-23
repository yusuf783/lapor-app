<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Ixudra\Curl\Facades\Curl;

 
class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function status()
    {
        $data['pengaduan'] = Pengaduan::get();
        return view('status_laporan',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
       $validated = $request->validate([
    'nama_pelapor' => 'required|string|max:255',
    'no_hp' => 'required|numeric',
    'nomor_identitas' => 'required|string|max:255',
    'status_pelapor' => 'required|string|in:tendik,dosen,mahasiswa',
    'judul_permasalahan' => 'required|string|max:255',
    'lokasi_permasalahan' => 'required|string|max:255',
    'jenis_layanan' => 'required|string|in:air,listrik,komputer,kebersihan,internet,lainnya',
    'deskripsi_permasalahan' => 'required|string',
    'upload_bukti' => 'required|image|mimes:jpeg,png|max:2048',
], [
    'required' => ':attribute wajib di isi.',
    'numeric' => ':attribute harus berupa angka.',
    'string' => ':attribute harus berupa teks.',
    'max' => ':attribute tidak boleh lebih dari :max karakter.',
    'image' => ':attribute harus berupa gambar.',
    'mimes' => ':attribute harus berformat jpeg atau png.',
    'in' => 'Pilihan :attribute tidak valid.'
]);


        // Handle file upload
        if ($request->hasFile('upload_bukti')) {
            $path = $request->file('upload_bukti')->store('upload_bukti', 'public');
            $validated['upload_bukti'] = $path;
        }
        $validated['status_laporan'] = 'open'; 

      
        $pengaduan = Pengaduan::create($validated);
        $url = 'http://lapor-app.test/admin';
        if($pengaduan){
            $text =  "Laporan Baru !\n".
            " ".$pengaduan->judul_permasalahan.":\n\n".
            "Nama Pelapor :".$pengaduan->nama_pelapor."\n".
            "Nomor Hp :".$pengaduan->no_hp."\n".
            "Lokasi :".$pengaduan->lokasi_permasalahan."\n".
            "Silahkan kunjungi alamat berikut : `".$url."`";
     

        Curl::to('https://api.telegram.org/bot2089009414:AAHnvnPOlmmdoA1zJ6SX66hp-JeZODhdoHE/sendMessage')
            ->withData( array( 'chat_id' => '-4959359726', 'text' => $text, 'parse_mode' => 'Markdown') )
            ->get();

        }

        return response()->json('Pengaduan submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['detail'] = Pengaduan::findOrFail($id);

        return view('show_detail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}