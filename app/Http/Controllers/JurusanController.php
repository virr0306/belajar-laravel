<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = jurusan::all();
        return view('jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        jurusan::create($request->all());
        return redirect('/jurusan')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jurusan = jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $jurusan = jurusan::findOrFail($id);
        $jurusan->update($request->all());

        return redirect('/jurusan')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $jurusan = jurusan::findOrFail($id);
        $jurusan->delete();

        return redirect('/jurusan')->with('success', 'Data berhasil dihapus');
    }
}