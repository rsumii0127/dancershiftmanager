<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('プレゼント管理システム') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <x-nav-link :href="route('present.history')" :active="request()->routeIs('present.history')">
                      {{ __('プレゼント履歴管理') }}
                  </x-nav-link>
                  <x-nav-link :href="route('present.candidate')" :active="request()->routeIs('present.candidate')">
                    {{ __('プレゼント候補管理') }}
                  </x-nav-link>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>