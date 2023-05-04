<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ポジション登録フォーム
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <form method="POST" action="{{ route('positions.store') }}">
            @csrf
            @if(session('message'))
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
            @endif
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="show_name" class="font-semibold mt-4">ショー名</label>
                    <x-input-error :messages="$errors->get('show_name')" class="mt-2" />
                    <select name="show_name">
                        @foreach ($shows as $show)
                            <option value="{{ $show->show_name }}">{{ $show->show_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full flex flex-col">
                    <label for="position_name" class="font-semibold mt-4">ポジション名</label>
                    <x-input-error :messages="$errors->get('position_name')" class="mt-2" />
                    <input type="text" name="position_name" class="w-auto py-2 border border-gray-300 rounded-md" id="position_name">
                </div>
            </div>
            <x-primary-button class="mt-4">
                登録する
            </x-primary-button>
        </form>
    </div>

</x-app-layout>
