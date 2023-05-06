<?php

namespace App\Models\Campaign;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{

    protected $table  = 'campaigns';


    /**
     * maximum gift code size
     * note, this use in migration if change this number, must change database migrate for avoid errors
     *
     * @var int
     */
    public static int $MAX_CODE_LENGTH = 5;



    protected  $fillable  = [
        //| id               | bigint unsigned | NO   | PRI | NULL    | auto_increment |
         'code',           //| varchar(10)     | NO   | MUL | NULL    |                |
         'start_time',     //| timestamp       | YES  |     | NULL    |                |
         'end_time',       //| timestamp       | YES  |     | NULL    |                |
         'usable_number',  //| int             | NO   |     | 100     |                |
         'used_number'     //| int             | NO   |     | 100     |                |
        //| created_at       | timestamp       | YES  |     | NULL    |                |
        //| updated_at       | timestamp       | YES  |     | NULL    |                |
    ];



    public function users() : BelongsToMany
    {
       return $this->belongsToMany(User::class)
                   ->orderBy('campaign_user.id', 'asc'); //show user by rate and participation in campaign
    }
}
