<?php
namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepository;
use Illuminate\Support\Facades\Cache;
use Override;

class ProductRepoImplements implements ProductRepository{
    #[Override]
    public function getAll()
    {
        return Cache::remember('all_products', 120, function () {
            return Product::with('category')->get()->toArray();
        });
    }

    #[Override]
    public function getById(string $id)
    {
        return Product::with('category')->findOrFail($id);
    }

    #[Override]
    public function create(array $data)
    {
        Cache::forget('all_products');
        return Product::create($data);
    }

    #[Override]
    public function update(string $id, array $data)
    {
        Cache::forget('all_products');
        $product = $this->getById($id);
        $product->update($data);
        return $product;
    }

    #[Override]
    public function delete(string $id)
    {
        Cache::forget('all_products');
        $product = $this->getById($id);
        return $product->delete();
    }
}