@extends('errors::minimal')

@section('title', __('Forbidden'))
{{-- @section('code', '403') --}}
@section('code')
    <h1>403</h1>
@endsection
@section('message')
    <h1>Kamu tidak boleh masuk, <br> Silahkan hubungi admin !</h1>
    <a href="/">Back</a>
@endsection
{{-- @section('message', __($exception->getMessage() ?: 'Forbidden')) --}}
