<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class UserModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_mangrove')->get();
    }

    public function detailData($id)
    {
        return DB::table('tbl_mangrove')->where('id', $id)->first();
    }
}
