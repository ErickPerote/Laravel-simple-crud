<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    /**
     * Listar todos os produtos
     */
    public function getAllProducts(): Collection
    {
        return Product::orderBy('created_at', 'desc')->get();
    }

    /**
     * Criar um novo produto
     */
    public function createProduct(array $data): Product
    {
        return Product::create([
            'name' => $data['name'],
            'information' => $data['information'],
        ]);
    }

    /**
     * Buscar produto por ID
     */
    public function findProduct(string $id): ?Product
    {
        return Product::find($id);
    }
}
