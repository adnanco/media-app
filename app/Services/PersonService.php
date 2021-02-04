<?php


namespace App\Services;

use App\Repositories\PersonRepository;
use Illuminate\Support\Facades\Cache;

class PersonService
{
    protected $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function getAll()
    {
        $seconds = 60 * 5;
        return Cache::remember('person:list', $seconds, function () {
            return $this->personRepository->getAll();
        });
    }

    public function getById($id)
    {
        $seconds = 60 * 5;
        return Cache::remember('person:' . $id, $seconds, function () use ($id) {
            return $this->personRepository->getById($id);
        });
    }

    public function createPerson($data)
    {
        Cache::forget('person:list');

        return $this->personRepository->create($data);
    }

    public function updatePerson($data, $id)
    {
        $seconds = 60 * 5;
        return Cache::remember('person:' . $id, $seconds, function () use ($data, $id) {
            return $this->personRepository->update($data, $id);
        });

    }

    public function deletePerson($id)
    {
        Cache::forget('person:' . $id);
        Cache::forget('person:list');
        return $this->personRepository->delete($id);
    }
}
