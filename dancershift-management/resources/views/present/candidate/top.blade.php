<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        プレゼント候補管理トップページ
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-nav-link :href="route('present.candidate.register')" :active="request()->routeIs('present.candidate.register')">
                    {{ __('プレゼント候補登録') }}
                </x-nav-link>
                <x-nav-link :href="route('present.candidate.index')" :active="request()->routeIs('present.candidate.index')">
                    {{ __('プレゼント候補表示') }}
                </x-nav-link>
                <x-nav-link :href="route('present.candidate.find')" :active="request()->routeIs('present.candidate.find')">
                    {{ __('プレゼント候補検索') }}
                </x-nav-link>
            </div>
        </div>
    </div>
  </div>
  <x-slot name="present_footer">
  </x-slot>
</x-app-layout>