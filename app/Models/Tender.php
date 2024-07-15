<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use HasFactory;
    use ModelHelper;

    protected $file_path = 'files/tenders';

    protected $fillable = [
        "name",
        "code",
        "reference_code",
        "purpose",
        "tender_type_id",
        "government_broker_id",
        "cities",
        "activities",
        "tags",
        "status",
        "bid_book",
        "actual_bid_book_price",
        "bid_book_download_price",
        "additional_instructions_file",
        "submission_location",
        "envelope_opening_location",
        "execution_location",
        "adding_date",
        "last_inquiry_date",
        "last_submission_date",
        "envelope_opening_date_time",
        "news",
        "bid_bond",
        "bid_bond_address",
        "construction_work",
        "maintenance_work",
    ];

    protected $casts = [
        "envelope_opening_date_time" => "date",
        "adding_date" => "date",
        "last_inquiry_date" => "date",
        "last_submission_date" => "date"
    ];

    public function tender_type()
    {
        return $this->belongsTo(TenderType::class, 'tender_type_id', 'id');
    }

    public function getCitiesAttribute($value)
    {
        return json_decode($value);
    }

    public function setCitiesAttribute($value)
    {
        $this->attributes['cities'] = json_encode($value);
    }

    public function getActivitiesAttribute($value)
    {
        return json_decode($value);
    }

    public function setActivitiesAttribute($value)
    {
        $this->attributes['activities'] = json_encode($value);
    }

    public function getTagsAttribute($value)
    {
        return json_decode($value);
    }

    public function setTagsAttribute($value)
    {
        $this->attributes['tags'] = json_encode($value);
    }

    public function scopeData($query)
    {
        return $query->select([
            'id',
            "name",
            "code",
            "reference_code",
            "purpose",
            "tender_type_id",
            "government_broker_id",
            "cities",
            "activities",
            "tags",
            "status",
            "bid_book",
            "actual_bid_book_price",
            "bid_book_download_price",
            "additional_instructions_file",
            "submission_location",
            "envelope_opening_location",
            "execution_location",
            "adding_date",
            "last_inquiry_date",
            "last_submission_date",
            "envelope_opening_date_time",
            "news",
            "bid_bond",
            "bid_bond_address",
            "construction_work",
            "maintenance_work",
        ]);
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
            'name' => ['required', 'string', 'max:255', "unique:tenders,name,$id"],
            "code" => ['required', 'string', 'max:255', "unique:tenders,code,$id"],
            "reference_code" => ['required', 'string', 'max:255', "unique:tenders,reference_code,$id"],
            "purpose" => ['required', 'string', 'max:255'],
            "tender_type_id" => ['required', "exists:tender_types,id"],
            "government_broker_id" => ['required', 'exists:government_brokers,id'],
            "cities" => ['required'],
            "activities" => ['required'],
            "tags" => ['required'],
            "status" => ['required', 'in:active,inactive'],
            "bid_book" => ['required'],
            "actual_bid_book_price" => ['required'],
            "bid_book_download_price" => ['required'],
            "additional_instructions_file" => ['nullable'],
            "submission_location" => ['required'],
            "envelope_opening_location" => ['required'],
            "execution_location" => ['required'],
            "adding_date" => ['required'],
            "last_inquiry_date" => ['required'],
            "last_submission_date" => ['required'],
            "envelope_opening_date_time" => ['required'],
            "news" => ['string'],
            "bid_bond" => ['string'],
            "bid_bond_address" => ['string'],
            "construction_work" => ['string'],
            "maintenance_work" => ['string'],
        ];
    }

    public function scopeGetMessages()
    {
        return [
            "name.required" => "الحقل مطلوب",
            "name.unique" => "اسم المناقصة موجود بالفعل",
            "code.required" => "الحقل مطلوب",
            "code.unique" => "رقم المناقصة موجود بالفعل",
            "reference_code.required" => "الحقل مطلوب",
            "reference_code.unique" => "الرقم المرجعي موجود بالفعل",
            "purpose.required" => "الحقل مطلوب",
            "tender_type_id.required" => "اختر نوع المناقصة",
            "government_broker_id.required" => "اختر الجهة الحكومية للمناقصة",
            "cities.required" => "اختر مدينة واحدة على الاقل",
            "activities.required" => "اختر نشاط واحد على الاقل",
            "tags.required" => "اختر وسم واحد على الاقل",
            "bid_book.required" => "ارفق كراسة الشروط",
            "actual_bid_book_price.required" => "الحقل مطلوب",
            "bid_book_download_price.required" => "الحقل مطلوب",
            "submission_location.required" => "الحقل مطلوب",
            "envelope_opening_location.required" => "الحقل مطلوب",
            "execution_location.required" => "الحقل مطلوب",
            "adding_date.required" => "الحقل مطلوب",
            "last_inquiry_date.required" => "الحقل مطلوب",
            "last_submission_date.required" => "الحقل مطلوب",
            "envelope_opening_date_time.required" => "الحقل مطلوب",
            "status.required" => "اختر حالة المناقصة"
        ];
    }

    public function scopeStore(Builder $builder, array $data = [])
    {
        $data['bid_book'] = $builder->storeFile($data['bid_book']);
        $data['additional_instructions_file'] = $builder->storeFile($data['additional_instructions_file']);
        $model = $builder->create($data);
        if ($model) {
            $this->deleteLivewireTempFiles();
            return true;
        }
        return false;
    }

    public function scopeUpdateModel(Builder $builder, $data, $id)
    {
        $bid_book = $data['bid_book'];
        $additional_instructions_file = $data['additional_instructions_file'];

        if (gettype($bid_book) == "object") {
            $builder->deleteFile($id, "bid_book");
            $data['bid_book'] = $builder->storeFile($bid_book);
        } else {
            unset($data['bid_book']);
        }

        if (gettype($additional_instructions_file) == "object") {
            $builder->deleteFile($id, "additional_instructions_file");
            $data['additional_instructions_file'] = $builder->storeFile($additional_instructions_file);
        } else {
            unset($data['additional_instructions_file']);
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
