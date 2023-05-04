<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          ショー管理トップページ
      </h2>
  </x-slot>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <x-nav-link :href="route('shows.register')" :active="request()->routeIs('shows.register')">
                      {{ __('ショー登録') }}
                  </x-nav-link>
                  <x-nav-link :href="route('shows.index')" :active="request()->routeIs('shows.index')">
                      {{ __('ショー全件表示') }}
                  </x-nav-link>
                  <x-nav-link :href="route('shows.find')" :active="request()->routeIs('shows.find')">
                      {{ __('ショー検索') }}
                  </x-nav-link>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>