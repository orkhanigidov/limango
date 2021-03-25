<?php

namespace App\Machine;

class PurchaseTransaction implements PurchaseTransactionInterface {

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
}