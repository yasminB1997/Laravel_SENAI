<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalhe extends Model{

    protected $table = 'detalhe';

    protected $fillable = [
        'custo',
        'imposto',
        'preco_venda',
        
    ];

    public function livros(){
        return $this->hasMany(Livro::class);
    }
}