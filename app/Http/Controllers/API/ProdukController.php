<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Produk::with('kategori')->get();
        return response()->json($data);
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
        $validate = Validator::make($request->all(), [
           'nama_produk' => 'required',
           'stok' => 'required',
           'deskripsi' => 'required',
           'harga' => 'required',
           'id_kategori' => 'required'
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        // proses simpan data
        $data = Produk::create($request->all());
        return response()->json([
            'pesan' => 'Data berhasil disimpan',
            'data' => $data
        ], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show($produk)
    {
        $data = Produk::with('kategori')->where('id', $produk)->first();
        if(!empty($data)){
            return response()->json([
                'data'=>$data,
            ], 200);
        }
        return response()->json(['message' => 'Data Tidak Di Temukan'], 404);
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
    public function update(Request $request, string $produk)
    {
        $data = Produk::with('kategori')->where('id',$produk)->first();
        if(!empty($data)){
            $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'id_kategori' => 'required'
            ]);
            if($validator->passes()){
                $data->update($request->all());
                return response()->json([
                    'message' => 'Data Berhasil Di Ubah',
                    'data' => $data
                ]);
            }else{
                return response()->json([
                    'message' => 'Data gagal di Ubah',
                    'data' => $validator->errors()->all()
                ]);
            }
        }
        return response()->json(['message' => 'Data Tidak di temukan!'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($produk)
    {
        $data = Produk::where('id', $produk)->first();
        if(empty($data)){
            return response()->json([
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        $data->delete();
        return response()->json([
            'message' => 'Data berhasil di hapus'
        ]);
    }
}