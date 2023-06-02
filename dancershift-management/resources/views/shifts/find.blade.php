<x-app-layout>
  <x-slot name="header">
    シフト検索ページ
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </x-slot>
  <div class="col-sm-4">
    <form class="form-inline" method="get" action={{ route('shifts.get') }} >
      <div class="form-group">
        <select name="dancer_name" id="dancer_name">
          @foreach ($dancers as $dancer)
          <option value="{{ $dancer->dancer_id }}">{{ $dancer->dancer_name }}</option>
          @endforeach
        </select>
        <br>
        <label for="week_sort">曜日ごとにまとめる場合はチェック！→</label>
        <input type="checkbox" name="week_sort">
      </div>
      <x-primary-button class="mt-4">
        検索
      </x-primary-button>
    </form>
    <table id="index-table" class="table">
      <tr class="">
        <th>ダンサー名</th>
        <th>ショー名</th>
        <th>日付</th>
        <th>曜日</th>
        <th>ポジション名</th>
        <th>オフ</th>
        <th>編集</th>
        <th>削除</th>
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
        <td><a href="{{ route('shifts.edit', $shift->shift_id) }}" class="btn btn-primary" type="submit">編集する</a></td>
        <td><a href="{{ route('shifts.delete', $shift->shift_id) }}" class="btn btn-primary" type="submit">削除する</a></td>
      </tr>
      @endforeach
    </table>
    {{-- <div id='calendar' value={{ $shifts }}></div> --}}
  </div>
  <x-slot name="footer">
  </x-slot>
</x-app-layout>