<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface BaseRepositoryInterface
{
    public function all();

    public function findById(int $modelId, array $column = ['*'], array $relation = []);

    public function create(array $payload=[]);

    public function update(int $id = 0, array $payload = []);

    public function delete($id =0);

    public function forceDelete($id = 0);

    public function pagination
    (
        array $column =['*'],
        array $condition = [],
        array $join = [],
        array $extend = [],
        int $perpage = 20,
        array $relations = []
    );

    public function updateByWhereIn($whereInField = '', array $whereIn =[], array $payload = []);
}
