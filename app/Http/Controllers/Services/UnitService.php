<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitService extends Controller
{
    public $model = Unit::class;

    public function __construct()
    {
        $this->model = new Unit();
    }

    public function model($id)
    {
        return Unit::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return Unit::data()
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return Unit::changeStatus($id);
    }

    public function delete($id)
    {
        return Unit::deleteModel($id);
    }

    public function store($data)
    {
        return Unit::store($data);
    }

    public function update($data, $id)
    {
        return Unit::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return Unit::getRules($id);
    }

    public function messages()
    {
        return Unit::getMessages();
    }
}
