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

                            <div>
                                <label for="nome">Nome:</label>
                                <input type="text" id="nome" name="nome" value="{{ old('nome', $produto->nome) }}" required>
                            </div>
                            <div>
                                <label for="resumo">Resumo:</label>
                                <textarea id="resumo" name="resumo" required>{{ old('resumo', $produto->resumo) }}</textarea>
                            </div>
                            <div>
                                <label for="descricao_completa">Descrição Completa:</label>
                                <textarea id="descricao_completa" name="descricao_completa" required>{{ old('descricao_completa', $produto->descricao_completa) }}</textarea>
                            </div>
                            <div>
                                <label for="imagem">Imagem:</label>
                                <input type="file" id="imagem" name="imagem">
                                @if ($produto->imagem)
                                    <img src="{{ Storage::url($produto->imagem) }}" alt="Imagem do Produto" style="max-width: 200px; max-height: 200px;">
                                @else
                                    <p>Sem imagem disponível</p>
                                @endif
                            </div>
                            <div>
                                <label for="categoria">Categoria:</label>
                                <select id="categoria" name="categoria" required>
                                    <option value="maquina" {{ old('categoria', $produto->categoria) === 'maquina' ? 'selected' : '' }}>Máquina</option>
                                    <option value="ferramenta" {{ old('categoria', $produto->categoria) === 'ferramenta' ? 'selected' : '' }}>Ferramenta</option>
                                </select>
                            </div>
                            <div>
                                <label for="estado">Estado:</label>
                                <select id="estado" name="estado" required>
                                    <option value="novo" {{ old('estado', $produto->estado) === 'novo' ? 'selected' : '' }}>Novo</option>
                                    <option value="usado" {{ old('estado', $produto->estado) === 'usado' ? 'selected' : '' }}>Usado</option>
                                </select>
                            </div>
                            <button type="submit">Salvar Alterações</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @stop

    @section('css') @stop

    @section('js')
        <script>
            // function confirmRemove(id) {
            //     if (confirm('Tem certeza que deseja excluir o registro?'))
            //         document.getElementById('form_' + id).submit();
            // }
        </script>
    @stop
