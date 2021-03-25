<?php

namespace App\Machine;

class PurchasedItem implements PurchaseTransactionInterface {

    private $itemQuantity;
    private $paidAmount;

    public function getItemQuantity()
    {
        return $this->itemQuantity;
    }

    public function getPaidAmount()
    {
        return $this->paidAmount;
    }

    public function setItemQuantity($itemQuantity) {
        $this->itemQuantity = $itemQuantity;
    }

    public function setPaidAmount($paidAmount) {
        $this->paidAmount = $paidAmount;
    }

    public function getChange(): array
    {
        $coins = CigaretteMachine::COINS;
        $remained_amount = $this->getPaidAmount() - ($this->getItemQuantity() * CigaretteMachine::ITEM_PRICE);
        $returned_coins = [];

        for ($i = count($coins) - 1; $i >= 0; $i--) {
            $coin = "";
            $count = 0;
            while (bccomp($remained_amount, $coins[$i], 2) == 0
                || bccomp($remained_amount, $coins[$i], 2) == 1) {
                $remained_amount = bcsub($remained_amount, $coins[$i], 2);
                $count++;
                $coin = $coins[$i];
            }
            if ($count > 0) {
                $returned_coins[] = [strval($coin), $count];
            }
        }

        return $returned_coins;
    }
}