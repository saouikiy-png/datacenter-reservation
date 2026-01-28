<section style="margin-top: 20px;">
    <header>
        <h2 class="section-heading" style="color: #E53E3E; border-bottom-color: #FEB2B2;">
            {{ __('Delete Account') }}
        </h2>

        <p class="section-description">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button type="button" class="btn-danger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Delete Account') }}
    </button>

    <div x-data="{ show: false }" x-on:open-modal.window="if ($event.detail === 'confirm-user-deletion') show = true" x-show="show" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100vh; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center; display: flex;">
        <div style="background: white; padding: 30px; border-radius: 12px; width: 100%; max-width: 500px; box-shadow: 0 4px 20px rgba(0,0,0,0.2);">
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <h2 style="font-size: 1.5rem; font-weight: 700; color: #2D3748; margin-bottom: 10px;">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p style="color: #718096; margin-bottom: 20px;">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="form-group">
                    <label for="password" class="form-label" style="display:none">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}" />
                    @error('password', 'userDeletion')
                        <div class="input-error">{{ $message }}</div>
                    @enderror
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px;">
                    <button type="button" x-on:click="show = false" style="background: #edf2f7; color: #4a5568; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: 600;">
                        {{ __('Cancel') }}
                    </button>

                    <button type="submit" class="btn-danger">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
