<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Exibir listagem de produtos
     */
    public function index(): View
    {
        $products = $this->productService->getAllProducts();
        
        return view('products.index', compact('products'));
    }

    /**
     * Criar novo produto
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'information' => 'required|string',
        ]);

        $this->productService->createProduct($validated);

        return redirect()->route('products.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }
}
