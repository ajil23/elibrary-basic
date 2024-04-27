<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index(){
        $buku = Buku::all();
        return view('halaman.buku.tampil_buku', compact('buku'));
    }

    public function add(){
        $kategori = Kategori::all();
        return view('halaman.buku.tambah_buku', compact('kategori'));
    }

    public function store(Request $request){
        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->kategori_id = $request->kategori_id;
        if ($request->hasFile('image')) {
            $sampul = $request->file('image')->store('image');
            $buku->image = $sampul;
        }

        if ($request->hasFile('pdf')) {
            $request->validate([
                'pdf' => 'required|mimes:pdf|max:2048',
            ]);
            $pdfFile = $request->file('pdf');
            $filebuku  = $pdfFile->store('pdf', 'public');
            $buku->pdf = $filebuku ;
        }
        $buku->save();
        return redirect()->route('buku.tampil');
    }

    public function edit($id){
        $editbuku = Buku::find($id);
        $kategori = Kategori::all();
        return view('halaman.buku.edit_buku', compact('editbuku', 'kategori'));
    }

    public function update(Request $request, $id){
        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->kategori_id = $request->kategori_id;
        if ($request->hasFile('image')) {
            Storage::delete($buku->image);
            $image = $request->file('image')->store('image');
            $buku->image = $image;
        }
        if ($request->hasFile('pdf')) {
            $request->validate([
                'pdf' => 'required|mimes:pdf|max:2048',
            ]);
            Storage::delete($buku->pdf);
            $pdfFile = $request->file('pdf');
            $filebuku  = $pdfFile->store('pdf', 'public');
            $buku->pdf = $filebuku ;
        }
        $buku->update();
        return redirect()->route('buku.tampil');
    }

    public function delete($id){
        $buku = Buku::find($id);
        $buku->delete();
        return redirect()->route('buku.tampil');
    }

    public function pdf(string $id){
        $buku = Buku::findOrFail($id); 
        $pdfPath = public_path('storage/' . $buku->pdf);
        return response()->file($pdfPath);
    }
}
