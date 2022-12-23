<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Schema;

class UserRepository
{
    protected $model;
    public const SORT_TYPES = ['desc', 'asc'];

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll(array $input = [])
    {
        $query = $this->model->query();
        $keyword = $input['key'] ?? "";
        $columnName = $input['column_name'] ?? "id";
        $sortType = $input['sort_type'] ?? "asc";

        if ($keyword) {
            return $query
                ->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('id', 'LIKE', "%{$keyword}%")
                ->orWhere('phone', 'LIKE', "%{$keyword}%")
                ->orderBy($columnName, $sortType)
                ->paginate(5);
        }

        $checkColumn = Schema::hasColumn('users', $columnName);
        $checkSortType = in_array(strtolower(trim($sortType)), static::SORT_TYPES);
        
        if ($checkColumn && $checkSortType) {
            return $query->orderBy($columnName, $sortType)->paginate(5);
        }

        return $query->paginate(5);
    }
}
