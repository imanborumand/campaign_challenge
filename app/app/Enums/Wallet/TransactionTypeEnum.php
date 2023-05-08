<?php

namespace App\Enums\Wallet;

/*
 *Transaction types can be INCREASE or DECREASE.
 * To calculate the balance and balance of the user's wallet
 */
enum TransactionTypeEnum : string
{

    case  INCREASE = 'INCREASE';


    case DECREASE = 'DECREASE';

}
