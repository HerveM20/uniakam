<?php

namespace App\Livewire\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    /**
     * Gère la soumission du formulaire de connexion.
     */
    public function login(): void
    {
        // La validation est maintenant groupée ici, comme dans votre composant Register.
        $credentials = $this->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt($credentials, $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        
        session()->regenerate();

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }

    /**
     * S'assure que la requête n'est pas limitée en raison de tentatives excessives.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Génère la clé de limitation de tentatives.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }

    /**
     * Affiche la vue du composant.
     */
    public function render()
    {
        // On supprime l'attribut #[Layout] et on le définit ici pour plus de clarté.
        return view('livewire.auth.login')
            ->layout('components.layouts.auth');
    }
}