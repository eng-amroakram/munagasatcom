<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;
    use ModelHelper;

    protected $file_path = 'photos/opportunities';

    protected $fillable = [
        "name",
        "user_id",
        "sector_id",
        "notes",
        "cities",
        "units",
        "address",
        "method",
        "file_opportunity",
        "closing_date",
        "manager",
        "phone",
        "email",
        "status",
    ];

    protected $casts = [
        "closing_date" => "date"
    ];

    public function scopeData($query)
    {
        return $query->select([
            'id',
            "name",
            "user_id",
            "sector_id",
            "notes",
            "cities",
            "units",
            "address",
            "method",
            "file_opportunity",
            "closing_date",
            "manager",
            "phone",
            "email",
            "status",
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id', 'id');
    }

    public function getCitiesAttribute($value)
    {
        return json_decode($value);
    }

    public function setCitiesAttribute($value)
    {
        $this->attributes['cities'] = json_encode($value);
    }

    public function getUnitsAttribute($value)
    {
        return json_decode($value);
    }

    public function setUnitsAttribute($value)
    {
        $this->attributes['units'] = json_encode($value);
    }

    public function getNotesAttribute($value)
    {
        return json_decode($value);
    }

    public function setNotesAttribute($value)
    {
        $this->attributes['notes'] = json_encode($value);
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
            'status' => null,
        ], $filters);

        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        });

        $builder->when($filters['search'] == '' && $filters['status'] != null, function ($query) use ($filters) {
            $query->whereIn('status', $filters['status']);
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
            'name' => ['required', 'string', 'max:255', "unique:centers,name,$id"],
            "sector_id" => ['required'],
            "notes" => ['required'],
            "cities" => ['required'],
            "units" => ['nullable'],
            "address" => ['required'],
            "method" =>  ['required'],
            "file_opportunity" => ['nullable'],
            "closing_date" => ['required'],
            "manager" => ['required'],
            "phone" => ['required'],
            "email" => ['required'],
            'status' => ['required', 'string', 'in:active,inactive'],
        ];
    }

    public function scopeGetMessages()
    {
        return [
            "name.required" => "الحقل مطلوب",
            "sector_id.required" => "الحقل مطلوب",
            "notes.required" => "الحقل مطلوب",
            "cities.required" => "الحقل مطلوب",
            "address.required" => "الحقل مطلوب",
            "method.required" => "الحقل مطلوب",
            "closing_date.required" => "الحقل مطلوب",
            "manager.required" => "الحقل مطلوب",
            "phone.required" => "الحقل مطلوب",
            "email.required" => "الحقل مطلوب",
            "status.required" => "الحقل مطلوب",
        ];
    }

    public function scopeStore(Builder $builder, array $data = [])
    {
        $data['file_opportunity'] = $builder->storeFile($data['file_opportunity']);
        $model = $builder->create($data);
        if ($model) {
            $this->deleteLivewireTempFiles();
            return true;
        }
        return false;
    }

    public function scopeUpdateModel(Builder $builder, $data, $id)
    {
        $file_opportunity = $data['file_opportunity'];

        if (gettype($file_opportunity) == "object") {
            $builder->deletePhoto($id);
            $data['file_opportunity'] = $builder->storeFile($file_opportunity);
        } else {
            unset($data['file_opportunity']);
        }

        $model = $builder->find($id);
        if ($model) {
            $model = $model->update($data);
            $this->deleteLivewireTempFiles();
            return true;
        }
        return false;
    }
}
