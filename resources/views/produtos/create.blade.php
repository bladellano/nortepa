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
                        <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="nome">Nome:</label>
                                <input class="form-control" type="text" id="nome" name="nome" required>
                            </div>
                            <div>
                                <label for="resumo">Resumo:</label>
                                <textarea class="form-control" id="resumo" name="resumo" required></textarea>
                            </div>
                            <div>
                                <label for="descricao_completa">Descrição Completa:</label>
                                <textarea class="form-control" rows="5" id="descricao_completa" name="descricao_completa" required></textarea>
                            </div>
                            <div>
                                <label for="imagem">Imagem:</label>
                                <input class="form-control" type="file" id="imagem" name="imagem">
                            </div>
                            <div>
                                <label for="categoria">Categoria:</label>
                                <select class="form-control" id="categoria" name="categoria" required>
                                    <option value="maquina">Máquina</option>
                                    <option value="ferramenta">Ferramenta</option>
                                </select>
                            </div>
                            <div>
                                <label for="estado">Estado:</label>
                                <select class="form-control" id="estado" name="estado" required>
                                    <option value="novo">Novo</option>
                                    <option value="usado">Usado</option>
                                </select>
                            </div>
                            <button class="btn btn-sm btn-primary mt-2" type="submit">SALVAR</button>
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
