<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\HouseInstallment;
use Illuminate\Support\Facades\DB;

class HouseInstallmentController extends Controller
{
    public function welcome()
    {
        // Ambil data cicilan untuk ditampilkan pada halaman welcome (user yang login)
        $installments = HouseInstallment::where('user_id', auth()->id())
            ->with('user')
            ->latest()
            ->paginate(10);

        // Hitung total cicilan untuk user yang login
        $totalAmount = HouseInstallment::where('user_id', auth()->id())
            ->sum('amount');

        // Kirim data ke view
        return view('welcome', compact('installments', 'totalAmount'));
    }


    // Menampilkan daftar cicilan untuk user yang sedang login
    public function index()
    {
        // Ambil data cicilan untuk ditampilkan di tabel utama
        $installments = HouseInstallment::with('user')->latest()->paginate(10);

        // Hitung total cicilan per user (rekap)
        $totalPerUser = HouseInstallment::with('user')
            ->selectRaw('user_id, SUM(amount) as total')
            ->groupBy('user_id')
            ->with('user')
            ->get();

        // Kirim ke view
        return view('house_installments.index', compact('installments', 'totalPerUser'));
    }

    public function create()
    {
        $users = User::all(); // Admin bisa memilih user, jika dibutuhkan
        return view('house_installments.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        HouseInstallment::create($request->all());

        return redirect()->route('house_installments.index')->with('success', 'Data cicilan berhasil ditambahkan.');
    }

    public function edit(HouseInstallment $houseInstallment)
    {
        $users = User::all();
        return view('house_installments.edit', compact('houseInstallment', 'users'));
    }

    public function update(Request $request, HouseInstallment $houseInstallment)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $houseInstallment->update($request->all());

        return redirect()->route('house_installments.index')->with('success', 'Data cicilan berhasil diupdate.');
    }

    public function destroy(HouseInstallment $houseInstallment)
    {
        $houseInstallment->delete();
        return redirect()->route('house_installments.index')->with('success', 'Data cicilan berhasil dihapus.');
    }
}
