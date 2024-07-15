<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\OpportunityNote;
use Illuminate\Http\Request;

class OpportunityNoteService extends Controller
{
    public $model = OpportunityNote::class;

    public function __construct()
    {
        $this->model = new OpportunityNote();
    }

    public function model($id)
    {
        return OpportunityNote::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return OpportunityNote::data()
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return OpportunityNote::changeStatus($id);
    }

    public function delete($id)
    {
        return OpportunityNote::deleteModel($id);
    }

    public function store($data)
    {
        return OpportunityNote::store($data);
    }

    public function update($data, $id)
    {
        return OpportunityNote::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return OpportunityNote::getRules($id);
    }

    public function messages()
    {
        return OpportunityNote::getMessages();
    }
}
