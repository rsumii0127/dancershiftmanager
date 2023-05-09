<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ショー一覧ページ
        </h2>
        <a href="{{ route('shiftmanagement') }}">
            TOPへ
          </a>
    </x-slot>
    <form>
        @csrf
        @if(session('message'))
        <div class="text-red-600 font-bold">
            {{session('message')}}
        </div>
        @endif
        <div class="max-w-7xl mx-auto px-6">
            <table border="1">
                <tr>
                    <th>ダンサー名</th>
                    <th>出演パーク</th>
                    <th>出演ショー1</th>
                    <th>出演ショー2</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
                @foreach ($dancers as $dancer)
                <tr>
                    <td>{{ $dancer->dancer_name }}</td>
                    <td>{{ $dancer->performance_park }}</td>
                    <td>{{ $dancer->performance_show_1 }}</td>
                    <td>{{ $dancer->performance_show_2 }}</td>
                    <td><a href="{{ route('dancers.edit', $dancer->dancer_id) }}" class="btn btn-primary" type="submit">編集する</a></td>
                    <td><a href="{{ route('dancers.delete', $dancer->dancer_id) }}" class="btn btn-primary" type="submit">削除する</a></td>
                @endforeach
                </tr>
            </table>
        </div>
    </form>
</x-app-layout>
