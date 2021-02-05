<?php


namespace App\Services;


use App\Repositories\AddressRepository;
use Illuminate\Support\Facades\Cache;

class AddressService
{
    protected $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function getAll()
    {
        $seconds = 60 * 5;
        return Cache::remember('address:list', $seconds, function () {
            return $this->addressRepository->getAll();
        });
    }

    public function getById($id)
    {
        $seconds = 60 * 5;
        return Cache::remember('address:' . $id, $seconds, function () use ($id) {
            return $this->addressRepository->getById($id);
        });
    }

    public function getPerson($id)
    {
        $seconds = 60 * 5;
        return Cache::remember('address:person:' . $id, $seconds, function () use ($id) {
            return $this->addressRepository->getPerson($id);
        });
    }

    public function createAddress($data)
    {
        Cache::forget('address:list');

        return $this->addressRepository->create($data);
    }

    public function updateAddress($data, $id)
    {
        Cache::forget('address:' . $id);

        $seconds = 60 * 5;
        return Cache::remember('address:' . $id, $seconds, function () use ($data, $id) {
            return $this->addressRepository->update($data, $id);
        });

    }

    public function deleteAddress($id)
    {
        Cache::forget('address:' . $id);
        Cache::forget('address:list');
        return $this->addressRepository->delete($id);
    }

}
