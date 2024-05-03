@extends('admin.admin_master') 
   @section('admin')

   <!-- Begin Page Content -->
   <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Buku</h1>
        </div>
        
        {{-- Input Group --}}
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('buku.update', $editbuku->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Lengkap Buku" value="{{$editbuku->judul}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Kategori</label>
                        <select class="form-control" name="kategori_id" aria-label="Default select example" required>
                            <option  value="{{$editbuku->kategori_id}}" selected >{{$editbuku->kategori->nama_kategori}}</option>
                                @foreach ($kategori as $kategori)
                                    <option value="{{ $kategori->id }}">
                                        {{ $kategori->nama_kategori}}
                                    </option>
                                @endforeach
                          </select>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Jumlah Buku</label>
                        <input type="file" class="form-control" id="jumlah" name="jumlah">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Sampul</label>
                        <input type="file" class="form-control" id="image" name="image">
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