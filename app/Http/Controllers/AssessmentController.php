<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\PenerimaBantuan;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    // Menampilkan form tambah assessment
    public function create(Request $request)
    {
        $penerima_id = $request->query('penerima_id');
        $penerimas = PenerimaBantuan::all(); // untuk dropdown nama penerima
        return view('assessment.create', compact('penerima_id', 'penerimas'));
    }

    // Menyimpan data assessment baru
    public function store(Request $request)
    {
        $request->validate([
            'penerima_id' => 'required|exists:penerima_bantuans,id',
            'penghasilan' => 'required|string',
            'kondisi_rumah' => 'required|string',
            'hasil_akhir' => 'required|string',
        ]);

        Assessment::create($request->all());
        return redirect()->route('penerima.show', $request->penerima_id)
                         ->with('success', 'Data assessment berhasil ditambahkan.');
    }

    // Menampilkan form edit assessment
    public function edit($id)
    {
        $assessment = Assessment::findOrFail($id);
        $penerimas = PenerimaBantuan::all(); // untuk dropdown

        return view('assessment.edit', compact('assessment', 'penerimas'));
    }

    // Memperbarui data assessment
    public function update(Request $request, $id)
    {
        $request->validate([
            'penerima_id' => 'required|exists:penerima_bantuans,id',
            'penghasilan' => 'required|string',
            'kondisi_rumah' => 'required|string',
            'hasil_akhir' => 'required|string',
        ]);

        $assessment = Assessment::findOrFail($id);
        $assessment->update($request->all());

        return redirect()->route('penerima.show', $assessment->penerima_id)
                         ->with('success', 'Data assessment berhasil diupdate.');
    }

    // Menghapus data assessment
    public function destroy($id)
    {
        $assessment = Assessment::findOrFail($id);
        $penerimaId = $assessment->penerima_id;

        $assessment->delete();

        return redirect()->route('penerima.show', $penerimaId)
                         ->with('success', 'Assessment berhasil dihapus.');
    }
}
