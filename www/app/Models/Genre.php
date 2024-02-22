<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function productions():BelongsToMany
    {
        return $this->belongsToMany(Production::class, 'genres_to_productions');
    }
}
