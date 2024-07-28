<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    // Menampilkan semua transaksi
    // public function index()
    // {
    //     $transactions = Transaction::with('details')->get();
    //     return view('transactions.index', compact('transactions'));
    // }

    public function index(Request $request)
    {
        $query = Transaction::query();

        // Apply filters
        if ($request->filled('search')) {
            $query->where('description', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('from_date')) {
            $query->whereDate('date_paid', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
            $query->whereDate('date_paid', '<=', $request->to_date);
        }

        $transactions = $query->paginate(10);

        return view('transactions.index', compact('transactions'));
    }


    // Menampilkan form untuk membuat transaksi baru
    public function create()
    {
        return view('transactions.create');
    }

    // Menyimpan transaksi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'code' => 'required|unique:transactions,code',
            'rate_euro' => 'required|numeric',
            'date_paid' => 'required|date',
            'details.*.name' => 'required',
            'details.*.amount' => 'required|numeric'
        ]);

        $transaction = Transaction::create($request->only(['description', 'code', 'rate_euro', 'date_paid']));

        foreach ($request->details as $detail) {
            $transaction->details()->create($detail);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    // Menampilkan form untuk mengedit transaksi
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    // Memperbarui transaksi di database
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'description' => 'required',
            'code' => 'required|unique:transactions,code,' . $transaction->id,
            'rate_euro' => 'required|numeric',
            'date_paid' => 'required|date',
            'details.*.name' => 'required',
            'details.*.amount' => 'required|numeric',
            'details.*.category' => 'required|in:income,expense' // Menambahkan validasi untuk category
        ]);

        // $transaction->update($request->only(['description', 'code', 'rate_euro', 'date_paid']));

        // $transaction->details()->delete(); // Remove old details
        // foreach ($request->details as $detail) {
        //     $transaction->details()->create($detail);
        // }

        $transaction = Transaction::create($request->only(['description', 'code', 'rate_euro', 'date_paid']));

        foreach ($request->details as $detail) {
            $transaction->details()->create([
                'name' => $detail['name'],
                'amount' => $detail['amount'],
                'category' => $detail['category'] // Memastikan category di-pass
            ]);
        }


        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    // Menghapus transaksi dari database
    public function destroy(Transaction $transaction)
    {
        $transaction->details()->delete(); // Delete related details
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}