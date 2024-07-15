<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingRequest extends Model
{
    use HasFactory;
    use ModelHelper;

    protected $file_path = 'files/pricing_requests';

    protected $fillable = [
        "name",
        "user_id",
        "info",
        "file_pricing_request",
        "duration",
        "deadline_submitting_offers",
        "closing_date",
        "question",
        "email",
        "phone",
        "is_visit",
        "is_sample",
        "sector_id",
        "services",
        "status",
    ];

    protected $casts = [
        "deadline_submitting_offers" => "date",
        "closing_date" => "date"
    ];

    public function getServicesAttribute($value)
    {
        return json_decode($value);
    }

    public function setServicesAttribute($value)
    {
        $this->attributes['services'] = json_encode($value);
    }

    public function scopeData($query)
    {
        return $query->select([
            'id',
            "name",
            "user_id",
            "info",
            "file_pricing_request",
            "duration",
            "deadline_submitting_offers",
            "closing_date",
            "question",
            "email",
            "phone",
            "is_visit",
            "is_sample",
            "sector_id",
            "services",
            "status"
        ]);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
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
            "name" => ['required', 'string', 'max:255'],
            "info" => ['required',],
            "file_pricing_request" => ['required',],
            "duration" => ['required',],
            "deadline_submitting_offers" => ['required',],
            "closing_date" => ['required',],
            "question" => ['required',],
            "email" => ['required', 'string', 'email', 'max:255', "unique:pricing_requests,email,$id"],
            "phone" => ['required', 'string', 'max:255', "unique:pricing_requests,phone,$id"],
            "is_visit" => ['required'],
            "is_sample" => ['required'],
            "sector_id" => ['required'],
            "services" => ['required'],
        ];
    }

    public function scopeGetMessages()
    {
        return [
            "name.required" => "الحقل مطلوب",
            "info.required" => "الحقل مطلوب",
            "file_pricing_request.required" => "الحقل مطلوب",
            "duration.required" => "الحقل مطلوب",
            "deadline_submitting_offers.required" => "الحقل مطلوب",
            "closing_date.required" => "الحقل مطلوب",
            "question.required" => "الحقل مطلوب",
            "email.required" => "الحقل مطلوب",
            "email.email" => "البريد الالكتروني غير صالح",
            "phone.required" => "الحقل مطلوب",
            "is_visit.required" => "الحقل مطلوب",
            "is_sample.required" => "الحقل مطلوب",
            "sector_id.required" => "الحقل مطلوب",
            "services.required" => "الحقل مطلوب",
        ];
    }

    public function scopeStore(Builder $builder, array $data = [])
    {
        $data['file_pricing_request'] = $builder->storeFile($data['file_pricing_request']);
        $model = $builder->create($data);
        if ($model) {
            $this->deleteLivewireTempFiles();
            return true;
        }
        return false;
    }

    public function scopeUpdateModel(Builder $builder, $data, $id)
    {
        $file_pricing_request = $data['file_pricing_request'];

        if (gettype($file_pricing_request) == "object") {
            $builder->deleteFile($id, "file_pricing_request");
            $data['file_pricing_request'] = $builder->storeFile($file_pricing_request);
        } else {
            unset($data['file_pricing_request']);
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
