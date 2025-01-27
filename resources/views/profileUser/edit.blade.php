@extends('layouts.appUser')

@section('content')
<div class="profile-container">
    <div class="row">
        <div class="col-md-4 mb-4">
            <!-- Profile Picture Section -->
            <div class="profile-section h-100">
                <h3 class="section-header">
                    <i class="fas fa-camera me-2"></i>{{ __('Profile Picture') }}
                </h3>
                <div class="p-4">
                    <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if (session('success'))
                            <div class="alert alert-success mb-4" role="alert">
                                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            </div>
                        @endif
                        
                        <div class="avatar-upload">
                            <div class="current-avatar-container">
                                @if(Auth::user()->avatar)
                                    <img class="current-avatar" src="/avatars/{{ Auth::user()->avatar }}" alt="Current Avatar">
                                @else
                                    <img class="current-avatar" src="{{ asset('/img/default_profile.png') }}" alt="Default Avatar">
                                @endif
                            </div>
                            
                            <div class="upload-controls">
                                <div class="custom-file-upload mb-3">
                                    <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" required>
                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-custom w-100">
                                    <i class="fas fa-upload me-2"></i>{{ __('Update Profile Picture') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <!-- Profile Information Section -->
            <div class="profile-section mb-4">
                <h3 class="section-header">
                    <i class="fas fa-user me-2"></i>{{ __('Profile Information') }}
                </h3>
                <div class="p-4">
                    @include('profileUser.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Password Update Section -->
            <div class="profile-section mb-4">
                <h3 class="section-header">
                    <i class="fas fa-lock me-2"></i>{{ __('Update Password') }}
                </h3>
                <div class="p-4">
                    @include('profileUser.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Section -->
            <div class="profile-section">
                <h3 class="section-header text-danger">
                    <i class="fas fa-trash-alt me-2"></i>{{ __('Delete Account') }}
                </h3>
                <div class="p-4">
                    @include('profileUser.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection