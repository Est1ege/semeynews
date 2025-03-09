@extends('layouts.app')

@section('title', 'Ошибка')

@section('content')
<div class="container">
    <div class="alert alert-danger">
        <h4>Произошла ошибка:</h4>
        <p>{{ $error }}</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Вернуться на главную</a>
    </div>
</div>
@endsection