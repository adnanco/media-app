<?php


namespace App\Repositories;


interface EloquentRepositoryInterface
{
    public function getAll();

    public function create($data);

    public function update($data, int $id);

    public function delete(int $id);

    public function getById(int $id);
}
