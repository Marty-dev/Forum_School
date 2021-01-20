<?php

abstract class Model extends DB
{
    protected string $table;

    /**
     * @return Model[]
     */
    abstract protected function getAll(): array;

    /**
     * @param int $id
     *
     * @return Model
     */
    abstract protected function getByID(int $id): Model;
}