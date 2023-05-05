<?php

namespace App\app\Exceptions\Enums\Wallet;

/**
 * We use this class to better display
 * and check the account input and output
 * of the main reasons for each withdrawal or deposit of money in the wallet.
 */
enum TransactionReasonEnum : string
{

    case  GET_GIFT_CODE = 'GET_GIFT_CODE';


    case WITHDRAW = 'WITHDRAW';

}
