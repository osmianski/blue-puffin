<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;

/**
 * The logic is "inspired" by the `App\Http\Requests\Auth\LoginRequest`
 * that comes with Laravel Breeze.
 */
class LoginPage extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected array $rules = [
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string'],
    ];

    public function render(): View
    {
        return view('livewire.login-page')
            ->layout('layouts.empty');
    }

    public function save(): Redirector
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        if (! Auth::attempt($credentials, $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());

        $user = User::where('email', $this->email)->firstOrFail();

        return redirect("/{$user->slug}");
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'. Request::ip());
    }
}
