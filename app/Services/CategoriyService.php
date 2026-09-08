<?php
namespace App\Services;
use App\Repositories\Interfaces\CatRepository;

class CategoriyService {
    protected $catRepo;

    public function __construct(CatRepository $catRepo)
    {
        $this->catRepo = $catRepo;
    }

    public function AllCategory(){
        return $this->catRepo->getAll();
    }

    public function createCat(array $data){
        return $this->catRepo->create($data);
    }

    public function updateCat(string $id, array $data){
        return $this->catRepo->update($id, $data);
    }

    public function delete(string $id){
        return $this->catRepo->delete($id);
    }
}