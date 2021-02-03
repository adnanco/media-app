<?php


namespace App\Repositories;

use App\Models\Address;

class AddressRepository implements EloquentRepositoryInterface
{
    protected $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function getAll()
    {
        return $this->address->getAll();
    }

    public function create($data)
    {
        $address = new $this->address;
        $address->person_id = $data['person'];
        $address->name = $data['name'];
        $address->address = $data['address'];
        $address->post_code = $data['postcode'];
        $address->city_name = $data['cityname'];
        $address->country_name = $data['countryname'];
        $address->address = $data['address'];
        $address->save();

        return $address->fresh();
    }

    public function update($data, $id)
    {

        $address = $this->address->find($id);
        $address->person_id = $data['person'];
        $address->name = $data['name'];
        $address->address = $data['address'];
        $address->post_code = $data['postcode'];
        $address->city_name = $data['cityname'];
        $address->country_name = $data['countryname'];
        $address->address = $data['address'];
        $address->update();

        return $address;
    }

    public function delete($id)
    {
        $person = $this->address->find($id);
        $person->delete();
    }

    public function getById($id)
    {

        return $this->address->where('id', $id)->first();
    }
}
