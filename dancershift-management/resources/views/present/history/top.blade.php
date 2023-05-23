<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        プレゼント履歴管理トップページ
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-nav-link :href="route('present.history.register')" :active="request()->routeIs('present.history.register')">
                    {{ __('プレゼント履歴登録') }}
                </x-nav-link>
                <x-nav-link :href="route('present.history.index')" :active="request()->routeIs('present.history.index')">
                    {{ __('プレゼント履歴表示') }}
                </x-nav-link>
                <x-nav-link :href="route('present.history.find')" :active="request()->routeIs('present.history.find')">
                    {{ __('プレゼント履歴検索') }}
                </x-nav-link>
            </div>
        </div>
    </div>
  </div>
  <x-slot name="present_footer">
  </x-slot>
</x-app-layout>