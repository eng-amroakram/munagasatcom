<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceService extends Controller
{
    public $model = Service::class;

    public function __construct()
    {
        $this->model = new Service();
    }

    public function model($id)
    {
        return Service::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return Service::with('sector')->data()
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return Service::changeStatus($id);
    }

    public function delete($id)
    {
        return Service::deleteModel($id);
    }

    public function store($data)
    {
        return Service::store($data);
    }

    public function update($data, $id)
    {
        return Service::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return Service::getRules($id);
    }

    public function messages()
    {
        return Service::getMessages();
    }
}
