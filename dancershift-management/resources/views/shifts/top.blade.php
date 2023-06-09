<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          シフト管理トップページ
      </h2>
  </x-slot>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <x-nav-link :href="route('shifts.register')" :active="request()->routeIs('shifts.register')">
                      {{ __('シフト登録') }}
                  </x-nav-link>
                  <x-nav-link :href="route('shifts.find')" :active="request()->routeIs('shifts.find')">
                      {{ __('シフト検索') }}
                  </x-nav-link>
                  <x-nav-link :href="route('shifts.forecast')" :active="request()->routeIs('shifts.forecast')">
                    {{ __('ダンサー別シフト予測') }}
                  </x-nav-link>
              </div>
          </div>
      </div>
  </div>
  <x-slot name="footer">
  </x-slot>
</x-app-layout>