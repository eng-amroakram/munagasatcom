<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\TenderType;

class TenderTypeService extends Controller
{
    public $model = TenderType::class;

    public function __construct()
    {
        $this->model = new TenderType();
    }

    public function model($id)
    {
        return TenderType::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return TenderType::data()
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return TenderType::changeStatus($id);
    }

    public function delete($id)
    {
        return TenderType::deleteModel($id);
    }

    public function store($data)
    {
        return TenderType::store($data);
    }

    public function update($data, $id)
    {
        return TenderType::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return TenderType::getRules($id);
    }

    public function messages()
    {
        return TenderType::getMessages();
    }
}
