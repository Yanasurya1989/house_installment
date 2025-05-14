@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Setoran Cicilan</h2>
        <form action="{{ route('house_installments.store') }}" method="POST">
            @csrf
            @include('house_installments._form')
            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
