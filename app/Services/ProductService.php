<?php
namespace App\Services;

use App\Jobs\StrukBarang;
use App\Repositories\Interfaces\ProductRepository;


class ProductService{
    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function getALlProduct(){
        return $this->productRepo->getAll();
    }

    public function getProductById(string $id){
        return $this->productRepo->getById($id);
    }

    public function createProduct(array $data){
        $product = $this->productRepo->create($data);
        StrukBarang::dispatch($product->toArray());
        return $product;
    }

    public function updateProduct(string $id, array $data){
        return $this->productRepo->update($id, $data);
    }

    public function deletePoduct(string $id){
        return $this->productRepo->delete($id);
    }
}