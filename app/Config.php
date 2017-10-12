<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $casts= ['notify' => 'boolean'];
    protected $fillable = ['notify', 'theme'];
    protected $primaryKey = 'user_id';
    public $timestamps = false; //User já tem timestamps

    public function user(){ //Config vai se comunicar com o User

        //Config pertence a um User
        return $this->belongsTo(User::class);
        //Chave estrangeira tbm é opcional ('user_id'); convenção do Eloquent
    }
}
