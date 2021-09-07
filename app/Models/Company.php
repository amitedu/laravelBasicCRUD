<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    public function getLogoAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
