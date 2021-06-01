<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SachController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhongBanController;
use Illuminate\Database\Eloquent\JsonEncodingException;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/xinchao', function () {
    return "Chào mừng bạn đến với Laravel cơ bản! Chào các bạn!";
});

Route::get('/xinchao1', function () {
    return view('xinchao1');
});

Route::get('/hello/{year?}/{name?}', function ($year = '2021', $name = 'No name') {
    $gioiThieu = "Xin chào " . $name . " đến từ năm " . $year;

    return view('gioithieu', compact('gioiThieu'));
});

Route::get('/thongtin', function (\Illuminate\Http\Request $request) {
    echo "Địa chỉ IP: " . $request->ip();
    echo "URL: " . $request->fullUrl();
});

/*Route::get('dangnhap', function(){
    return view('dangnhap');
});

Route::post('/thucHienDangNhap', function(){
   $email = request('email');
   $password = request('password');
   echo "Email đăng nhập là: " . $email . "<br>";
   echo "Mật khẩu đăng nhập là: " . $password . "<br>";
});*/

Route::get('hello2',  function () {
    return response("Chào mừng các bạn đến với Laravel, 2!", 200);
});

Route::get('/user-info', function () {
    $user = ['id' => 1, 'ho_ten' => 'Anderson', 'dien_thoai' => '0356078993'];
    //$json_user = json_encode($user);
    //return $json_user;

    return response($user, 200)->header('content-type', 'application/json');
});

Route::get('list-user', function () {
    $lstUser = [];
    $user1 = ['id' => 1, 'ho_ten' => 'Anderson', 'dien_thoai' => '0356078993'];
    $lstUser[] = $user1;
    $user2 = ['id' => 2, 'ho_ten' => 'Mary', 'dien_thoai' => '0356078784'];
    $lstUser[] = $user2;
    return response()->json($lstUser);
});

Route::get('dangnhap', [\App\Http\Controllers\LoginController::class, 'dangnhap'])->name('login');
Route::post('thuchiendangnhap', [\App\Http\Controllers\LoginController::class, 'thuchiendangnhap']);
Route::post('thuchiendangnhap2', [\App\Http\Controllers\LoginController::class, 'thuchiendangnhap2']);
Route::get('/trangchu', [\App\Http\Controllers\HomeController::class, 'hienthitrangchu'])->name('trangchu');
Route::get('/themmoi_nhanvien', [\App\Http\Controllers\NhanVienController::class, 'themmoi_nhanvien']);
Route::get('/danhsach', [NhanVienController::class, 'danhsach_nhanvien']);
Route::post('/danhsach', [NhanVienController::class, 'timkiem_nhanvien']);
Route::post('/themmoi_nhanvien', [\App\Http\Controllers\NhanVienController::class, 'luutru_nhanvien']);
Route::view('/gioithieu', 'gioithieu');
Route::view('/tintuc', 'tintuc');
Route::view('/sanppham', 'sanpham');
Route::view('/component', 'componentDemo');
Route::view('/admin', 'layouts.admin');
Route::get('/maytinh', [HomeController::class, 'hienThiMaytinh']);
Route::get('/danhsach1', [NhanVienController::class, 'danhsach_nhanvien1']);

Route::name('phongban.')->prefix('phongban')->group(function () {
    Route::get('/danhsach', [PhongBanController::class, 'danhsach'])->name('danhsach');
    Route::get('/themmoi', [PhongBanController::class, 'hienThiThemPhong'])->name('themmoi');
    Route::post('/themmoi', [PhongBanController::class, 'themmoi_phongban']);
    Route::get('/sua/{id}', [PhongBanController::class, 'chiTietSua']);
    Route::post('/sua/{id}', [PhongBanController::class, 'suaThongTin']);
    Route::post('/xoa/{id}', [PhongBanController::class, 'xoaPhongBan']);
});

Route::name('sach.')->prefix('/sach')->group(function () {
    Route::get('/', [SachController::class, 'index'])->name('index');
    Route::get('/create', [SachController::class, 'create'])->middleware('dangNhapMiddleware')->name('create');
    Route::post('/', [SachController::class, 'store']);
    Route::get('/{sach}/edit', [SachController::class, 'edit'])->name('edit');
    Route::patch('/{sach}', [SachController::class, 'update']);
    Route::delete('/{sach}', [SachController::class, 'destroy']);
});
