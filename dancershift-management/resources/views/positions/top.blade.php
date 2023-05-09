<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ポジション管理トップページ
        </h2>
        <a href="{{ route('shiftmanagement') }}">
            TOPへ
        </a>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-nav-link :href="route('positions.register')" :active="request()->routeIs('positions.register')">
                        {{ __('ポジション登録') }}
                    </x-nav-link>
                    <x-nav-link :href="route('positions.index')" :active="request()->routeIs('positions.index')">
                      {{ __('ポジション全件表示') }}
                    </x-nav-link>
                    <x-nav-link :href="route('positions.find')" :active="request()->routeIs('positions.find')">
                        {{ __('ポジション検索') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
