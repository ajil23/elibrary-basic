<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        return view('halaman.kategori.tampil_kategori', compact('kategori'));
    }

    public function add(){
        return view('halaman.kategori.tambah_kategori');
    }

    public function store(Request $request){
        $datakategori = new Kategori();
        $datakategori->nama_kategori = $request->nama_kategori;
        $datakategori->save();
        return redirect()->route('kategori.tampil');
    }

    public function edit($id){
        $editkategori = Kategori::find($id);
        return view('halaman.kategori.edit_kategori', compact('editkategori'));
    }

    public function update(Request $request, $id){
        $editkategori = Kategori::find($id);
        $editkategori->nama_kategori = $request->nama_kategori;
        $editkategori->update();
        return redirect()->route('kategori.tampil');
    }

    public function delete(string $id){
        $deletekategori = Kategori::find($id);
        $deletekategori->delete();
        return redirect()->route('kategori.tampil');
    }
}
