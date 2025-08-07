<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Filme extends Model
{
    protected $fillable = ['id_categoria', 'nome', 'sinopse', 'ano', 'imagem', 'trailer'];

    public function category() : BelongsTo {
        return $this->belongsTo(Categoria::class);
    }
}
