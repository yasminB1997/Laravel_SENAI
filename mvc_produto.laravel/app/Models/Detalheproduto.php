<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalheProduto extends Model{

    protected $table = 'detalhesProduto';

    protected $fillable = [
        'peso',
        'descricao',
        'tamanho'
        
    ];

 public function produtos(){
        return $this->hasMany(Produto::class);
    }
}