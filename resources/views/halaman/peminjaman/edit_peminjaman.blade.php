@extends('admin.admin_master') 
   @section('admin')

   <!-- Begin Page Content -->
   <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Peminjaman</h1>
        </div>
        
        {{-- Input Group --}}
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Judul Buku</label>
                        <select name="buku_id" id="buku_id" class="form-control">
                            <option value="{{$peminjaman->buku_id}}">{{$peminjaman->buku->judul}}</option>
                            @foreach ($databuku as $buku)
                                <option value="{{ $buku->id }}">
                                    {{ $buku->judul}}
                                </option>
                            @endforeach
                          </select>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nama Peminjam</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Peminjam Buku" value="{{$peminjaman->nama}}">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" id="peminjaman" name="peminjaman" placeholder="Tulis kategori baru" value="{{$peminjaman->peminjaman}}">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="pengembalian" name="pengembalian" placeholder="Tulis kategori baru" value="{{$peminjaman->pengembalian}}">
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-success shadow">Simpan</button>
                        <button type="button" onclick="history.back()" class="btn btn-danger shadow">Batalkan</button>
                    </div>
                </form>
            </div>
        </div>
   </div>
   @endsection