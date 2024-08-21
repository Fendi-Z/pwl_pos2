<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    //
    public function cekObject() {
        $anggota = new AnggotaModel;

        dump($anggota);
    }

    public function insert() {
        $anggota = new AnggotaModel;
        $anggota->nip='1234323';
        $anggota->nama='Dina';
        $anggota->tanggal_lahir='2001-08-31';
        $anggota->nilai='3.5';
        $anggota->save();
        echo 'Data berhasil disimpan';
    }
    
    public function update() {
        $anggota = AnggotaModel::find(1);
        $anggota->nama='Dono';
        $anggota->nilai='3.0';
        $anggota->save();
        echo 'Data berhasil diupdate';
    }

    public function delete() {
        $anggota = AnggotaModel::find(1);
        $anggota->delete();
        echo "Data berhasil dihapus";
    }

    public function all() {
        $result = AnggotaModel::all();
        return view('tampilkan_anggota', ['anggota'=>$result]);
    }
    
    public function find() {
        $result = AnggotaModel::find(3);
        return view('tampilkan_anggota', ['anggota'=>[$result]]);
    }

    public function getWhere() {
        $result = AnggotaModel::where('nilai', '>', '3.3')->orderBy('nama', 'desc')->get();
        return view('tampilkan_anggota', ['anggota'=>$result]);
    }
}