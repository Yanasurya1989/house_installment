@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Setoran Cicilan</h2>
        <form action="{{ route('house_installments.update', $houseInstallment->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('house_installments._form')
            <button class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
