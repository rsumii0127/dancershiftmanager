<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('シフト管理システム') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <x-nav-link :href="route('show')" :active="request()->routeIs('show')">
                      {{ __('ショー管理') }}
                  </x-nav-link>
                  <x-nav-link :href="route('position')" :active="request()->routeIs('position')">
                    {{ __('ポジション管理') }}
                  </x-nav-link>
                  <x-nav-link :href="route('dancer')" :active="request()->routeIs('dancer')">
                    {{ __('ダンサー管理') }}
                  </x-nav-link>
                  <x-nav-link :href="route('shift')" :active="request()->routeIs('shift')">
                    {{ __('シフト管理') }}
                  </x-nav-link>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
