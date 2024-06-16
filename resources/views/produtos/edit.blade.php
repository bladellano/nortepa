@extends('adminlte::page')

@section('content_header')
    <h4 class="m-0 text-dark">:: PRODUTO ::</h1>
    @stop

    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="card-title">Cadastrar</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $produto->nome) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="resumo">Resumo:</label>
                                <textarea class="form-control" id="resumo" name="resumo" required>{{ old('resumo', $produto->resumo) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="descricao_completa">Descrição Completa:</label>
                                <textarea class="form-control" id="descricao_completa" name="descricao_completa" required>{{ old('descricao_completa', $produto->descricao_completa) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="imagem">Imagem:</label>
                                <input type="file" class="form-control-file" id="imagem" name="imagem">
                                @if ($produto->imagem)
                                    <img src="{{ Storage::url($produto->imagem) }}" alt="Imagem do Produto" class="img-thumbnail mt-2" style="max-width: 200px; max-height: 200px;">
                                @else
                                    <p>Sem imagem disponível</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="categoria">Categoria:</label>
                                <select class="form-control" id="categoria" name="categoria" required>
                                    <option value="maquina" {{ old('categoria', $produto->categoria) === 'maquina' ? 'selected' : '' }}>Máquina</option>
                                    <option value="ferramenta" {{ old('categoria', $produto->categoria) === 'ferramenta' ? 'selected' : '' }}>Ferramenta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select class="form-control" id="estado" name="estado" required>
                                    <option value="novo" {{ old('estado', $produto->estado) === 'novo' ? 'selected' : '' }}>Novo</option>
                                    <option value="usado" {{ old('estado', $produto->estado) === 'usado' ? 'selected' : '' }}>Usado</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3 btn-sm">SALVAR ALTERAÇÕES</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @stop

    @section('css') @stop

    @section('js')
    @stop
