<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\PricingRequest;
use Illuminate\Http\Request;

class PricingRequestService extends Controller
{
    public $model = PricingRequest::class;

    public function __construct()
    {
        $this->model = new PricingRequest();
    }

    public function model($id)
    {
        return PricingRequest::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return PricingRequest::data()
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return PricingRequest::changeStatus($id);
    }

    public function delete($id)
    {
        return PricingRequest::deleteModel($id);
    }

    public function store($data)
    {
        return PricingRequest::store($data);
    }

    public function update($data, $id)
    {
        return PricingRequest::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return PricingRequest::getRules($id);
    }

    public function messages()
    {
        return PricingRequest::getMessages();
    }
}
