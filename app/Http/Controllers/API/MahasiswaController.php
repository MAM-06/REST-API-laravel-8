<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Exception;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = mahasiswa::all();
        if($data){
            return ApiFormatter::createApi(200,'Data Mahasiswa Berhasil Diambil',$data);
        }else{
            return ApiFormatter::createApi(404,'Data Mahasiswa Tidak Ditemukan');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        try {
            $request->validate([
                'name' => 'required',
                'alamat' => 'required'
            ]);

            $mahasiswa = mahasiswa::create([
                'name' => $request->name,
                'alamat' => $request->alamat
            ]);

            $data = mahasiswa::where('id', '=', $mahasiswa->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Data Mahasiswa Berhasil Ditambahkan', $data);
            } else {
                return ApiFormatter::createApi(404, 'Data Mahasiswa Tidak Ditemukan');
            }
            
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Data Mahasiswa Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = mahasiswa::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Data Mahasiswa Berhasil Ditampilkan', $data);
        } else {
            return ApiFormatter::createApi(404, 'Data Mahasiswa Tidak Ditemukan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'alamat' => 'required'
            ]);

            $mahasiswa = mahasiswa::findOrFail($id); //mencari data berdasarkan id

            $mahasiswa -> update([
                'name' => $request->name,
                'alamat' => $request->alamat
            ]);

            $data = mahasiswa::where('id', '=', $mahasiswa->id)->get(); //mencari data berdasarkan id

            if ($data) {
                return ApiFormatter::createApi(200, 'Data Mahasiswa Berhasil Diubah', $data);
            } else {
                return ApiFormatter::createApi(404, 'Data Mahasiswa Tidak Ditemukan');
            }
            
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Data Mahasiswa Gagal Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
        $mahasiswa = mahasiswa::findOrFail($id); //mencari data berdasarkan id

        $data = $mahasiswa->delete();

        if ($data) {
            return ApiFormatter::createApi(200, 'Data Mahasiswa Berhasil Dihapus');
        } else {
            return ApiFormatter::createApi(404, 'Data Mahasiswa Tidak Ditemukan');
        }
        } catch (exception $error) {
            return ApiFormatter::createApi(400, 'Data Mahasiswa Gagal Dihapus');
        }
    }
}