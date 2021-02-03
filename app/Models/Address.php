<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function country(): HasOne
    {
        return $this->hasOne(Country::class, 'id', 'country_name');
    }

    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'city_name');
    }

}
