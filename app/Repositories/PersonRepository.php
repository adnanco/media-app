<?php


namespace App\Repositories;


use App\Models\Person;

class PersonRepository implements EloquentRepositoryInterface
{
    protected $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    public function getAll()
    {
        return $this->person->get();
    }

    public function getById($id)
    {
        return $this->person->where('id', $id)->first();
    }

    public function create($data)
    {
        $person = new $this->person;
        $person->name = $data['name'];
        $person->birthdate = $data['birthdate'];
        $person->gender = $data['gender'];
        $person->save();

        return $person->fresh();
    }

    public function update($data, $id)
    {
        $person = $this->person->find($id);
        $person->name = $data['name'];
        $person->birthdate = $data['birthdate'];
        $person->gender = $data['gender'];
        $person->update();

        return $person;
    }

    public function delete($id)
    {
        $person = $this->person->find($id);
        $person->delete();

        return $person;
    }


}
