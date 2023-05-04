<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            シフト登録フォーム
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <form method="get" id="position_select" action="{{ route('shifts.positionSearch') }}">
            @csrf
            @if(session('message'))
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
            @endif
            <p class="font-semibold">手順1：ショー名を選択してください</p>
            <div class="w-full flex flex-col">
                <label for="show_name" class="font-semibold mt-4">ショー名</label>
                <x-input-error :messages="$errors->get('show_name')" class="mt-2" />
                <select id="show_name" name="show_name">
                    @foreach ($shows as $show)
                        <option value="{{ $show->show_id }}">{{ $show->show_name }}</option>
                    @endforeach
                </select>
                <x-primary-button class="mt-3">
                    ポジションを検索
                </x-primary-button>
            </div>
        </form>
    </div>
    <div class="max-w-7xl mx-auto px-6">
        <form method="POST" action="{{ route('shifts.store') }}">
            @csrf
            <p class="font-semibold">手順2：以下を入力してください</p>
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <x-input-error :messages="$errors->get('selected_show_name')" class="mt-2" />
                    <input type="text" name="selected_show_name" value="{{ $selected_show_name }}" class="font-semibold mt-4" readonly>
                </div>
                <div class="w-full flex flex-col">
                    <label for="dancer_name" class="font-semibold mt-4">ダンサー名</label>
                    <x-input-error :messages="$errors->get('dancer_name')" class="mt-2" />
                    <select id="dancer_name" name="dancer_name">
                        @foreach ($dancers as $dancer)
                        <option value="{{ $dancer->dancer_name }}">{{ $dancer->dancer_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full flex-col">
                    <label for="position" class="font-semibold mt-4">ポジション名</label>
                    <x-input-error :messages="$errors->get('position')" class="mt-2" />
                    @foreach ($positions as $position)
                        <input type="radio" id="{{ $position->position_name }}" name="checkedPosition" value="{{ $position->position_name }}">
                        <label for="{{ $position->position_name }}">{{ $position->position_name }}</label>
                    @endforeach
                </div>
                <div class="w-full flex flex-col">
                    <label for="date" class="font-semibold mt-4">日付</label>
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    <input type="date" name="date" id="date">
                </div>
                <div class="w-full flex flex-col">
                    <label for="off" class="font-semibold mt-4">OFF※OFFの場合、チェックしてください</label>
                    <x-input-error :messages="$errors->get('off')" class="mt-2" />
                    <input type="checkbox" name="off" id="off">
                </div>
            </div>
            <x-primary-button class="mt-4">
                登録する
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
