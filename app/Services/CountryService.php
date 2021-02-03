<?php


namespace App\Services;


use App\Repositories\CountryRepository;
use Illuminate\Support\Facades\Cache;

class CountryService
{
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function getAll()
    {
        return Cache::remember('country:list', '36000', function () {
            return $this->countryRepository->getAll();
        });
    }

    public function getById($id)
    {
        return Cache::remember('country:' . $id, '36000', function () use ($id) {
            return $this->countryRepository->getById($id);
        });
    }

    public function getCities($id)
    {
        return Cache::remember('country:' . $id . ':cities', '36000', function () use ($id) {
            return $this->countryRepository->getCities($id);
        });
    }
}
