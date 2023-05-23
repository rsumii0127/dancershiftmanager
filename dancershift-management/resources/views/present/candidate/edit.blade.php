<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            プレゼント候補編集ページ
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        @if(session('message'))
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
        @endif
        <form method="POST" action="{{ route('present.candidate.update') }}">
            @csrf
            @if(session('message'))
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
            @endif
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
            </div>
            <x-primary-button class="mt-4">
                更新する
            </x-primary-button>
        </form>
    </div>
    <x-slot name="present_footer">
    </x-slot>
</x-app-layout>
