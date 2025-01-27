<section class="mt-8 bg-white rounded-lg shadow-sm overflow-hidden">
    <header class="p-6 bg-gray-50 border-b border-gray-100">
        <h2 class="text-xl font-semibold text-gray-900">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <div class="p-6">
        <form method="POST" action="{{ route('user.password.update') }}" class="space-y-6">
            @csrf
            
            <div class="space-y-4">
                <div>
                    <label for="current_password" class="text-sm font-medium text-gray-700">Current Password</label>
                    <input id="current_password" name="current_password" type="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 form-control"
                        autocomplete="current-password" />
                    @error('current_password')
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="text-sm font-medium text-gray-700">New Password</label>
                    <input id="password" name="password" type="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 form-control"
                        autocomplete="new-password" />
                    @error('password')
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 form-control"
                        autocomplete="new-password" />
                    @error('password_confirmation')
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>{{ __('Update Password') }}
                </button>

                @if (session('status') === 'password-updated')
                    <p class="text-sm text-success">
                        <i class="fas fa-check me-2"></i>{{ __('Password updated successfully.') }}
                    </p>
                @endif
            </div>
        </form>
    </div>
</section>
