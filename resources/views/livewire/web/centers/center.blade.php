<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header fs-5 fw-bold">تفاصيل المركز {{ $center->name }}</div>

        <div class="card-body mt-3">
            <div class="row">

                <div class="col-md-3">
                    <div>
                        <img class="card-img" src="{{ $center->logo_image }}" height="245" width="245" alt="logo">
                    </div>

                    <div class="mt-5">
                        <h5 class="card-title fw-bold">مراسلة مركز الاعمال</h5>

                        <div class="mt-3">
                            <x-text-input name="name" label="الاسم" model="center"></x-text-input>
                        </div>

                        <div class="mt-3">
                            <x-text-input name="email" label="البريد الالكتروني" model="center"></x-text-input>
                        </div>

                        <div class="mt-3">
                            <x-textarea label="رسالتك" name="message" model="center"></x-textarea>
                        </div>

                        <div class="mt-4 text-center">
                            <button type="button" class="btn btn-lg bg-color-login-form text-white">إرسال</button>
                        </div>

                    </div>
                </div>

                <div class="col-md-9 p-3">

                    <div class="row mb-3">
                        <div class="col-sm-2 fw-bold">اسم المنشأة</div>
                        <div class="col-sm-3">{{ $center->name }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-2 fw-bold">القطاع</div>
                        <div class="col-sm-3">{{ $center->sector?->name }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-2 fw-bold">الخدمات</div>
                        <div class="col-sm-9">
                            @foreach ($center->sector?->services as $service)
                                <span style="font-size: 15px;" class="badge badge-danger">{{ $service->name }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-2 fw-bold">العنوان</div>
                        <div class="col-sm-3">{{ $center->address }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-2 fw-bold">البريد الالكتروني</div>
                        <div class="col-sm-3">{{ $center->email }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-2 fw-bold">رقم الهاتف</div>
                        <div class="col-sm-3">{{ $center->telephone }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-2 fw-bold">رقم الموبايل</div>
                        <div class="col-sm-3">{{ $center->mobile }} (966)+</div>
                    </div>

                    <div class="d-flex m-5 text-center justify-content-center">
                        <span class="fs-1 m-3">
                            <a href="{{ $center->facebook }}" target="_blank">
                                <i class="fab fa-facebook-square color-login-form"></i>
                            </a>
                        </span>

                        <span class="fs-1 m-3">
                            <a href="{{ $center->twitter }}" target="_blank">
                                <i class="fab fa-twitter-square color-login-form"></i>
                            </a>
                        </span>

                        <span class="fs-1 m-3">
                            <a href="{{ $center->linkedin }}" target="_blank">
                                <i class="fab fa-linkedin color-login-form"></i>
                            </a>
                        </span>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
