@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="products-header">
    <h2>Listagem de Produtos</h2>
    <button id="openModalBtn" class="btn btn-primary">Adicionar Produto</button>
</div>


<div class="products-grid">
    @forelse($products as $product)
        <div class="product-card">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->information }}</p>
            <small>Criado em: {{ $product->created_at->format('d/m/Y H:i') }}</small>
        </div>
    @empty
        <div class="empty-state">
            <p>Nenhum produto cadastrado ainda.</p>
            <p>Clique em "Adicionar Produto" para começar!</p>
        </div>
    @endforelse
</div>

<!-- Modal de Cadastro -->
<div id="productModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Adicionar Produto</h3>
            <button class="close-btn" id="closeModalBtn">&times;</button>
        </div>
        
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Nome do Produto</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="form-control" 
                    required
                    value="{{ old('name') }}"
                >
            </div>

            <div class="form-group">
                <label for="information">Informações do Produto</label>
                <textarea 
                    id="information" 
                    name="information" 
                    class="form-control" 
                    rows="4" 
                    required
                >{{ old('information') }}</textarea>
            </div>

            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" id="cancelBtn">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>
@endsection
