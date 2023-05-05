<?php

namespace App\Enums\Wallet;

/**
 * We use this class to better display
 * and check the account input and output
 * of the main reasons for each withdrawal or deposit of money in the wallet.
 */
enum TransactionReasonEnum : string
{

    case  FROM_CAMPAIGN = 'FROM_CAMPAIGN';


    case WITHDRAW = 'WITHDRAW';

}
