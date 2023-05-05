<?php

namespace App\Models\Gift;

use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{

    protected $table  = 'gift_cards';

    protected $fillable = [
        //| id               | bigint unsigned | NO   | PRI | NULL    | auto_increment |
         'code',           //| varchar(10)     | NO   | MUL | NULL    |                |
         'start_time',     //| timestamp       | YES  |     | NULL    |                |
         'end_time',       //| timestamp       | YES  |     | NULL    |                |
         'usable_number'   //| int             | NO   |     | 100     |                |
        //| created_at       | timestamp       | YES  |     | NULL    |                |
        //| updated_at       | timestamp       | YES  |     | NULL    |                |
    ];

}
