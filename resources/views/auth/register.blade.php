<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4"
                                  :errors="$errors" />

        <form method="POST"
              action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="userame"
                         :value="__('Username')" />

                <x-input id="username"
                         class="block mt-1 w-full"
                         type="text"
                         name="username"
                         :value="old('name')"
                         required
                         autofocus />
            </div>

            <!-- Rol ID -->
            <div class="mt-4">
                <x-label for="rol_id"
                         :value="__('Rol ID')" />

                <x-input id="rol_id"
                         class="block mt-1 w-full"
                         type="number"
                         name="rol_id"
                         :value="old('rol_id')"
                         required />
            </div>

            <!-- Employee ID -->
            <div class="mt-4">
                <x-label for="employee_id"
                         :value="__('Employee ID')" />

                <x-input id="employee_id"
                         class="block mt-1 w-full"
                         type="number"
                         name="employee_id"
                         :value="old('employee_id')"
                         required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password"
                         :value="__('Password')" />

                <x-input id="password"
                         class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required
                         autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation"
                         :value="__('Confirm Password')" />

                <x-input id="password_confirmation"
                         class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation"
                         required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                   href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>