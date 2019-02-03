<?php
/**
 At a lemonade stand, each lemonade costs $5. 

Customers are standing in a queue to buy from you, and order one at a time (in the order specified by bills).

Each customer will only buy one lemonade and pay with either a $5, $10, or $20 bill.  You must provide the correct change to each customer, so that the net transaction is that the customer pays $5.

Note that you don't have any change in hand at first.

Return true if and only if you can provide every customer with correct change.

 

Example 1:

Input: [5,5,5,10,20]
Output: true
Explanation: 
From the first 3 customers, we collect three $5 bills in order.
From the fourth customer, we collect a $10 bill and give back a $5.
From the fifth customer, we give a $10 bill and a $5 bill.
Since all customers got correct change, we output true.
Example 2:

Input: [5,5,10]
Output: true
Example 3:

Input: [10,10]
Output: false
Example 4:

Input: [5,5,10,10,20]
Output: false
Explanation: 
From the first two customers in order, we collect two $5 bills.
For the next two customers in order, we collect a $10 bill and give back a $5 bill.
For the last customer, we can't give change of $15 back because we only have two $10 bills.
Since not every customer received correct change, the answer is false.
 

Note:

0 <= bills.length <= 10000
bills[i] will be either 5, 10, or 20.
 */
class LemonadeChange
{
    const UNIT_PRICE = 5;
    const BILL_5 = 5;
    const BILL_10 = 10;

    private $bills = [];

    private $sales = 0;
    private $chasher = [];

    /**
     * 
     */
    public function __construct()
    {
        $this->bills = [self::BILL_5, self::BILL_10];

        foreach($this->bills as $bill){
            $this->chasher[$bill] = 0;
        }
    }

    /**
     * 
     * @param int[] $payments
     * @return bool
     */
    public function sale(array $payments)
    {
        foreach($payments as $payment){
            if(in_array($payment, $this->bills)){
                $this->chasher[$payment]++;
            }
            
            if(!$this->execChange($payment - self::UNIT_PRICE)){
                return false;
            }
        }
        return true;
    }

    /**
     * @param int $change
     * @return bool
     */
    private function execChange($change)
    {
        if($change == 0){
            return true;
        }

        if($change >= self::BILL_10){
            if($this->chasher[self::BILL_10] >= 1){
                $this->chasher[self::BILL_10]--;
                if($this->chasher[self::BILL_5] >= ($change - self::BILL_10)/self::BILL_5){
                    $this->chasher[self::BILL_5] -= ($change - self::BILL_10)/self::BILL_5;
                    return true;
                }
            }else if($this->chasher[self::BILL_5] >= ($change/self::BILL_5)){
                $this->chasher[self::BILL_5] -= ($change/self::BILL_5);
                return true;
            }
        }else if($this->chasher[self::BILL_5] >= ($change/self::BILL_5)){
            $this->chasher[self::BILL_5] -= ($change/self::BILL_5);
            return true;
        }

        return false;
    }
}

// exec

$payments = [5,5,5,10,20];
// expect: true
$result = (new LemonadeChange())->sale($payments);
var_dump($result);


$payments = [10,10];
// expect: false
$result = (new LemonadeChange())->sale($payments);
var_dump($result);


$payments = [5,5,10,10,20];
// expect: false
$result = (new LemonadeChange())->sale($payments);
var_dump($result);


$payments = [5,5,10,20];
// expect: true
$result = (new LemonadeChange())->sale($payments);
var_dump($result);