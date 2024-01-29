<?php

namespace App\Repositories;

use App\Models\Video;
use App\Repositories\Contracts\VideoRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentVideoRepository implements VideoRepositoryInterface
{
    /**
     * @param $perPage
     * @param $columns
     * @param $pageName
     * @param $page
     * @return LengthAwarePaginator
     */
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): LengthAwarePaginator
    {
        return Video::query()->paginate(
            $perPage ?? 10,
                $columns,
                $pageName,
                $page ?? 1,
        );
    }

    /**
     * @param $attributes
     * @param $id
     * @return mixed
     */
    public function createOrUpdate($attributes, $id = null): mixed
    {
        return Video::query()
            ->updateOrCreate(
                ['id' => $id],
                $attributes
            );
    }

    /**
     * @param $id
     * @return bool|mixed|null
     */
    public function delete($id): mixed
    {
        return Video::query()->findOrFail($id)->delete();
    }
}
