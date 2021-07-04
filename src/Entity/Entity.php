<?php

namespace App\Entity;

class Entity implements EntityInterface
{

    private EntityInterface $entity;

    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
    }

    public function create()
    {
        $this->entity->create();
    }

    public function read(int $id)
    {
        $this->entity->read($id);
    }

    public function update(int $id)
    {
        $this->entity->update($id);
    }

    public function delete(int $id)
    {
        $this->entity->delete($id);
    }
}
