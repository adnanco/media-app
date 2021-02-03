<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;

    protected $table = 'person';

    protected $fillable = [
        'birthdate',
        'name',
        'gender'
    ];

    public function address(): HasMany
    {
        return $this->hasMany(Address::class, 'person_id');
    }

    public function getGenderValueAttribute(): string
    {
        return [
            'E' => 'Erkek',
            'K' => 'Kadın',
            'B' => '-',
        ][$this->gender];
    }


}
