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
            <table border="1">
                <tr>
                    <th>ショー名</th>
                    <th>ポジション名</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
                @foreach ($positions as $position)
                    <td>{{ $position->shows->show_name }}</td>
                    <td>{{ $position->position_name }}</td>
                    <td><a href="{{ route('positions.edit', $position->position_id) }}" class="btn btn-primary" type="submit">編集する</a></td>
                    <td><a href="{{ route('positions.delete', $position->position_id) }}" class="btn btn-primary" type="submit">削除する</a></td>
                @endforeach
            </table>
        </div>
    </form>
</x-app-layout>
