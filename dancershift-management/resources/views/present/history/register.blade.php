<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            プレゼント履歴登録フォーム
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        @if(session('message'))
        <div class="text-red-600 font-bold">
            {{session('message')}}
        </div>
        @endif
        <form method="POST" action="{{ route('present.history.store') }}">
            @csrf
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="present_name" class="font-semibold mt-4">プレゼント名</label>
                    <x-input-error :messages="$errors->get('present_name')" class="mt-2" />
                    <input type="text" name="present_name" class="w-auto py-2 border border-gray-300 rounded-md" id="present_name" value={{ old('present_name')}}>
                </div>
                <div class="w-full flex flex-col">
                    <label for="brand" class="font-semibold mt-4">ブランド</label>
                    <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                    <input type="text" name="brand" class="w-auto py-2 border border-gray-300 rounded-md" id="brand" value={{ old('brand')}}>
                </div>
                <div class="w-full flex flex-col">
                    <label for="price" class="font-semibold mt-4">価格</label>
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    <input type="text" name="price" class="w-auto py-2 border border-gray-300 rounded-md" id="price" value={{ old('price')}}>
                </div>
                <div class="w-full flex flex-col">
                    <label for="present_from" class="font-semibold mt-4">プレゼント主</label>
                    <x-input-error :messages="$errors->get('present_from')" class="mt-2" />
                    <input type="text" name="present_from" class="w-auto py-2 border border-gray-300 rounded-md" id="present_from" value={{ old('present_from')}}>
                </div>
                <div class="w-full flex flex-col">
                    <label for="present_to" class="font-semibold mt-4">プレゼント先</label>
                    <x-input-error :messages="$errors->get('present_to')" class="mt-2" />
                    <input type="text" name="present_to" class="w-auto py-2 border border-gray-300 rounded-md" id="present_to" value={{ old('present_to')}}>
                </div>
                <div class="w-full flex flex-col">
                    <label for="present_date" class="font-semibold mt-4">プレゼント日</label>
                    <x-input-error :messages="$errors->get('present_date')" class="mt-2" />
                    <input type="date" name="present_date" class="w-auto py-2 border border-gray-300 rounded-md" id="present_date" value={{ old('present_date')}}>
                </div>
                <div class="w-full flex flex-col">
                    <label for="present_purpose" class="font-semibold mt-4">プレゼント目的</label>
                    <x-input-error :messages="$errors->get('present_purpose')" class="mt-2" />
                    <input type="text" name="present_purpose" class="w-auto py-2 border border-gray-300 rounded-md" id="present_purpose" value={{ old('present_purpose')}}>
                </div>
            </div>
            <x-primary-button class="mt-4">
                登録する
            </x-primary-button>
        </form>
    </div>
    <x-slot name="present_footer">
    </x-slot>
</x-app-layout>
