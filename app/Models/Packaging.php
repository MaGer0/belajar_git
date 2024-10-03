<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Unit;
use App\Models\User;

class Packaging extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'author',
        'unit_id',
        'code',
        'name',
        'material',
        'is_waterproof'
    ];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function pembuat(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }
}
