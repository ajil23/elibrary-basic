<?php

namespace App\Http\Controllers;

use App\Exports\PeminjamanExport;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PeminjamanController extends Controller
{
    public function index(){
        $peminjaman = Peminjaman::all();
        return view('halaman.peminjaman.tampil_peminjaman', compact('peminjaman'));
    }
    
    public function add(){
        $databuku = Buku::all();
        return view('halaman.peminjaman.tambah_peminjaman', compact('databuku'));
    }

    public function store(Request $request){
        $peminjaman = new Peminjaman();
        $peminjaman->buku_id = $request->buku_id;
        $peminjaman->nama = $request->nama;
        $peminjaman->peminjaman = $request->peminjaman;
        $peminjaman->pengembalian = $request->pengembalian;
        $peminjaman->save();
        return redirect()->route('peminjaman.tampil');
    }

    public function edit(string $id){
        $peminjaman = Peminjaman::find($id);
        $databuku = Buku::all();
        return view('halaman.peminjaman.edit_peminjaman', compact('peminjaman', 'databuku'));
    }

    public function update(Request $request, $id){
        $peminjaman = Peminjaman::find($id);
        $peminjaman->buku_id = $request->buku_id;
        $peminjaman->nama = $request->nama;
        $peminjaman->peminjaman = $request->peminjaman;
        $peminjaman->pengembalian = $request->pengembalian;
        $peminjaman->update();
        return redirect()->route('peminjaman.tampil');
    }

    public function delete($id){
        $peminjamandelete = Peminjaman::find($id);
        $peminjamandelete->delete();
        return redirect()->route('peminjaman.tampil');
    }

    public function export() 
    {
        return Excel::download(new PeminjamanExport, 'peminjaman.xlsx');
    }
}
