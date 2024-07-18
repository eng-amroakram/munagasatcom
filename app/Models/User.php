<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use ModelHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_owner_id',
        'email',
        'phone',
        'photo',
        'account_type',
        'account_status',
        'permissions',
        'password',
    ];

    protected $file_path = 'photos/users';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'user_owner_id',
            'name',
            'email',
            'phone',
            'photo',
            'account_type',
            'account_status',
            'permissions',
            'password',
        ]);
    }

    public function centers()
    {
        $this->hasMany(Center::class, 'center_id', 'id');
    }

    public function getPhotoAttribute()
    {
        return $this->attributes['photo'] ? asset('storage/' . $this->attributes['photo']) : asset('assets/admin/images/no-image-available.jpg');
    }

    public function setPermissionsAttribute($value)
    {
        $this->attributes['permissions'] = json_encode($value);
    }

    public function getPermissionsAttribute($value)
    {
        return json_decode($value);
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
            'account_status' => null,
            'account_type' => null,
        ], $filters);


        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query->where('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('email', 'like', '%' . $filters['search'] . '%')
                ->orWhere('phone', 'like', '%' . $filters['search'] . '%');
        });

        $builder->when($filters['search'] == '' && $filters['account_status'] != null, function ($query) use ($filters) {
            $query->whereIn('account_status', $filters['account_status']);
        });

        $builder->when($filters['search'] == '' && $filters['account_type'] != null, function ($query) use ($filters) {
            $query->whereIn('account_type', $filters['account_type']);
        });
    }

    public function scopeChangeAccountStatus(Builder $builder, $id)
    {
        $user = $builder->find($id);
        if ($user) {
            $user->update([
                'account_status' =>  $user->account_status == "active" ? "inactive" : "active",
            ]);
            return "تم تغير حالة المستخدم بنجاح";
        }
        return false;
    }

    public function scopeGetRules(Builder $builder, $id = "")
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', "unique:users,email,$id"],
            'phone' => ['required', 'string', "unique:users,phone,$id"],
            "password" => ['required', 'string', 'min:8'],
            'photo' => ['image', 'max:1024'],
            'account_status' => ['required', 'string', 'in:active,inactive'],
            'account_type' => ['required', 'string', 'in:superadmin,admin,person,company,employee'],
        ];
    }

    public function scopeGetMessages()
    {
        return [
            "name.required" => "ادخل الاسم",
            "email.required" => "ادخل البريد الالكتروني",
            "email.email" => "البريد الالكتروني غير صالح",
            "email.unique" => "البريد الإلكتروني مستخدم بالفعل",
            "phone.required" => "ادخل رقم الهاتف",
            "phone.unique" => "رقم الجوال مستخدم بالفعل",
            "password.required" => "ادخل كلمة المرور",
            "password.min" => "حقل كلمة المرور يجب أن لا يقل عن 8 أحرف",
            "account_status.required" => "اختر حالة الحساب",
            "account_type.required" => "اختر نوع الحساب",
        ];
    }

    public function scopeStore(Builder $builder, array $data = [])
    {

        $data['photo'] = $builder->storeFile($data['photo']);
        $user = $builder->create($data);

        if ($user) {
            $this->deleteLivewireTempFiles();
            return true;
        }

        return false;
    }

    public function scopeUpdateModel(Builder $builder, $data, $id)
    {
        $photo = $data['photo'];

        if (gettype($photo) == "object") {
            $builder->deleteFile($id, 'photo');
            $data['photo'] = $builder->storeFile($photo);
        } else {
            unset($data['photo']);
        }

        if ($data["password"]) {
            $data["password"] = Hash::make($data["password"]);
        } else {
            unset($data["password"]);
        }

        $user = $builder->find($id);

        if ($user) {
            $user = $user->update($data);
            $this->deleteLivewireTempFiles();
            return true;
        }

        return false;
    }
}
