<?php

namespace App\Http\Controllers;

use App\Models\PenerimaBantuan;
use Illuminate\Http\Request;

class PenerimaBantuanController extends Controller
{
    public function index()
    {
        $data = PenerimaBantuan::all();
        return view('penerima.index', compact('data'));
    }

    public function create()
    {
        return view('penerima.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'jenis_bantuan' => 'required',
        ]);

        PenerimaBantuan::create($request->all());
        return redirect()->route('penerima.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $penerima = PenerimaBantuan::findOrFail($id);

        $query = $penerima->assessments();
        if (request('filter')) {
            $query->where('hasil_akhir', request('filter'));
        }

        $assessments = $query->get();

        return view('penerima.show', compact('penerima', 'assessments'));
    }

    public function edit(PenerimaBantuan $penerima)
    {
        return view('penerima.edit', compact('penerima'));
    }

    public function update(Request $request, PenerimaBantuan $penerima)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'jenis_bantuan' => 'required',
        ]);

        $penerima->update($request->all());
        return redirect()->route('penerima.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(PenerimaBantuan $penerima)
    {
        $penerima->delete();
        return redirect()->route('penerima.index')->with('success', 'Data berhasil dihapus.');
    }
}
