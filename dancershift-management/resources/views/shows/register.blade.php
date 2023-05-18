<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ショー登録フォーム
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        @if(session('message'))
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
        @endif
        <form method="POST" action="{{ route('shows.store') }}">
            @csrf
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="show_name" class="font-semibold mt-4">ショー名</label>
                    <x-input-error :messages="$errors->get('show_name')" class="mt-2" />
                    <input type="text" name="show_name" class="w-auto py-2 border border-gray-300 rounded-md" id="show_name" value={{old('show_name')}}>
                </div>
                <div class="w-full flex flex-col">
                    <label for="hold_park" class="font-semibold mt-4">開催パーク</label>
                    <select name="hold_park">
                        <option value="TDL">ディズニーランド</option>
                        <option value="TDS">ディズニーシー</option>
                    </select>
                </div>
                <div class="w-full flex flex-col">
                    <label for="show_type" class="font-semibold mt-4">ショータイプ</label>
                    <select name="show_type">
                        <option value="Parade">パレード</option>
                        <option value="StageShow">ステージショー</option>
                        <option value="HarborShow">ハーバーショー</option>
                        <option value="Other">その他</option>
                    </select>
                </div>
                <div class="w-full flex flex-col">
                    <label for="start_date" class="font-semibold mt-4">ショー開始日</label>
                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                    <input type="date" name="start_date" id="start_date" value={{old('start_date')}}>
                </div>
                <div class="w-full flex flex-col">
                    <label for="end_date" class="font-semibold mt-4">ショー終了日</label>
                    <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                    <input type="date" name="end_date" id="end_date">
                </div>
            </div>
            <x-primary-button class="mt-4">
                登録する
            </x-primary-button>
        </form>
    </div>
    <x-slot name="footer">
    </x-slot>
</x-app-layout>
