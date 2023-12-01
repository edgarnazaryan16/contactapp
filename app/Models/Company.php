<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model {
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'webiste',
        'address',
        'email',
    ];
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
