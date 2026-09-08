<?php
namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CatRepository;
use Illuminate\Support\Facades\Cache;
use Override;

class CatRepoImplements implements CatRepository{
    #[Override]
    public function getAll()
    {
        return Cache::remember('all_categories', 120, function(){
            return Category::all()->toArray();
        });
    }

    #[Override]
    public function getById(string $id)
    {
        Cache::forget('all_categories');
        return Category::findOrFail($id);
    }

    #[Override]
    public function create(array $data)
    {
        Cache::forget('all_categories');
        return Category::create($data);
    }

    #[Override]
    public function update(string $id, array $data)
    {
        Cache::forget('all_categories');
        $cat = $this->getById($id);
        $cat->update($data);
        return $cat;
    }

    #[Override]
    public function delete(string $id)
    {
        Cache::forget('all_categories');
        $cat = $this->getById($id);
        return $cat->delete();
    }
}