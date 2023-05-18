<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ショー一覧ページ
        </h2>
    </x-slot>
    <form>
        @csrf
        @if(session('message'))
        <div class="text-red-600 font-bold">
            {{session('message')}}
        </div>
        @endif
        <div class="max-w-7xl mx-auto px-6">
            <table id="index-table" border="1">
                <tr>
                    <th>ショー名</th>
                    <th>開催パーク</th>
                    <th>ショータイプ</th>
                    <th>開始日</th>
                    <th>終了日</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
                @foreach ($shows as $show)
                <tr>
                    <td>{{ $show->show_name }}</td>
                    <td>{{ $show->hold_park }}</td>
                    <td>{{ $show->show_type }}</td>
                    <td>{{ $show->start_date }}</td>
                    <td>{{ $show->end_date }}</td>
                    <td><a href="{{ route('shows.edit', $show->show_id) }}" class="btn btn-primary" type="submit">編集する</a></td>
                    <td><a href="{{ route('shows.delete', $show->show_id) }}" class="btn btn-primary" type="submit">削除する</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </form>
    <x-slot name="footer">
    </x-slot>
</x-app-layout>
