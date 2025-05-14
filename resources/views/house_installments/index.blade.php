@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Data Cicilan Rumah</h2>
        <a href="{{ route('house_installments.create') }}" class="btn btn-primary mb-3">Tambah Cicilan</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($installments as $item)
                    <tr>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->payment_date }}</td>
                        <td>Rp{{ number_format($item->amount, 2, ',', '.') }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <a href="{{ route('house_installments.edit', $item->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('house_installments.destroy', $item->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h5>Rekap Total Cicilan per Peserta:</h5>
        <ul class="list-group mb-4">
            @foreach ($totalPerUser as $userTotal)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $userTotal->user->name }}
                    <span class="badge bg-success text-white">
                        Rp{{ number_format($userTotal->total, 2, ',', '.') }}
                    </span>
                </li>
            @endforeach
        </ul>


        {{ $installments->links() }}
    </div>
@endsection
