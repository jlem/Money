<?php

use Money\Transaction\TransactionRepository;
use Money\Transaction\TransactionFactory;

class IncomeController extends BaseController
{
    public $layout = 'layouts.main';
    public $TransactionController;
    public $TransactionFactory;

    public function __construct(TransactionRepository $TransactionRepository, TransactionFactory $TransactionFactory)
    {
        $this->TransactionRepository = $TransactionRepository;
        $this->TransactionFactory = $TransactionFactory;
    }

    public function index()
    {
        $Transactions = $this->TransactionRepository->findIncome();

        $this->layout->title = 'Transactions';
        $this->layout->content = View::make('transaction.index');
    }

    public function create()
    {
        // code...
    }

    public function store()
    {
        $Transaction = $this->TransactionFactory->makeIncome(Input::get('amount'), Input::get('repeat'), Input::get('note'));
    }

    public function show()
    {
        // code...
    }

    public function edit()
    {
        // code...
    }

    public function update()
    {
        // code...
    }

    public function destroy()
    {
        // code...
    }
}
