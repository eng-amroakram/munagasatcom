<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Sector;

class SectorService extends Controller
{
    public $model = Sector::class;

    public function __construct()
    {
        $this->model = new Sector();
    }

    public function model($id)
    {
        return Sector::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return Sector::data()
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return Sector::changeStatus($id);
    }

    public function delete($id)
    {
        return Sector::deleteModel($id);
    }

    public function store($data)
    {
        return Sector::store($data);
    }

    public function update($data, $id)
    {
        return Sector::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return Sector::getRules($id);
    }

    public function messages()
    {
        return Sector::getMessages();
    }
}
