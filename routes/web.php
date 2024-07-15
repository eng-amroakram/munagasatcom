<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pages\AdminPagesController;
use App\Http\Controllers\Pages\WebPagesController;
use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\Centers\Centers;
use App\Livewire\Admin\Centers\EditCenter;
use App\Livewire\Admin\Centers\EditPricingRequest;
use App\Livewire\Admin\Centers\PricingRequests;
use App\Livewire\Admin\Centers\Sectors;
use App\Livewire\Admin\Centers\Services;
use App\Livewire\Admin\Index;
use App\Livewire\Admin\Opportunities\Opportunities as AdminOpportunities;
use App\Livewire\Admin\Opportunities\OpportunityNotes;
use App\Livewire\Admin\Opportunities\Units;
use App\Livewire\Admin\Tenders\Activities;
use App\Livewire\Admin\Tenders\Cities;
use App\Livewire\Admin\Tenders\EditTender;
use App\Livewire\Admin\Tenders\GovernmentBrokers;
use App\Livewire\Admin\Tenders\Tags;
use App\Livewire\Admin\Tenders\Tenders;
use App\Livewire\Admin\Tenders\TenderTypes;
use App\Livewire\Admin\Users\EditUser;
use App\Livewire\Admin\Users\Users;
use App\Livewire\Web\Auth\Login as AuthLogin;
use App\Livewire\Web\Auth\Register;
use App\Livewire\Web\Centers\Center;
use App\Livewire\Web\Opportunities\Opportunities;
use App\Livewire\Web\Centers\Centers as WebCenters;
use App\Livewire\Web\Tenders\Tenders as WebTenders;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



#New Version
Route::middleware(['web'])->group(function () {

    Route::get('index', [Controller::class, 'index'])->name('index');

    Route::prefix('admin/')->as('admin.')->group(function () {

        Route::middleware(['guest'])->group(function () {
            Route::get('login', Login::class)->name('login');
        });

        Route::middleware(['auth'])->group(function () {
            Route::get('', Index::class)->name('index');

            Route::prefix('users/')->as('users.')->group(function () {
                Route::get('', Users::class)->name('users')->can('users', [User::class]);
                Route::get('edit/{user}', EditUser::class)->name('edit')->can('edit_user', [User::class]);
            });

            Route::prefix('tenders/')->as('tenders.')->group(function () {
                Route::get('/', Tenders::class)->name('index')->can('tenders', [User::class]);
                Route::get('edit/{tender}', EditTender::class)->name('edit')->can('edit_tender', [User::class]);
                Route::get('government-brokers', GovernmentBrokers::class)->name('government-brokers')->can('government_brokers', [User::class]);
                Route::get('tender-types', TenderTypes::class)->name('tender-types')->can('tender_types', [User::class]);
                Route::get('cities', Cities::class)->name('cities')->can('cities', [User::class]);
                Route::get('activities', Activities::class)->name('activities')->can('activities', [User::class]);
                Route::get('tags', Tags::class)->name('tags')->can('tags', [User::class]);
            });

            Route::prefix('centers/')->as('centers.')->group(function () {
                Route::get('', Centers::class)->name('index')->can('centers', [User::class]);
                Route::get('edit/{center}', EditCenter::class)->name('edit')->can('edit_center', [User::class]);
                Route::get('sectors', Sectors::class)->name('sectors')->can('sectors', [User::class]);
                Route::get('service', Services::class)->name('services')->can('services', [User::class]);
                Route::get('pricing-requests', PricingRequests::class)->name('pricing-requests');
                Route::get('edit-pricing-request/{pricing_request}', EditPricingRequest::class)->name('edit-pricing-request');
            });

            Route::prefix('opportunities/')->as('opportunities.')->group(function () {
                Route::get('', AdminOpportunities::class)->name('index')->can('opportunities', [User::class]);
                Route::get('opportunity-notes', OpportunityNotes::class)->name('opportunity-notes')->can('opportunity_notes', [User::class]);
                Route::get('units', Units::class)->name('units')->can('units', [User::class]);
            });

            Route::controller(AdminPagesController::class)->group(function () {
                Route::get('logout', 'logout')->name('logout');
            });
        });
    });


    Route::as('web.')->group(function () {

        Route::middleware(['guest'])->group(function () {
            Route::get('/login', AuthLogin::class)->name('login');
            Route::get('/register', Register::class)->name('register');
            Route::get('/', [WebPagesController::class, 'landingPage'])->name('landing-page');
        });

        Route::prefix('web/')->middleware(['auth'])->group(function () {
            Route::get('tenders/', WebTenders::class)->name('tenders.index');
            Route::get('opportunities/', Opportunities::class)->name('opportunities');

            Route::prefix('centers/')->as('centers.')->group(function () {
                Route::get('', WebCenters::class)->name('index');
                Route::get('{center}', Center::class)->name('center');
            });
        });

        Route::controller(WebPagesController::class)->group(function () {
            Route::get('logout', 'logout')->name('logout');
        });
    });
});


Route::get('testing', function () {
    return view('test');
});
