<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Center;

class CenterService extends Controller
{
    public $model = Center::class;

    public function __construct()
    {
        $this->model = new Center();
    }

    public function model($id)
    {
        return Center::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        if (auth()->user()->account_type == "superadmin") {
            return Center::with(['sector', 'user', 'city', 'sector.services'])
                ->data()
                ->filters($filters)
                ->reorder($sort_field, $sort_direction)
                ->paginate($paginate);
        }

        return Center::with(['sector', 'user', 'city', 'sector.services'])
            ->where('user_id', auth()->id())
            ->data()
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return Center::changeStatus($id);
    }

    public function delete($id)
    {
        return Center::deleteModel($id);
    }

    public function store($data)
    {
        return Center::store($data);
    }

    public function update($data, $id)
    {
        return Center::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return Center::getRules($id);
    }

    public function messages()
    {
        return Center::getMessages();
    }
}
