<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class informacoesPessoais extends Model
{
    protected $table = 'informacoesPessoais';

    protected $fillable = [
        'endereço',
        'telefone',
        'idade',
        'data_nascimento',
        'aluno_id'
        
    ];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}