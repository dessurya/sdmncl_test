@extends('admin-page.__layout.basic')

@section('title')
Self Data
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('content')
@livewire('admin-page.action-button', ['button' => []])
<br><br><br>
<center><h6>Haloo {{ auth()->guard('users')->user()->name }}</h6></center>
<br><br><br>
@endsection