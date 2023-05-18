<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ダンサー情報編集ページ
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        @if(session('message'))
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
        @endif
        <form method="POST" action="{{ route('dancers.update') }}">
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="dancer_name" class="font-semibold mt-4">ダンサー名</label>
                    <input type="text" name="dancer_name" class="w-auto py-2 border border-gray-300 rounded-md" id="dancer_name">
                </div>
                <div class="w-full flex flex-col">
                    <label for="performance_park" class="font-semibold mt-4">対象パーク</label>
                    <select name="performance_park">
                        <option value="TDL" @if($dancer->performance_park === 'TDL') @selected(true) @endif>ディズニーランド</option>
                        <option value="TDS" @if($dancer->performance_park === 'TDS') @selected(true) @endif>ディズニーシー</option>
                        <option value="BOTH" @if($dancer->performance_park === 'BOTH') @selected(true) @endif>ランド/シー両方</option>
                    </select>
                </div>
                <div class="w-full flex flex-col">
                    <label for="performance_show_1" class="font-semibold mt-4">出演ショー1</label>
                </div>
                <div class="w-full flex-col">
                    <input type="radio" id="{{ $dancer->performance_show_1 }}" name="checkedShow1" value="{{ $dancer->performance_show_1 }}">
                    <label for="{{ $dancer->performance_show_1 }}">{{ $dancer->performance_show_1 }}</label>
                </div>
                <div class="w-full flex flex-col">
                    <label for="performance_show_2" class="font-semibold mt-4">出演ショー2</label>
                </div>
                <div class="w-full flex-col">
                    <input type="radio" id="{{ $dancer->performance_show_2 }}" name="checkedShow2" value="{{ $dancer->performance_show_2 }}">
                    <label for="{{ $dancer->performance_show_2 }}">{{ $dancer->performance_show_2 }}</label>
                </div>
            </div>
            <x-primary-button class="mt-4">
                更新する
            </x-primary-button>
        </form>
    </div>
    <x-slot name="footer">
    </x-slot>
</x-app-layout>
