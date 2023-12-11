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
</style>
@endpush

@section('content')
<div id="app">
    <!-- Seu conteúdo vai aqui -->
</div>
@endsection

@push('scripts')
@endpush
