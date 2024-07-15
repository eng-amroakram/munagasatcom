<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\GovernmentBroker;

class GovernmentBrokerService extends Controller
{
    public $model = GovernmentBroker::class;

    public function __construct()
    {
        $this->model = new GovernmentBroker();
    }

    public function model($id)
    {
        return GovernmentBroker::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return GovernmentBroker::data()
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return GovernmentBroker::changeStatus($id);
    }

    public function delete($id)
    {
        return GovernmentBroker::deleteModel($id);
    }

    public function store($data)
    {
        return GovernmentBroker::store($data);
    }

    public function update($data, $id)
    {
        return GovernmentBroker::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return GovernmentBroker::getRules($id);
    }

    public function messages()
    {
        return GovernmentBroker::getMessages();
    }
}
