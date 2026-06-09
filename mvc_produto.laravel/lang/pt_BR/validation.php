<?php

return[

    'custom' =>[
        'nome'=>[
            'required'=> 'O nome é obrigatório',
            'max'=> 'O nome deve ter no maximo: max caracteres.'
        ],
    'num_setor'=>[
        'required'=> 'O número do setor é obrigatório.',
        'numeric'=> 'O numero do setor deve ser numerico',
        'max'=> 'O numero do setor não pode ser maior que: max.'
    ],
],
        ];