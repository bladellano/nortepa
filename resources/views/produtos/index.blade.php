@extends('adminlte::page')

@section('content_header')
    <h4 class="m-0 text-dark">:: PRODUTO ::</h1>
    @stop

    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="card-title">Lista de Produtos</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        <a class="btn btn-sm btn-primary mb-3" href="{{ route('produtos.create') }}">ADICIONAR PRODUTO</a>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Resumo</th>
                                    <th>Categoria</th>
                                    <th>Estado</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produtos as $produto)
                                    <tr>
                                        <td>{{ $produto->nome }}</td>
                                        <td>{{ $produto->resumo }}</td>
                                        <td>{{ $produto->categoria }}</td>
                                        <td>{{ $produto->estado }}</td>
                                        <td>
                                            <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                    onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
