<x-app-layout>
  <x-slot name="header">
    シフト検索ページ
  </x-slot>
  <div class="col-sm-4">
    <form class="form-inline" method="get" action={{ route('shifts.get') }} >
      <div class="form-group">
        <select name="dancer_name" id="dancer_name">
          @foreach ($dancers as $dancer)
          <option value="{{ $dancer->dancer_id }}">{{ $dancer->dancer_name }}</option>
          @endforeach
        </select>
        <select name="show_name" id="show_name">
          @foreach ($shows as $show)
          <option value="{{ $show->show_name }}">{{ $show->show_name }}</option>
          @endforeach
        </select>
        <select name="position_name" id="position_name">
          @foreach ($positions as $position)
          <option value="{{ $position->position_name }}">{{ $position->position_name }}</option>
          @endforeach
        </select>
      </div>
      <x-primary-button class="mt-4">
        検索
      </x-primary-button>
    </form>

    <table class="table">
      <tr class="">
        <th>ダンサー名</th>
        <th>ショー名</th>
        <th>日付</th>
        <th>ポジション名</th>
        <th>オン/オフ</th>
      </tr>
      @foreach ($shifts as $shift)
      <tr>
        <td>{{ $shift->dancers->dancer_name }}</td>
        <td>{{ $shift->show_name }}</td>
        <td>{{ $shift->date }}</td>
        <td>{{ $shift->position }}</td>
        <td>{{ $shift->off }}</td>
      </tr>
      @endforeach
    </table>
  </div>
</x-app-layout>