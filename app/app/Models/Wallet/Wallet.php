<?php

namespace App\Models\Wallet;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{

    protected $table = 'wallets';

    protected $fillable = [
        //| id          | bigint unsigned                  | NO   | PRI | NULL     | auto_increment |
        'user_id',    //| bigint unsigned                  | NO   | MUL | NULL     |                |
        'type',       //| enum('INCREASE','DECREASE')      | NO   | MUL | INCREASE |                |
        'amount',     //| decimal(10,2)                    | NO   |     | NULL     |                |
        'reason',     //| enum('GET_GIFT_CODE','WITHDRAW') | NO   |     | NULL     |                |
        //| created_at  | timestamp                        | YES  |     | NULL     |                |
        //| updated_at  | timestamp                        | YES  |     | NULL     |                |
    ];

}
