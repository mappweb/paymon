<?php

namespace App\Repositories\Contracts;

interface ModelRepository
{
    /**
     * @param $perPage
     * @param $columns
     * @param $pageName
     * @param $page
     * @return mixed
     */
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): mixed;

    /**
     * @param $attributes
     * @param $id
     * @return mixed
     */
    public function createOrUpdate($attributes, $id = null): mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed;
}
