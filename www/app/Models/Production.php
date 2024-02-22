<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Production extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function genres():BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'genres_to_productions');
    }
}
