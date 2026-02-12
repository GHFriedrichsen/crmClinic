    <?php

    use App\Http\Controllers\Auth\Logincontroller;
    use App\Http\Controllers\ClinicController;
    use App\Http\Controllers\CustomersController;
    use App\Http\Controllers\UserController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('site.home');
    });

    route::middleware(['auth'])->group(function () {

        Route::prefix('admin')->name('admin.')->group(function () {
            Route::middleware(['role:superAdmin'])->group(function () {
                Route::resource('users', UserController::class);
                Route::resource('clinics', ClinicController::class);
            });
        });

        Route::prefix('users')->name('users.')->group(function () {
            Route::middleware(['role:user,secretaria'])->group(function () {
                Route::get('/', function () {
                    return view('users.dashboard');
                })->name('dashboard');
                Route::resource('customers', CustomersController::class);
            });
        });
        
    });
    // teste sem o midlleware por enquanto
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login'); // tela de login, entrar com email e senha


    //login, registro e logout
    Route::post('/register', [Logincontroller::class, 'register'])->name('register');
    Route::post('/login', [Logincontroller::class, 'authenticate'])->name('login.auth');
    Route::post('/logout', [Logincontroller::class, 'logout'])->name('logout');
