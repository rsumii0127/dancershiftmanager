<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        シフト予測ページ
    </h2>
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
      {{ $date }}のポジは{{ $value }}％の確率で{{ $key }}です。<br>
    @endforeach
    <h2>ちなみに直近1週間のシフトは以下の通りです。</h2>
    <table id="index-table" class="table">
      <tr class="">
        <th>ダンサー名</th>
        <th>ショー名</th>
        <th>日付</th>
        <th>曜日</th>
        <th>ポジション名</th>
        <th>オフ</th>
      </tr>
      @foreach ($shifts as $shift)
      <tr>
        <td>{{ $shift->dancers->dancer_name }}</td>
        <td>{{ $shift->show_name }}</td>
        <td>{{ $shift->date }}</td>
        <td>{{ $shift->youbi }}</td>
        <td>{{ $shift->position }}</td>
        @if($shift->off == 1)
        <td>OFF</td>
        @else
        <td></td>
        @endif
      </tr>
      @endforeach
    </table>
  </div>
  <x-slot name="footer">
  </x-slot>
</x-app-layout>