<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ダンサー登録フォーム
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        @if(session('message'))
        <div class="text-red-600 font-bold">
            {{session('message')}}
        </div>
        @endif
        <form method="POST" action="{{ route('dancers.store') }}">
            @csrf
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="dancer_name" class="font-semibold mt-4">ダンサー名</label>
                    <x-input-error :messages="$errors->get('dancer_name')" class="mt-2" />
                    <input type="text" name="dancer_name" class="w-auto py-2 border border-gray-300 rounded-md" id="dancer_name">
                </div>
                <div class="w-full flex flex-col">
                    <label for="performance_park" class="font-semibold mt-4">対象パーク</label>
                    <x-input-error :messages="$errors->get('performance_park')" class="mt-2" />
                    <select name="performance_park">
                        <option value="TDL">ディズニーランド</option>
                        <option value="TDS">ディズニーシー</option>
                        <option value="BOTH">ランド/シー両方</option>
                    </select>
                </div>
                <div class="w-full flex flex-col">
                    <label for="performance_show_1" class="font-semibold mt-4">出演ショー1</label>
                    <x-input-error :messages="$errors->get('performance_show_1')" class="mt-2" />
                </div>
                <div class="w-full flex-col">
                    
                    @foreach ($shows as $show)
                        <input type="radio" id="{{ $show->show_name }}" name="performance_show_1" value="{{ $show->show_name }}">
                        <label for="{{ $show->show_name }}">{{ $show->show_name }}</label>
                    @endforeach
                </div>
                <div class="w-full flex flex-col">
                    <label for="performance_show_2" class="font-semibold mt-4">出演ショー2</label>
                    <x-input-error :messages="$errors->get('performance_show_2')" class="mt-2" />
                </div>
                <div class="w-full flex-col">
                    @foreach ($shows as $show)
                        <input type="radio" id="{{ $show->show_name }}" name="performance_show_2" value="{{ $show->show_name }}">
                        <label for="{{ $show->show_name }}">{{ $show->show_name }}</label>
                    @endforeach
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
