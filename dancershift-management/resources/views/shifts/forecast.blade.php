<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        シフト予測ページ
    </h2>
    <a href="{{ route('shiftmanagement') }}">
      TOPへ
  </a>
  </x-slot>
  <form class="form-inline" method="get" action={{ route('shifts.calcShift') }} >
    <div class="form-group">
      <select name="dancer_name" id="dancer_name">
        <x-input-error :messages="$errors->get('dancer_name')" class="mt-2" />
        @foreach ($dancers as $dancer)
        <option value="{{ $dancer->dancer_id }}">{{ $dancer->dancer_name }}</option>
        @endforeach
      </select>
      <select name="show_name" id="show_name">
        <x-input-error :messages="$errors->get('show_name')" class="mt-2" />
        @foreach ($shows as $show)
        <option value="{{ $show->show_name }}">{{ $show->show_name }}</option>
        @endforeach
      </select>
      <label for="date">予測日</label>
      <x-input-error :messages="$errors->get('date')" class="mt-2" />
      <input type="date" name="date">
    </div>
    <x-primary-button class="mt-4">
      検索
    </x-primary-button>
  </form>
  <div>
    @if(session('message'))
    <div class="text-red-600 font-bold">
        {{session('message')}}
    </div>
    @endif
    @foreach ($possibilities as $key => $value)
      {{ $date }}のポジは{{ $value }}％の確率で{{ $key }}です。
    @endforeach
  </div>
</x-app-layout>