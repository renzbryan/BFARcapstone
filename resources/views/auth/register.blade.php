<php>
    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background-color: #1f2937; padding: 24px;">
        <div style="max-width: 400px; width: 100%; background-color: #374151; border-radius: 8px; padding: 32px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <h2 style="text-align: center; font-size: 24px; font-weight: bold; color: #ffffff; margin-bottom: 24px;">{{ __('Register') }}</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div style="margin-bottom: 24px;">
                    <label for="name" style="font-size: 14px; color: #ffffff; margin-bottom: 8px; display: block;">{{ __('Name') }}</label>
                    <input id="name" name="name" type="text" required style="width: 100%; border: 1px solid #6b7280; border-radius: 4px; padding: 12px; font-size: 16px; background-color: #4b5563; color: #ffffff;" :value="old('name')" autofocus autocomplete="name">
                </div>
                <div style="margin-bottom: 24px;">
                    <label for="email" style="font-size: 14px; color: #ffffff; margin-bottom: 8px; display: block;">{{ __('Email address') }}</label>
                    <input id="email" name="email" type="email" required style="width: 100%; border: 1px solid #6b7280; border-radius: 4px; padding: 12px; font-size: 16px; background-color: #4b5563; color: #ffffff;" :value="old('email')" autocomplete="username">
                </div>
                <div style="margin-bottom: 24px;">
                    <label for="password" style="font-size: 14px; color: #ffffff; margin-bottom: 8px; display: block;">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" required style="width: 100%; border: 1px solid #6b7280; border-radius: 4px; padding: 12px; font-size: 16px; background-color: #4b5563; color: #ffffff;" autocomplete="new-password">
                </div>
                <div style="margin-bottom: 24px;">
                    <label for="password_confirmation" style="font-size: 14px; color: #ffffff; margin-bottom: 8px; display: block;">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required style="width: 100%; border: 1px solid #6b7280; border-radius: 4px; padding: 12px; font-size: 16px; background-color: #4b5563; color: #ffffff;" autocomplete="new-password">
                </div>
                <div style="text-align: center;">
                    <button type="submit" style="background-color: #2563eb; color: white; border: none; border-radius: 4px; padding: 12px 24px; font-size: 16px; cursor: pointer;">{{ __('Register') }}</button>
                </div>
            </form>
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('login') }}" style="font-size: 14px; color: #ffffff; text-decoration: none;">{{ __('Already registered?') }}</a>
            </div>
        </div>
    </div>
</php>
