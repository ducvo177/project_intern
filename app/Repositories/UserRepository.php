<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Schema;

class UserRepository extends BaseRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll(array $input = [])
    {
        $query = $this->model->query()->where('is_delete',0);
        $keyword = $input['key'] ?? '';

        if ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('id', 'LIKE', "%{$keyword}%")
                    ->orWhere('phone', 'LIKE', "%{$keyword}%");
            });
        }

        if (!empty($input['role'])) {
            $query->where('type', $input['role']);
        }

        $columnName = $input['column_name'] ?? 'id';
        $sortType = $input['sort_type'] ?? 'asc';
        $checkColumn = Schema::hasColumn('users', $columnName);
        $checkSortType = in_array(strtolower(trim($sortType)), static::SORT_TYPES);

        if ($checkColumn && $checkSortType) {
            $query->orderBy($columnName, $sortType);
        }

        return $query->paginate(static::PER_PAGE);
    }

}
