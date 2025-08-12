<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filme extends Model
{
    protected $fillable = ['id_categoria', 'nome', 'sinopse', 'ano', 'imagem', 'trailer'];

    public function categoria(): BelongsTo {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function desejos() : HasMany {
        return $this->hasMany(Desejos::class);
    }
}
