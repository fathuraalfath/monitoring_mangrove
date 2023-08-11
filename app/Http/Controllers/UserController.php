<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;


class UserController extends Controller
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'mangrove' => $this->UserModel->allData(),
        ];
        return view('user.v_index', $data);
    }

    public function print()
    {
        $data = [
            'mangrove' => $this->UserModel->allData(),
        ];
        return view('user.v_print', $data);
    }

    public function download($file_shp)
    {
        $path = (public_path('shp/'). urldecode($file_shp));
        // dd($path);
        if (file_exists($path)) {
            return response()->download($path);
        } else {
            abort(404, 'error');
        }
    }
}
