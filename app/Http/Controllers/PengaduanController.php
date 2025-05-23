<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

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
        ]);

        // Handle file upload
        if ($request->hasFile('upload_bukti')) {
            $path = $request->file('upload_bukti')->store('upload_bukti', 'public');
            $validated['upload_bukti'] = $path;
        }
        $validated['status_laporan'] = 'open';
        Pengaduan::create($validated);

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
