{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1 class="mb-4">👋 Selamat datang, {{ Auth::user()->name }}!</h1>
        <p class="text-muted mb-5">Silakan pilih menu di bawah ini untuk mulai mengelola data.</p>
    </div>

    <div class="row justify-content-center">
        <!-- Beranda -->
        <div class="col-md-3 mb-4">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">
                <div class="card text-center shadow-sm {{ request()->is('/dashboard') ? 'border-primary' : '' }}">
                    <div class="card-body">
                        <div class="display-4 mb-2">🏠</div>
                        <h5 class="card-title">Beranda</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Cicilan -->
        <div class="col-md-3 mb-4">
            <a href="{{ route('house_installments.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center shadow-sm {{ request()->is('house_installments*') ? 'border-primary' : '' }}">
                    <div class="card-body">
                        <div class="display-4 mb-2">💰</div>
                        <h5 class="card-title">Cicilan</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Manajemen User -->
        <div class="col-md-3 mb-4">
            <a href="{{ route('users.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center shadow-sm {{ request()->is('users*') ? 'border-primary' : '' }}">
                    <div class="card-body">
                        <div class="display-4 mb-2">👥</div>
                        <h5 class="card-title">Manajemen User</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
