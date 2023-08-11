<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PanduanModel;

class PanduanController extends Controller
{
    public function __construct()
    {
        $this->PanduanModel = new PanduanModel();
        $this->middleware('auth');
    }

    public function panduan()
    {
        return view('v_panduan');
    }
}
