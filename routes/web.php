<?php



use App\Http\Controllers\Front\Clinic\ClinicsController;
use App\Http\Controllers\Front\Owner\OwnersController;
use App\Http\Controllers\Front\Prescription\PrescriptionController;
use App\Http\Controllers\Front\Specialization\SpecializationController;
use App\Http\Controllers\Front\Species\SpeciesController;
use App\Http\Controllers\Front\Vets\VetsController;
use App\Http\Controllers\Front\Visits\VisitsController;
use App\Http\Controllers\Front\Worktime\WorktimeController;
use App\Http\Controllers\TestController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Pets\PetsController;
use App\Http\Controllers\API\ClientController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('testing', [TestController::class, 'create'])->name('create');
//Route::view('/testing', 'testing', (array)time());
//Route::view('/testing', 'testing',['name' => 'James']);


Route::view('/demo',"index");

Route::view('/nav',"nav");

//$users = User::where('reminder_sent', true)->get();
//dd($users);

//use Illuminate\Support\Facades\Mail;
//use App\Mail\ReminderEmail;

//Route::get('/send-test-email', function () {
//    $user = User::first(); // Get a sample user
//    Mail::to($user->email)->send(new ReminderEmail($user));
//    return 'Test email sent!';
//});






Route::get('clinics', [ClinicsController::class, 'index'])->name('clinics');
Route::get('clinics/create', [ClinicsController::class, 'create'])->name('clinics.create');
Route::post('clinics/store', [ClinicsController::class, 'store'])->name('clinics.store');
Route::get('clinics/show/{id}', [ClinicsController::class, 'show'])->name('clinics.show');
Route::get('clinics/edit/{id}', [ClinicsController::class, 'edit'])->name('clinics.edit');
Route::put('clinics/update/{id}', [ClinicsController::class, 'update'])->name('clinics.update');
Route::delete('clinics/delete/{id}', [ClinicsController::class, 'destroy'])->name('clinics.delete');





/////////////////////////////////////////////////////////////////////////////

Route::get('owner', [OwnersController::class, 'index'])->name('owners');
Route::get('owners/create',[OwnersController::class, 'create'])->name('owners.create');
Route::post('owners/store',[OwnersController::class, 'store'])->name('owners.store');
Route::get('owners/show/{id}',[OwnersController::class, 'show'])->name('owners.show');
Route::delete('owners/delete/{id}',[OwnersController::class, 'destroy'])->name('owners.delete');
Route::get('owners/edit/{id}',[OwnersController::class, 'edit'])->name('owners.edit');
Route::put('owners/update/{id}',[OwnersController::class, 'update'])->name('owners.update');


///////////////////////////////////////////////

Route::get('pets',[App\Http\Controllers\Front\Pets\PetsController::class,'index'])->name('pets');
Route::get('pets/create', [PetsController::class, 'create'])->name('pets.create');
Route::post('pets/store', [PetsController::class, 'store'])->name('pets.store');
Route::get('pets/show/{id}',[PetsController::class,'show'])->name('pets.show');
Route::delete('pets/delete/{id}',[PetsController::class,'destroy'])->name('pets.delete');
Route::get('pets/edit/{id}',[PetsController::class,'edit'])->name('pets.edit');
Route::put('pets/update/{id}',[PetsController::class,'update'])->name('pets.update');

Route::get('pets/info/{id}', [PetsController::class, 'getPetInfo'])->name('pets.info');

////////////////////////////////////////////////

Route::get('prescriptions',[PrescriptionController::class,'index'])->name('prescriptions');
Route::get('prescriptions/create', [PrescriptionController::class, 'create'])->name('prescriptions.create');
Route::post('prescriptions/store', [PrescriptionController::class, 'store'])->name('prescriptions.store');
Route::get('prescriptions/show/{id}',[PrescriptionController::class,'show'])->name('prescriptions.show');
Route::delete('prescriptions/delete/{id}',[PrescriptionController::class,'destroy'])->name('prescriptions.delete');
Route::get('prescriptions/edit/{id}',[PrescriptionController::class,'edit'])->name('prescriptions.edit');
Route::put('prescriptions/update/{id}',[PrescriptionController::class,'update'])->name('prescriptions.update');

///////////////////////////////////////////////

Route::get('specializations',[SpecializationController::class,'index'])->name('specializations');
Route::get('specializations/create', [SpecializationController::class, 'create'])->name('specializations.create');
Route::post('specializations/store', [SpecializationController::class, 'store'])->name('specializations.store');
Route::get('specializations/show/{id}',[SpecializationController::class,'show'])->name('specializations.show');
Route::delete('specializations/delete/{id}',[SpecializationController::class,'destroy'])->name('specializations.delete');
Route::get('specializations/edit/{id}',[SpecializationController::class,'edit'])->name('specializations.edit');
Route::put('specializations/update/{id}',[SpecializationController::class,'update'])->name('specializations.update');

/////////////////////////////////////////////////

Route::get('species',[SpeciesController::class,'index'])->name('species');
Route::get('species/create', [SpeciesController::class, 'create'])->name('species.create');
Route::post('species/store', [SpeciesController::class, 'store'])->name('species.store');
Route::get('species/show/{id}',[SpeciesController::class,'show'])->name('species.show');
Route::delete('species/delete/{id}',[SpeciesController::class,'destroy'])->name('species.delete');
Route::get('species/edit/{id}',[SpeciesController::class,'edit'])->name('species.edit');
Route::put('species/update/{id}',[SpeciesController::class,'update'])->name('species.update');

////////////////////////////////////////////////

Route::get('vets',[VetsController::class,'index'])->name('vets');
Route::get('vets/create', [VetsController::class, 'create'])->name('vets.create');
Route::post('vets/store', [VetsController::class, 'store'])->name('vets.store');
Route::get('vets/show/{id}',[VetsController::class,'show'])->name('vets.show');
Route::delete('vets/delete/{id}',[VetsController::class,'destroy'])->name('vets.delete');
Route::get('vets/edit/{id}',[VetsController::class,'edit'])->name('vets.edit');
Route::put('vets/update/{id}',[VetsController::class,'update'])->name('vets.update');

//////////////////////////////////////////////////////////

Route::get('visits',[VisitsController::class,'index'])->name('visits');
Route::get('visits/create', [VisitsController::class, 'create'])->name('visits.create');
Route::post('visits/store', [VisitsController::class, 'store'])->name('visits.store');
Route::get('visits/show/{id}',[VisitsController::class,'show'])->name('visits.show');
Route::delete('visits/delete/{id}',[VisitsController::class,'destroy'])->name('visits.delete');
Route::get('visits/edit/{id}',[VisitsController::class,'edit'])->name('visits.edit');
Route::put('visits/update/{id}',[VisitsController::class,'update'])->name('visits.update');

/////////////////////////////////////////////////////////////

Route::get('worktime',[WorktimeController::class,'index'])->name('worktime');
Route::get('worktime/create', [WorktimeController::class, 'create'])->name('worktime.create');
Route::post('worktime/store', [WorktimeController::class, 'store'])->name('worktime.store');
Route::get('worktime/show/{id}',[WorktimeController::class,'show'])->name('worktime.show');
Route::delete('worktime/delete/{id}',[WorktimeController::class,'destroy'])->name('worktime.delete');
Route::get('worktime/edit/{id}',[WorktimeController::class,'edit'])->name('worktime.edit');
Route::put('worktime/update/{id}',[WorktimeController::class,'update'])->name('worktime.update');






/*
Route::group([
    'namespace'    => 'App\Http\Controllers\Front\Clinic',
    'prefix'       => 'clinic',
    'as'           => 'Clinic::',
    'asideMenuSub' => 'clinic',
], function () {
    Route::get('/clinic','ClinicsController@index')->name('index');
});

*/




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/home/clients', [ClientController::class, 'index'])
     ->middleware('auth')
     ->name('home.clients');



Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});


//
//// Authentication Routes...
//Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
//Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
//
//// Registration Routes...
//Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');
//
//// Password Reset Routes...
//Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset');
//
//// Confirm Password Routes...
//Route::get('password/confirm', 'App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
//Route::post('password/confirm', 'App\Http\Controllers\Auth\ConfirmPasswordController@confirm');
//
//// Email Verification Routes...
//Route::get('email/verify', 'App\Http\Controllers\Auth\VerificationController@show')->name('verification.notice');
//Route::get('email/verify/{id}', 'App\Http\Controllers\Auth\VerificationController@verify')->name('verification.verify');
//Route::get('email/resend', 'App\Http\Controllers\Auth\VerificationController@resend')->name('verification.resend');
