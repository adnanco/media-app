<?php


namespace App\Repositories;


use App\Models\Country;

class CountryRepository
{
    protected $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    public function getAll()
    {
        return $this->country->get();
    }

    public function getById($id)
    {
        return $this->country->where('id', $id)->first();
    }

    public function getCities($id)
    {
        return $this->country->where('id', $id)->first()->cities;
    }
}
