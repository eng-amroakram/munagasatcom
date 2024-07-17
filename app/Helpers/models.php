<?php

use App\Http\Controllers\Services\Services;
use App\Models\Activity;
use App\Models\City;
use App\Models\GovernmentBroker;
use App\Models\OpportunityNote;
use App\Models\Sector;
use App\Models\Service;
use App\Models\Tag;
use App\Models\TenderType;
use App\Models\Unit;
use App\Models\User;

if (!function_exists('status_select')) {
    function status_select()
    {
        return [
            "active" => "نشط",
            "inactive" => "غير نشط",
        ];
    }
}

if (!function_exists('activities')) {
    function activities($search = null)
    {
        if ($search) {
            return Activity::data()->active()->pluck("name", 'id')->mapWithKeys(function ($name, $id) {
                return [$id => $name];
            })->toArray();
        }

        return Activity::data()->get();
    }
}

if (!function_exists('government_brokers')) {
    function government_brokers($search = null)
    {
        if ($search) {
            return GovernmentBroker::data()->active()->pluck("name", 'id')->mapWithKeys(function ($name, $id) {
                return [$id => $name];
            })->toArray();
        }

        return GovernmentBroker::data()->get();
    }
}

if (!function_exists('cities')) {
    function cities($search = null)
    {
        if ($search) {
            return City::data()->active()->pluck("name", 'id')->mapWithKeys(function ($name, $id) {
                return [$id => $name];
            })->toArray();
        }

        return City::data()->get();
    }
}

if (!function_exists('count_employees')) {
    function count_employees()
    {
        $employees = User::where('account_type', 'employee')->where('user_owner_id', auth()->id())->get();
        return $employees->count();
    }
}

if (!function_exists('count_person')) {
    function count_person()
    {
        $employees = User::where('account_type', 'person')->get();
        return $employees->count();
    }
}

if (!function_exists('count_company')) {
    function count_company()
    {
        $employees = User::where('account_type', 'company')->get();
        return $employees->count();
    }
}

if (!function_exists('opportunity_notes')) {
    function opportunity_notes($search = null)
    {
        if ($search) {
            return OpportunityNote::data()->active()->pluck("name", 'id')->mapWithKeys(function ($name, $id) {
                return [$id => $name];
            })->toArray();
        }

        return OpportunityNote::data()->get();
    }
}

if (!function_exists('units')) {
    function units($search = null)
    {
        if ($search) {
            return Unit::data()->active()->pluck("name", 'id')->mapWithKeys(function ($name, $id) {
                return [$id => $name];
            })->toArray();
        }

        return Unit::data()->get();
    }
}


if (!function_exists('tags')) {
    function tags($search = null)
    {
        if ($search) {
            return Tag::data()->active()->pluck("name", 'id')->mapWithKeys(function ($name, $id) {
                return [$id => $name];
            })->toArray();
        }

        return Tag::data()->get();
    }
}

if (!function_exists('tender_types')) {
    function tender_types($search = null)
    {
        if ($search) {
            return TenderType::data()->active()->pluck("name", 'id')->mapWithKeys(function ($name, $id) {
                return [$id => $name];
            })->toArray();
        }

        return TenderType::data()->get();
    }
}

if (!function_exists('sectors')) {
    function sectors($search = null)
    {
        if ($search) {
            return Sector::data()->active()->pluck("name", 'id')->mapWithKeys(function ($name, $id) {
                return [$id => $name];
            })->toArray();
        }

        return Sector::data()->get();
    }
}

if (!function_exists('services')) {
    function services($search = null)
    {
        if ($search) {
            return Service::data()->active()->pluck("name", 'id')->mapWithKeys(function ($name, $id) {
                return [$id => $name];
            })->toArray();
        }

        return Service::data()->get();
    }
}

if (!function_exists('sector_services')) {
    function sector_services($sector_id = 1)
    {
        return Service::data()->active()->where('sector_id', $sector_id)->pluck("name", 'id')->mapWithKeys(function ($name, $id) {
            return [$id => $name];
        })->toArray();
    }
}

if (!function_exists('units_select')) {
    function units_select($sector_id = 1)
    {
        return [
            'kg' =>  'كجم',
            'cm' =>  'سنتمتر',
            'm' =>  'ملم',
            'carton' =>  'كرتون',
            'd' =>  'دسم',
            'meter' =>  'متر مربع',
            'piece' =>  'حبة',
            'roll' =>  'لفة',
        ];
    }
}

if (!function_exists('models_count')) {
    function models_count($model)
    {
        $model =  Services::modelInstance($model);
        return $model::count();
    }
}
