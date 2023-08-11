<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MangroveModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_mangrove')->get();
    }

    public function getImage($id)
    {
        $data = self::find($id);

        if ($data && $data->filename) {
            return $data->filename;
        }

        return null;
    }

    // public function downloadFile($id)
    // {
    //     # code...
    // }

    public function detailData($id)
    {
        return DB::table('tbl_mangrove')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_mangrove')->insert($data);
    }

    public function editData($id, $data)
    {
       DB::table('tbl_mangrove')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tbl_mangrove')->where('id', $id)->delete();
    }
}
