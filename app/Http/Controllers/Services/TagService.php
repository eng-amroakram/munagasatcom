<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagService extends Controller
{
    public $model = Tag::class;

    public function __construct()
    {
        $this->model = new Tag();
    }

    public function model($id)
    {
        return Tag::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return Tag::data()
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return Tag::changeStatus($id);
    }

    public function delete($id)
    {
        return Tag::deleteModel($id);
    }

    public function store($data)
    {
        return Tag::store($data);
    }

    public function update($data, $id)
    {
        return Tag::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return Tag::getRules($id);
    }

    public function messages()
    {
        return Tag::getMessages();
    }
}
