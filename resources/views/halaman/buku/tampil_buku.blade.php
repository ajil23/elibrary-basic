@extends('admin.admin_master')
@section('admin')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Data Buku</h1>
            </div>
            <div class="co text-end mb-2">
                <a href="{{route('buku.tambah')}}"><button type="button" class="btn btn-primary">Tambah Buku</button></a>
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
                            <th><center>Judul</center></th>
                            <th><center>Kategori</center></th>
                            <th><center>Jumlah</center></th>
                            <th><center>Sampul</center></th>
                            <th><center>Aksi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku as $item)
                        <tr>
                            <td><center>{{$loop->iteration}}</center></td>
                            <td><center>{{$item->judul}}</center></td>
                            <td><center>{{$item->kategori->nama_kategori}}</center></td>
                            <td><center>{{$item->jumlah}}</td>
                            <td><center><img src="{{ asset('storage/'.$item->image) }}" alt="sampul" style="height: 5rem; width:4rem"></center></td>
                            <td colspan="2"> <center>
                                <a href="{{route('buku.edit', $item->id)}}" class="btn btn-warning"> Edit </a>
                                <a href="{{route('buku.hapus', $item->id)}}" class="btn btn-danger">Hapus</a>
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
