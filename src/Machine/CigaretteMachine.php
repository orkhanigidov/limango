<?php

namespace App\Machine;

/**
 * Class CigaretteMachine
 * @package App\Machine
 */
class CigaretteMachine implements MachineInterface
{
    const COINS = [0.01, 0.02, 0.05, 0.1, 0.2, 0.5, 1, 2];
    const ITEM_PRICE = 4.99;

    public function execute(PurchaseTransactionInterface $purchaseTransaction)
    {
        $purchaseItem = new PurchasedItem();
        $purchaseItem->setItemQuantity($purchaseTransaction->getItemQuantity());
        $purchaseItem->setPaidAmount($purchaseTransaction->getPaidAmount());
        return $purchaseItem;
    }
}