<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->configureAuthenticationGuard();

        $this->app->instance(LogoutResponse::class, new class implements LogoutResponse
        {
            public function toResponse($request)
            {
                if (request_is_for_admin($request)) {
                    return redirect('/admin/login');
                }

                return redirect('/login');
            }
        });
    }

    public function boot(): void
    {
        $this->loadAuthViews();
        $this->setFortifyActions();

        // Fortify::createUsersUsing(CreateNewUser::class);
        // Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        // Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        // Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $username = (string) $request->username;

            return Limit::perMinute(5)->by($username.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::authenticateUsing(function (Request $request) {
            $user = $this->checkUser($request);

            if ($user && Hash::check($request->password, $user->password)) {
                $user->last_login_at = now();
                $user->save();

                return $user;
            }
        });
    }

    protected function setFortifyActions()
    {
        if (request_is_for_admin($this->app->request)) {
            Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        } else {
            Fortify::resetUserPasswordsUsing(ResetCustomerPassword::class);
        }
    }

    protected function checkUser(Request $request)
    {
        $guard = config('fortify.guard');

        if ($guard === 'customer') {
            return Customer::whereStatus(true)->whereEmail($request->email)->first();
        }

        return User::whereStatus(true)->where(function (Builder $query) use ($request) {
            $query->whereUsername($request->username)->orWhere('email', $request->username);
        })->first();
    }

    protected function loadAuthViews()
    {
        $this->setThemePath();

        Fortify::loginView(function () {
            return view('theme::auth.login');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('theme::auth.forgot-password');
        });

        Fortify::resetPasswordView(function () {
            return view('theme::auth.reset-password');
        });

        Fortify::confirmPasswordView(function () {
            return view('theme::auth.confirm-password');
        });

        Fortify::twoFactorChallengeView(function () {
            return view('theme::auth.two-factor-challenge', [
                'page_title' => 'Two Factor Authentication',
            ]);
        });
    }


    protected function setThemePath()
    {
        $theme = 'views/customer';

        if (request_is_for_admin($this->app->request)) {
            $theme = 'views/admin';
        }

        View::addNamespace('theme', [
            resource_path($theme),
        ]);
    }
    protected function configureAuthenticationGuard()
    {
        if (request_is_for_admin($this->app->request)) {
            config([
                'fortify.guard' => 'web',
                'fortify.prefix' => 'admin',
                'fortify.passwords' => 'users',
                'fortify.username' => 'username',
                'fortify.home' => RouteServiceProvider::ADMIN_DASHBOARD,
            ]);
        }
    }
}
