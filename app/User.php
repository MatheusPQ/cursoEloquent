<?php

namespace App;

use App\Config;
use App\Post;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function config(){ //Vai se comunicar com Config
        //User possui uma Config
        return $this->hasOne(Config::class);
        //(Config::class, 'user_id'); Chave estrangeira
        //Como ja tem uma tabela chamada usarios, o Eloquent considera que a chave estrangeira seja 'user_id'
        //Portanto o parametro de chave estrangeira é opcional
    }

    public function posts(){
        //User tem muitos Posts
        return $this->hasMany(Post::class);
    }
}
