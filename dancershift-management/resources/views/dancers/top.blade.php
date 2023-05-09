<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ダンサー管理トップページ
        </h2>
        <a href="{{ route('shiftmanagement') }}">
            TOPへ
        </a>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-nav-link :href="route('dancers.register')" :active="request()->routeIs('dancers.register')">
                        {{ __('ダンサー登録') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dancers.index')" :active="request()->routeIs('dancers.index')">
                        {{ __('ダンサー全件表示') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dancers.find')" :active="request()->routeIs('dancers.find')">
                        {{ __('ダンサー検索') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
