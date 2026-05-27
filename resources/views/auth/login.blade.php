<x-guest-layout>
    <style>
        /* Custom styled inputs for the glassmorphic theme */
        .glass-input {
            background: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #ffffff !important;
            border-radius: 12px !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }
        
        .glass-input:focus {
            background: rgba(255, 255, 255, 0.06) !important;
            border-color: rgba(212, 175, 55, 0.7) !important;
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.15) !important;
            outline: none !important;
        }

        .glass-input::placeholder {
            color: rgba(255, 255, 255, 0.3) !important;
        }

        /* Metallic Gold Button styling */
        .btn-gold-premium {
            background: linear-gradient(135deg, #BF953F 0%, #FCF6BA 25%, #B38728 50%, #FBF5B7 75%, #AA771C 100%) !important;
            background-size: 200% auto !important;
            color: #1a1505 !important;
            font-weight: 700 !important;
            letter-spacing: 0.05em !important;
            text-transform: uppercase !important;
            box-shadow: 0 4px 20px rgba(212, 175, 55, 0.3) !important;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
            border: none !important;
        }

        .btn-gold-premium:hover {
            background-position: right center !important;
            box-shadow: 0 6px 25px rgba(212, 175, 55, 0.6) !important;
            transform: translateY(-2px) scale(1.01) !important;
        }

        .btn-gold-premium:active {
            transform: translateY(1px) scale(0.99) !important;
            box-shadow: 0 2px 10px rgba(212, 175, 55, 0.3) !important;
        }

        /* Elegant gold accent checkbox */
        .checkbox-gold {
            background-color: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #B38728 !important;
            border-radius: 4px !important;
            transition: all 0.3s ease !important;
        }

        .checkbox-gold:focus {
            ring: 2px !important;
            ring-color: rgba(212, 175, 55, 0.4) !important;
            border-color: rgba(212, 175, 55, 0.6) !important;
        }

        /* Fade-in Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
    </style>

    <!-- Session Status -->
    <x-auth-session-status class="mb-5 text-emerald-400 font-medium bg-emerald-500/10 border border-emerald-500/20 p-3.5 rounded-xl backdrop-blur-sm animate-fade-in" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6 animate-fade-in">
        @csrf

        <!-- Email Address -->
        <div class="space-y-1.5">
            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-amber-500/80">
                {{ __('Email Address') }}
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                    </svg>
                </span>
                <input id="email" 
                       type="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       required 
                       autofocus 
                       autocomplete="username" 
                       class="glass-input w-full pl-10 pr-4 py-3 text-sm" 
                       placeholder="nama@email.com">
            </div>
            @error('email')
                <div class="mt-2 flex items-center space-x-1.5 text-xs text-rose-400 font-medium animate-fade-in">
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <span>{{ $message }}</span>
                </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between">
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-amber-500/80">
                    {{ __('Password') }}
                </label>
                @if (Route::has('password.request'))
                    <a class="text-xs text-gray-400 hover:text-[#FBF5B7] transition-colors duration-200 focus:outline-none focus:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </span>
                <input id="password" 
                       type="password" 
                       name="password" 
                       required 
                       autocomplete="current-password" 
                       class="glass-input w-full pl-10 pr-4 py-3 text-sm" 
                       placeholder="••••••••">
            </div>
            @error('password')
                <div class="mt-2 flex items-center space-x-1.5 text-xs text-rose-400 font-medium animate-fade-in">
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <span>{{ $message }}</span>
                </div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" 
                       type="checkbox" 
                       class="checkbox-gold w-4 h-4 focus:ring-0 focus:ring-offset-0 dark:bg-black/20" 
                       name="remember">
                <span class="ms-2.5 text-sm text-gray-300 font-medium select-none hover:text-white transition-colors duration-200">
                    {{ __('Remember me') }}
                </span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="btn-gold-premium w-full py-3.5 px-4 rounded-xl flex items-center justify-center space-x-2 text-sm cursor-pointer">
                <span>{{ __('Log in') }}</span>
                <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </button>
        </div>

        <!-- Register Link -->
        @if (Route::has('register'))
            <div class="text-center pt-2">
                <p class="text-sm text-gray-400">
                    Tidak punya akun?
                    <a href="{{ route('register') }}" class="text-[#D4AF37] font-semibold hover:text-[#FBF5B7] hover:underline transition-colors duration-200 focus:outline-none ml-1">
                        register disini
                    </a>
                </p>
            </div>
        @endif
    </form>
</x-guest-layout>
