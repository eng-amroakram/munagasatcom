<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    use ModelHelper;

    protected $file_path = 'photos/centers';

    protected $fillable = [
        "name",
        "user_id",
        "city_id",
        "sector_id",
        "services",
        "mobile",
        "telephone",
        "email",
        "address",
        "facebook",
        "twitter",
        "linkedin",
        "logo",
        "profile",
        "status",
    ];

    public function scopeData($query)
    {
        return $query->select([
            'id',
            "name",
            "user_id",
            "city_id",
            "sector_id",
            "services",
            "mobile",
            "telephone",
            "email",
            "address",
            "facebook",
            "twitter",
            "linkedin",
            "logo",
            "profile",
            "status",
        ]);
    }

    public function getLogoImageAttribute()
    {
        return $this->attributes['logo'] ? asset('storage/' . $this->attributes['logo']) : asset('assets/admin/images/no-image-available.jpg');
    }

    public function getProfileImageAttribute()
    {
        return $this->attributes['profile'] ? asset('storage/' . $this->attributes['profile']) : asset('assets/admin/images/no-image-available.jpg');
    }

    public function getServicesAttribute($value)
    {
        return json_decode($value);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id', 'id');
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
            "city_id" => ['required', 'exists:cities,id'],
            'sector_id' => ['required', 'exists:sectors,id'],
            'services' => ['required'],
            'address' => ['required'],
            'logo' => ['required'],
            'profile' => ['required'],
            'telephone' => ['required'],
            'mobile' => ['required'],
            'email' => ['required'],
            'facebook' => ['required', "unique:centers,facebook,$id"],
            'linkedin' => ['required', "unique:centers,linkedin,$id"],
            'twitter' => ['required', "unique:centers,twitter,$id"],

            // 'status' => ['required', 'string', 'in:active,inactive'],
        ];
    }

    public function scopeGetMessages()
    {
        return [
            "name.required" => "ادخل الاسم",
            "name.unique" => "المركز موجودة مسبقا",
            "city_id.required" => "الحقل مطلوب",
            "sector_id.required" => "الحقل مطلوب",
            "services.required" => "الحقل مطلوب",
            "address.required" => "الحقل مطلوب",
            "logo.required" => "الحقل مطلوب",
            "profile.required" => "الحقل مطلوب",
            "telephone.required" => "الحقل مطلوب",
            "mobile.required" => "الحقل مطلوب",
            "email.required" => "الحقل مطلوب",
            "facebook.required" => "الحقل مطلوب",
            "linkedin.required" => "الحقل مطلوب",
            "twitter.required" => "الحقل مطلوب",
            "facebook.unique" => "الرابط موجود مسبقا",
            "linkedin.unique" => "الرابط موجود مسبقا",
            "twitter.unique" => "الرابط موجود مسبقا",
            // "status.required" => "اختر حالة المركز",
        ];
    }

    public function scopeStore(Builder $builder, array $data = [])
    {
        $data['logo'] = $builder->storeFile($data['logo']);
        $data['profile'] = $builder->storeFile($data['profile']);
        $model = $builder->create($data);
        if ($model) {
            $this->deleteLivewireTempFiles();
            return true;
        }
        return false;
    }

    public function scopeUpdateModel(Builder $builder, $data, $id)
    {

        $logo = $data['logo'];
        $profile = $data['profile'];

        if (gettype($logo) == "object") {
            $builder->deleteFile($id, 'logo');
            $data['logo'] = $builder->storeFile($logo);
        } else {
            unset($data['logo']);
        }

        if (gettype($profile) == "object") {
            $builder->deleteFile($id, 'profile');
            $data['profile'] = $builder->storeFile($profile);
        } else {
            unset($data['profile']);
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
