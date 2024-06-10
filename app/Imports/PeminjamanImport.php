<?php

namespace App\Imports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\ToModel;

class PeminjamanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Peminjaman([
            'buku_id' => $row['buku_id'],
            'nama' => $row['nama'],
            'peminjaman' => $row['peminjaman'],
            'pengembalian' => $row['pengembalian'],
        ]);
    }
}
