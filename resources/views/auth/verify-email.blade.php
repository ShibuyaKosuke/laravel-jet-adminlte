<x-guest-layout>
    <x-jet-adminlte::widget.login-box>
        <x-jet-adminlte::widget.card class="card-outline card-primary">
            <x-slot name="header">
                <a href="{{ route('welcome') }}" class="h1"><b>Admin</b>LTE</a>
            </x-slot>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="row">
                <div class="col-8">
                    <x-jet-adminlte::forms.form action="{{ route('verification.send') }}" method="post">
                        <button type="submit" class="btn btn-sm btn-primary">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </x-jet-adminlte::forms.form>
                </div>
                <div class="col-4 text-right">
                    <x-jet-adminlte::forms.form action="{{ route('logout') }}" method="post">
                    <button type="submit" class="btn btn-sm btn-danger">
                        {{ __('Log Out') }}
                    </button>
                    </x-jet-adminlte::forms.form>
                </div>
            </div>

        </x-jet-adminlte::widget.card>
    </x-jet-adminlte::widget.login-box>
</x-guest-layout>
