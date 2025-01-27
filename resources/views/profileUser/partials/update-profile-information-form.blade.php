<section class="mt-8 bg-white rounded-lg shadow-sm overflow-hidden">
    <header class="p-6 bg-gray-50 border-b border-gray-100">
        <h2 class="text-xl font-semibold text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <div class="p-6">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('patch')

            <div class="space-y-4">
                <div>
                    <label for="name" class="text-sm font-medium text-gray-700">Name</label>
                    <input id="name" name="name" type="text" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 form-control"
                        value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                    @error('name')
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 form-control"
                        value="{{ old('email', $user->email) }}" required autocomplete="username" />
                    @error('email')
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="mt-3 alert alert-warning">
                            <p class="text-sm">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification" 
                                    class="btn btn-link btn-sm">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 text-sm text-success">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>{{ __('Save Changes') }}
                </button>

                @if (session('status') === 'profile-updated')
                    <p class="text-sm text-success">
                        <i class="fas fa-check me-2"></i>{{ __('Saved successfully.') }}
                    </p>
                @endif
            </div>
        </form>
    </div>
</section>