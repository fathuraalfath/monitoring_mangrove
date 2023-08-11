<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MangroveModel;
use File;
use ZipArchive;

class MangroveController extends Controller
{
    public function __construct()
    {
        $this->MangroveModel = new MangroveModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'mangrove' => $this->MangroveModel->allData(),
        ];
        return view('admin.dataMangrove.v_index', $data);
    }

    public function detail($id)
    {
        if (!$this->MangroveModel->detailData($id)){
            abort(404);
        }

        $data = [
            'mangrove'=>$this->MangroveModel->detailData($id),
        ];

        return view('admin.dataMangrove.v_detail', $data);
    }

    public function showImage()
    {
        $imageData = MangroveModel::getImageData();

        $base64Image = base64_encode($imageData);

        return view('show_image', ['tbl_mangrove'=>$mangrove]);
    }

    public function add()
    {
        return view('admin.dataMangrove.v_add');
    }

    public function insert()
    {
        Request()->validate([
            'lokasi_rhl' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'luas' => 'required',
            'kondisi' => 'required',
            'ket' => 'required',
            'foto' => 'required|mimes:jpeg,bmp,png,jpg',
            'rar' => 'required|mimes:rar,zip,pdf,shp,application/x-rar-compressed|max:10048',
        ]);

        $file = Request()->foto;
        $fileName = time().' - '.Request()->id.'.'.$file->extension();
        $file->move(public_path('dokumentasi'), $fileName);

        $berkas = Request()->rar;
        $file_shp = time().' - '.$berkas->getClientOriginalName();
        $berkas->move(public_path('shp'), $file_shp);

        $data = [
            'lokasi_rhl'=> Request()->lokasi_rhl,
            'kabupaten'=> Request()->kabupaten,
            'kecamatan'=> Request()->kecamatan,
            'desa'=> Request()->desa,
            'luas'=> Request()->luas,
            'kondisi'=> Request()->kondisi,
            'ket'=> Request()->ket,
            'filename'=> $fileName,
            'file_shp'=> $file_shp,
        ];
        $this->MangroveModel->addData($data);
        return redirect()->route('admin.index')->with('pesan','Data Berhasil Ditambah!');
    }

    public function update($id)
    {
        Request()->validate([
            'lokasi_rhl' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'luas' => 'required',
            'kondisi' => 'required',
            'ket' => 'required',
            'foto' => 'mimes:jpeg,bmp,png,jpg',
            'rar' => 'required|mimes:rar,zip,pdf,shp,application/x-rar-compressed|max:10048'
        ]);

        if (Request()->foto <>"") {
            //jika ingin ganti foto
            $file = Request()->foto;
            $fileName = time().' - '.Request()->id.'.'.$file->extension();
            $file->move(public_path('dokumentasi'), $fileName);

            $data = [
                'lokasi_rhl'=> Request()->lokasi_rhl,
                'kabupaten'=> Request()->kabupaten,
                'kecamatan'=> Request()->kecamatan,
                'desa'=> Request()->desa,
                'luas'=> Request()->luas,
                'kondisi'=> Request()->kondisi,
                'ket'=> Request()->ket,
                'filename'=> $fileName,
            ];
            $this->MangroveModel->editData($id, $data);
        }
        else {
            //jika tidak ingin mengganti foto
            $data = [
                'lokasi_rhl'=> Request()->lokasi_rhl,
                'kabupaten'=> Request()->kabupaten,
                'kecamatan'=> Request()->kecamatan,
                'desa'=> Request()->desa,
                'luas'=> Request()->luas,
                'kondisi'=> Request()->kondisi,
                'ket'=> Request()->ket,
            ];
            $this->MangroveModel->editData($id, $data);
        }

        if (Request()->rar <>"") {
            //jika ingin ganti file shp
            $berkas = Request()->rar;
            $file_shp = time().' - '.$berkas->getClientOriginalName();
            $berkas->move(public_path('shp'), $file_shp);

            $data = [
                'lokasi_rhl'=> Request()->lokasi_rhl,
                'kabupaten'=> Request()->kabupaten,
                'kecamatan'=> Request()->kecamatan,
                'desa'=> Request()->desa,
                'luas'=> Request()->luas,
                'kondisi'=> Request()->kondisi,
                'ket'=> Request()->ket,
                'file_shp'=> $file_shp,
            ];
            $this->MangroveModel->editData($id, $data);
        }
        else {
            //jika tidak ingin mengganti foto
            $data = [
                'lokasi_rhl'=> Request()->lokasi_rhl,
                'kabupaten'=> Request()->kabupaten,
                'kecamatan'=> Request()->kecamatan,
                'desa'=> Request()->desa,
                'luas'=> Request()->luas,
                'kondisi'=> Request()->kondisi,
                'ket'=> Request()->ket,
            ];
            $this->MangroveModel->editData($id, $data);
        }

        return redirect()->route('admin.index')->with('pesan','Data Berhasil Diedit!');
    }


    public function edit($id)
    {
        if (!$this->MangroveModel->detailData($id)){
            abort(404);
        }

        $data = [
            'mangrove'=>$this->MangroveModel->detailData($id),
        ];

        return view('admin.dataMangrove.v_edit',$data);
    }

    public function delete($id)
    {
        //delete foto
        $mangrove = $this->MangroveModel->detailData($id);
        if ($mangrove->filename <>""){
            unlink(public_path('dokumentasi').'/'. $mangrove->filename);
        }

        $this->MangroveModel->deleteData($id);
        return redirect()->route('admin.index')->with('pesan','Data Berhasil Dihapus!');
    }

    public function print()
    {
        $data = [
            'mangrove' => $this->MangroveModel->allData(),
        ];
        return view('admin.dataMangrove.v_print', $data);
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
