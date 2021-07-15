<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function telefones()
    {
        return $this->hasMany('App\Telefone');
    }

    public function addTelefone(Telefone $tel)
    {
        return $this->telefones()->save($tel);
    }

}
