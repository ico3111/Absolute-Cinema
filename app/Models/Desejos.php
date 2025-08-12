<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Desejos extends Model
{
    protected $fillable = ['id_filme', 'id_user'];

    public function filme() : BelongsTo {
        return $this->belongsTo(Filme::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
