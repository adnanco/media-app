<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';
    protected $primaryKey = 'id';


    protected $fillable = [
        'person_id',
        'name',
        'address',
        'post_code',
        'city_name',
        'country_name'
    ];

    public $timestamps = false;

    public function persons(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}
