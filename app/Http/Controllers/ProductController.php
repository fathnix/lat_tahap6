<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Services\ProductService;
use Exception;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $product = $this->productService->getALlProduct();
            return response()->json([
                'status' => 'success',
                'message' =>'Data di temukan',
                'data' => $product
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
    public function store(StoreProductRequest $request)
    {
        try{
            $product = $this->productService->createProduct($request->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil di simpan',
                'data' => $product
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
    public function show(string $id)
    {
        try{
            $product = $this->productService->getProductById($id);
            
            return response()->json([
                'status' => 'suuccess',
                'message' => 'data ditemukan',
                'data' => $product
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        try{
            $product = $this->productService->updateProduct($id ,$request->validated());

            return response()->json([
                'status' =>'success',
                'message' => 'Berhasil update data',
                'data' => $product
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
            $product = $this->productService->deletePoduct($id);

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
