<?php namespace Money\Transaction;

class TransactionFactory
{

    /**
     * Makes either an expense or an income transaction 
     *
     * @param string $type
     * @param float $amount
     * @param integer $repeat
     * @param string $note
     * @access public
     * @return void
    */

    public function make($type, $amount, $repeat, $note)
    {
        switch($type)
        {
            case 'income':
                return $this->makeIncome($amount, $repeat, $note);
                break;
            case 'expense':
            default:
                return $this->makeExpense($amount, $repeat, $note);
                break;
        }
    }


    /**
     * Makes an income transaction 
     *
     * @param float $amount
     * @param integer $repeat
     * @param string $note
     * @access public
     * @return void
    */

    public function makeIncome($amount, $repeat, $note)
    {
        $data = $this->buildData(true, $amount, $repeat, $note);
        return Transaction::create($data);
    }
    


    /**
     * Makes an expense transaction 
     *
     * @param float $amount
     * @param integer $repeat
     * @param string $note
     * @access public
     * @return void
    */

    public function makeExpense($amount, $repeat, $note)
    {
        $data = $this->buildData(false, $amount, $repeat, $note);
        return Transaction::create($data);

    }



    /**
     * Builds the data that the Transaction entity will use 
     *
     * @param mixed $income
     * @param mixed $amount
     * @param mixed $repeat
     * @param mixed $note
     * @access protected
     * @return void
    */

    protected function buildData($income, $amount, $repeat, $note)
    {
        return array
        (
            'note'   => $note,
            'amount' => $amount,
            'income' => $income,
            'repeat' => $repeat,
            'date'   => time()
        );
    }
}
