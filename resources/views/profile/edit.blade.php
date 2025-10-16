<x-sidebar-layout>
    <x-slot name="title">Profile Settings - TradeLink</x-slot>

    <x-slot name="header">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Profile Settings</h1>
            <p class="text-gray-600 mt-1">Manage your account information and security</p>
        </div>
    </x-slot>

    <div class="px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-4xl mx-auto space-y-6">
            <div class="card p-6 sm:p-8">
                <div class="max-w-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card p-6 sm:p-8">
                <div class="max-w-2xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card p-6 sm:p-8">
                <div class="max-w-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-sidebar-layout>