<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return response()->json([
            'status' => 'success',
            'data' => $kategori,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation_error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $kategori = Kategori::create($validator->validated());
        return response()->json([
            'status' => 'berhasil menambahkan data',
            'data' => $kategori,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        return response()->json([
            'status' => 'success',
            'data' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validator = Validator::make($request->all(), [
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation_error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $kategori->update($validator->validated());
        return response()->json([
            'status' => 'berhasil mengedit',
            'data' => $kategori,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        if ($kategori->delete()) {
            return response()->json([
                'status' => 'berhasil menghapus data',
                'data' => $kategori,
            ]);
        } else {
            return response()->json([
                'status' => 'gagal menghapus data',
                'data' => null,
            ], 500);
        }
    }
}