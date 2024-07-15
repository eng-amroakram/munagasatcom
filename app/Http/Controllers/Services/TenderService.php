<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;

class TenderService extends Controller
{
    public $model = Tender::class;

    public function __construct()
    {
        $this->model = new Tender();
    }

    public function model($id)
    {
        return Tender::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return Tender::data()->with(['tender_type'])
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return Tender::changeStatus($id);
    }

    public function delete($id)
    {
        return Tender::deleteModel($id);
    }

    public function store($data)
    {
        return Tender::store($data);
    }

    public function update($data, $id)
    {
        return Tender::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return Tender::getRules($id);
    }

    public function messages()
    {
        return Tender::getMessages();
    }
}
