@extends('layouts.master')

@section('title', 'Página Principal')

@push('styles')
<style>
    .card {
        min-height: 100vh; /* Defina a altura mínima desejada */
    }
    .custom-card {
        background-color: #f1f2f6; /* Substitua #ff0000 pela cor desejada em hexadecimal ou nome da cor. */
    } 
    .content-body-editor-card{
        background-color: #dfe4ea;
    }
    .card {
        border: none; /* Remove a borda */
    }
    .no-rounded {
        border-radius: 0; /* Remove as bordas arredondadas */
    }
    .row > * {
        padding-right: 0 !important;
        padding-left: 0 !important;
    }

    .remover-btn {
        background-color: #dc3545 !important; /* Vermelho do Bootstrap */
        border-color: #dc3545; /* Também pode ser útil ajustar a cor da borda, se necessário */
    }

    .remover-btn:hover {
        background-color: #bd2130 !important; /* Cor mais escura quando hover, se desejar */
        border-color: #bd2130 !important;
    }

    .editar-btn {
        background-color: #3CB371 !important;
        border-color: #3CB371;
    }

    .editar-btn:hover {
        background-color: #218838 !important; /* Cor mais escura quando hover, se desejar */
        border-color: #218838 !important;
    }

</style>
@endpush

@section('content')
<div id="app">
    <!-- Seu conteúdo vai aqui -->
</div>
@endsection

@push('scripts')
@endpush
