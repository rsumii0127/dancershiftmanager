<x-app-layout>
  <x-slot name="header">
    プレゼント履歴検索ページ
  </x-slot>
  <div class="col-sm-4">
    <form class="form-inline" method="get" action={{ route('present.history.get') }} >
      <div class="form-group">
        <label for="brand" class="font-semibold mt-4">ブランド</label>
        <input type="text" name="brand" class="w-auto py-2 border border-gray-300 rounded-md" id="brand" value={{ old('brand')}}>
        <label for="present_from" class="font-semibold mt-4">プレゼント主</label>
        <input type="text" name="present_from" class="w-auto py-2 border border-gray-300 rounded-md" id="present_from" value={{ old('present_from')}}>]
        <label for="present_to" class="font-semibold mt-4">プレゼント先</label>
        <input type="text" name="present_to" class="w-auto py-2 border border-gray-300 rounded-md" id="present_to" value={{ old('present_to')}}>
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
        <th>ポジション名</th>
        <th>オン/オフ</th>
        <th>編集</th>
        <th>削除</th>
      </tr>
      @foreach ($shifts as $shift)
      <tr>
        <td>{{ $shift->dancers->dancer_name }}</td>
        <td>{{ $shift->show_name }}</td>
        <td>{{ $shift->date }}</td>
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
  </div>
  <x-slot name="footer">
  </x-slot>
</x-app-layout>