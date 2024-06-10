@extends('admin.admin_master')
@section('admin')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Data Peminjaman Buku</h1>
            </div>
            <div class="co text-end mb-2">
                <a href="{{route('peminjaman.tambah')}}"><button type="button" class="btn btn-success">Export Excel</button></a>
                <a href="{{route('peminjaman.tambah')}}"><button type="button" class="btn btn-primary">Tambah Peminjaman</button></a>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><center>No</center></th>
                            <th><center>Judul Buku</center></th>
                            <th><center>Nama Peminjam</center></th>
                            <th><center>Tanggal Peminjaman</center></th>
                            <th><center>Tanggal Pengembalian</center></th>
                            <th><center>Aksi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $item)
                        <tr>
                            <td><center>{{$loop->iteration}}</center></td>
                            <td><center>{{$item->buku->judul}}</center></td>
                            <td><center>{{$item->nama}}</center></td>
                            <td><center>{{$item->peminjaman}}</center></td>
                            <td><center>{{$item->pengembalian}}</center></td>
                            <td colspan="2"> <center>
                                <a href="{{route('peminjaman.edit', $item->id)}}" class="btn btn-warning"> Edit </a>
                                <a href="{{route('peminjaman.hapus', $item->id)}}" class="btn btn-danger">Hapus</a>
                            </center>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@endsection
