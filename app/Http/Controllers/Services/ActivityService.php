<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Activity;

class ActivityService extends Controller
{
    public $model = Activity::class;

    public function __construct()
    {
        $this->model = new Activity();
    }

    public function model($id)
    {
        return Activity::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return Activity::data()
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return Activity::changeStatus($id);
    }

    public function delete($id)
    {
        return Activity::deleteModel($id);
    }

    public function store($data)
    {
        return Activity::store($data);
    }

    public function update($data, $id)
    {
        return Activity::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return Activity::getRules($id);
    }

    public function messages()
    {
        return Activity::getMessages();
    }
}
