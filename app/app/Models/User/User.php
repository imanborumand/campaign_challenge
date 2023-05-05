<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
            //| id           | bigint unsigned | NO   | PRI | NULL    | auto_increment |
             'mobile',     //| varchar(11)     | NO   | UNI | NULL    |                |
            //| created_at   | timestamp       | YES  |     | NULL    |                |
            //| updated_at   | timestamp       | YES  |     | NULL    |                |
    ];



}
