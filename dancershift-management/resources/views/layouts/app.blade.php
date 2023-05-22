<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @if(config('app.env') === 'production')
        <link rel="stylesheet" href="{{ secure_asset('/css/style.css')  }}" >
        @else
        <link rel="stylesheet" href="{{ secure_asset('/css/style.css')  }}" >
        @endif
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <br>
                {{ $slot }}
            </main>

            <!-- Page Footer -->
            @if (isset($footer))
            <footer class="footer">
              <br>
              <hr>
              <table id="footer-table">
                <tr>
                  <td>
                    <!-- TOPボタン -->
                    <form action='{{ route('shiftmanagement') }}'>
                      <x-primary-button>メインメニュー</x-primary-button>
                    </form>
                  </td>
                  <td>
                    <!-- 戻るボタン -->
                    <x-primary-button onclick="history.back();">戻る</x-primary-button>
                  </td>
                </tr>
              </table>
            </footer>
            @endif
        </div>
    </body>
</html>
