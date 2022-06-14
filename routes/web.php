<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Program;
use App\Models\Category;

use App\Models\Programs;
use App\Models\AssistanceProgram;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\MarriageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\DashboardDocController;
use App\Http\Controllers\LoginLayananController;
use App\Http\Controllers\DashboardHomeController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\SuratIzinUsahaController;
use App\Http\Controllers\DashboardGenderController;
use App\Http\Controllers\SuratTidakMampuController;
use App\Http\Controllers\DashboardFinanceController;
use App\Http\Controllers\DashboardLayananController;
use App\Http\Controllers\DashboardProgramController;
use App\Http\Controllers\DashboardVillageController;
use App\Http\Controllers\AdminPegawaiLoginController;
use App\Http\Controllers\DashboardAparaturController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardMarriageController;
use App\Http\Controllers\DashboardPendudukController;
use App\Http\Controllers\DashboardProgramsController;
use App\Http\Controllers\DashboardReligionController;
use App\Http\Controllers\DashboardEducationController;
use App\Http\Controllers\SuratIzinKeramaianController;
use App\Http\Controllers\DashboardAssistanceController;
use App\Http\Controllers\DashboardProfessionController;
use App\Http\Controllers\DashboardSuratIzinUsahaController;
use App\Http\Controllers\DashboardSuratIzinKeramaianController;
use App\Http\Controllers\DashboardSuratKeteranganMeninggalController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home',[
//         "title" => "Post",
//     ]);
// });


Route::get('/layanan', [LayananController::class,'index']);
Route::get('/layanan/surat/kematian', [KematianController::class,'index']);
Route::post('/layanan/surat/kematian', [KematianController::class,'store'])->middleware('guest');
Route::get('layanan/surat/tidakMampu', [LayananController::class,'index']);
// Route::get('/layanan/surat', KematianController ::class);



// surat Izin Usaha
Route::get('layanan/surat/surat_izin_usaha', [SuratIzinUsahaController::class,'index']);
Route::post('surat_izin_usaha', [SuratIzinUsahaController::class,'store']);
Route::delete('/layanan/surat/surat_izin_usaha/{id}', [SuratIzinUsahaController::class,'destroy']);

// surat izin keramaian
Route::get('layanan/surat/surat_izin_keramaian', [SuratIzinKeramaianController::class,'index']);
Route::post('surat_izin_keramaian', [SuratIzinKeramaianController::class,'store']);
Route::delete('/layanan/surat/surat_izin_keramaian/{id}', [SuratIzinKeramaianController::class,'destroy']);

// surat Tidak mampu
Route::get('layanan/surat/surat_keterangan_tidak_mampu', [SuratTidakMampuController::class,'index']);
Route::post('surat_keterangan_tidak_mampu', [SuratTidakMampuController::class,'store']);
Route::delete('layanan/surat/surat_keterangan_tidak_mampu/{id}', [SuratTidakMampuController::class,'destroy']);

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/profil/history', function () {
    return view('profil.history');
});

Route::get('/data/pekerjaan', [ProfessionController::class, 'index']);
Route::get('/data/pendidikan', [EducationController::class, 'index']);
Route::get('/data/agama', [ReligionController::class, 'index']);
Route::get('/data/jenis', [GenderController::class, 'index']);
Route::get('/data/perkawinan', [MarriageController::class, 'index']);



Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        "active" => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('category', [
        'title' => $category->name,
        "posts" => $category->posts,
        'category' => $category->name
    ]);
});

// Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('guest');
// Route::post('/admin', [AdminController::class, 'authenticate']);
// Route::post('/logout', [AdminController::class, 'logout']);

//login admin
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

//login Layanan
Route::get('/login_layanan', [LoginController::class, 'user'])->name('login')->middleware('guest');
Route::post('/login_layanan', [LoginController::class, 'layanan']);
// Route::post('/login_layanan', [LoginLayananController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    if(Auth::user()->is_admin !== 'user'){
        return view('dashboard.index');
    }else{
        return view('dashboard.surat');
    }
})->middleware('auth');

Route::get('/dashboard/surat', function () {
    return view('dashboard.surat');
})->middleware('auth');

// Route::get('generate-docx', 'DashboardDocController@generateDocx');

Route::get('generate-docx', [DashboardDocController::class, 'generateDocx'])->middleware('auth');

// Berita Desa
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// Data Desa
Route::get('/dashboard/data/desa', function () {
    return view('dashboard.data.index');
})->middleware('auth');

Route::resource('/dashboard/data/professions', DashboardProfessionController::class)->middleware('auth');
Route::resource('/dashboard/data/educations', DashboardEducationController::class)->middleware('auth');
Route::resource('/dashboard/data/religions', DashboardReligionController::class)->middleware('auth');
Route::resource('/dashboard/data/genders', DashboardGenderController::class)->middleware('auth');
Route::resource('/dashboard/data/marriages', DashboardMarriageController::class)->middleware('auth');


Route::resource('/dashboard/data', DashboardPendudukController::class)->middleware('auth');

// Keuangan Desa
Route::resource('/dashboard/finances', DashboardFinanceController::class)->middleware('auth');

//program batuan//
Route::resource('/dashboard/programs/assistances', DashboardAssistanceController::class)->middleware('auth');
Route::resource('/dashboard/programs', DashboardProgramsController::class)->middleware('auth');
Route::get('/dashboard/programs/program/{program:id}', function (Program $program) {
    return view('dashboard.programs.program', [
        'title' => $program->name,
        "assistances" => $program->assistances,
        'program' => $program->name
    ]);
})->middleware('auth');

// Potensi Desa
Route::get('/dashboard/villages/checkSlug', [DashboardVillageController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/villages', DashboardVillageController::class)->middleware('auth');

// Category
Route::get('/dashboard/category/checkSlug', [DashboardCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/category', DashboardCategoryController::class)->middleware('auth');

// Aparatur Desa
Route::resource('/dashboard/aparatur', DashboardAparaturController::class)->middleware('auth');

// Layanan Mandiri
Route::resource('/dashboard/surat_izin_usaha', DashboardSuratIzinUsahaController::class)->middleware('auth');
Route::resource('/dashboard/surat_keterangan_meninggal', DashboardSuratKeteranganMeninggalController::class)->middleware('auth');
Route::resource('/dashboard/surat_izin_keramaian', DashboardSuratIzinKeramaianController::class)->middleware('auth');

Route::resource('/dashboard/pegawai_login', AdminPegawaiLoginController::class)->except('show')->middleware('admin');


