<?php


namespace App\Entity;


interface EntityInterface
{
    public function create();

    public function read(int $id);

    public function update(int $id);

    public function delete(int $id);
}
