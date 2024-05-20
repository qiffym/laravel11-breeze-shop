<x-app-layout>
    @slot('title', 'Verify Email')
    @slot('header')
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Verify Email: ') }} (<span class="text-gray-500 ">{{ auth()->user()->email }}</span>)
        </h2>
    @endslot

    <x-container>
        <div class="max-w-2xl p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-sm font-medium text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="flex items-center justify-between mt-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-primary-button>
                            {{ __('Resend Verification Email') }}
                        </x-primary-button>
                    </div>
                </form>

                <div class="flex items-center justify-center gap-2">
                    <a href="{{ route('profile.edit') }}"
                        class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit
                        Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </x-container>
</x-app-layout>
