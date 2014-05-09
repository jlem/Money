<?php namespace Money\Transaction;

class TransactionRepository
{
    public function findAll()
    {
        return Transaction::all();
    }

    public function findIncome()
    {
        return Transaction::where('income', '=', 1)->get();
    }

    public function findExpenses()
    {
        return Transaction::whereNull('income')->get();
    }
}
