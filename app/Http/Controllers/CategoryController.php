<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\StoreCatRequest;
use App\Http\Requests\Categories\UpdateCatRequest;
use Exception;
use App\Services\CategoriyService;
class CategoryController extends Controller
{
    protected $categoriyService;
    public function __construct(CategoriyService $categoriyService)
    {
        $this->categoriyService = $categoriyService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categories = $this->categoriyService->AllCategory();

            return response()->json([
                'status' => 'success',
                'meessage' => 'Data berhasil dilihat',
                'data' => $categories
            ], 200);
            
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatRequest $request)
    {
        try{
            $category = $this->categoriyService->createCat($request->validated());

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil tambah kategori',
                'data' => $category
            ], 201);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatRequest $updateCatRequest, string $id)
    {
        try{
            $category = $this->categoriyService->updateCat($id, $updateCatRequest->validated());

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil di update',
                'data' => $category
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->categoriyService->delete($id);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil di hapus'
            ], 200);

        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
