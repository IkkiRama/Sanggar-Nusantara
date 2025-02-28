<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    /** @use HasFactory<\Database\Factories\PlanFactory> */
    use HasFactory, SoftDeletes;
    protected $fillable = ['nama', 'harga', 'durasi', 'deskripsi', 'fitur'];
    protected $casts = [
        'fitur' => 'array',
    ];

    public function subscriptions() {
        return $this->hasMany(Subscription::class);
    }
}
