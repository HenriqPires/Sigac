@extends('layouts.sidebar')

@section('header')
    Painel do Aluno
@endsection

@section('content')
    <div class="container">
        <h2>Bem-vindo, {{ Auth::user()->name }}!</h2>

    </div>
@endsection