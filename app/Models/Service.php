<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    use ModelHelper;

    protected $fillable = [
        'name',
        'status',
        'sector_id',
    ];

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'name',
            'status',
            'sector_id',
        ]);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
            'status' => null,
            'sector_id' => null
        ], $filters);

        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query->where('name', 'like', '%' . $filters['search'] . '%')
                ->whereIn('status', $filters['status'])
                ->whereIn('sector_id', $filters['sector_id']);
        });

        $builder->when($filters['search'] == '' && $filters['status'] != null, function ($query) use ($filters) {
            $query->whereIn('status', $filters['status']);
        });

        $builder->when($filters['search'] == '' && $filters['sector_id'] != null, function ($query) use ($filters) {
            $query->whereIn('sector_id', $filters['sector_id']);
        });
    }

    public function scopeChangeStatus(Builder $builder, $id)
    {
        $model = $builder->find($id);
        if ($model) {
            $model->update([
                'status' =>  $model->status == "active" ? "inactive" : "active",
            ]);
            return true;
        }
        return false;
    }


    public function scopeGetRules(Builder $builder, $id = "")
    {
        return [
            'name' => ['required', 'string', 'max:255', "unique:services,name,$id"],
            'status' => ['required', 'string', 'in:active,inactive'],
        ];
    }

    public function scopeGetMessages()
    {
        return [
            "name.required" => "ادخل الاسم",
            "name.unique" => "القطاع موجودة بالفعل",
            "status.required" => "اختر حالة القطاع",
        ];
    }

    public function scopeStore(Builder $builder, array $data = [])
    {
        $model = $builder->create($data);
        if ($model) {
            return true;
        }
        return false;
    }

    public function scopeUpdateModel(Builder $builder, $data, $id)
    {
        $model = $builder->find($id);
        if ($model) {
            $model = $model->update($data);
            return true;
        }
        return false;
    }
}
