<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityService extends Controller
{
    public $model = Opportunity::class;

    public function __construct()
    {
        $this->model = new Opportunity();
    }

    public function model($id)
    {
        return Opportunity::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return Opportunity::data()
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return Opportunity::changeStatus($id);
    }

    public function delete($id)
    {
        return Opportunity::deleteModel($id);
    }

    public function store($data)
    {
        return Opportunity::store($data);
    }

    public function update($data, $id)
    {
        return Opportunity::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return Opportunity::getRules($id);
    }

    public function messages()
    {
        return Opportunity::getMessages();
    }
}
