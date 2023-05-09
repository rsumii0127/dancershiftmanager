<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ショー削除確認ページ
        </h2>
        <a href="{{ route('shiftmanagement') }}">
            TOPへ
        </a>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <p>以下のショー情報を削除します。</p>
        <p>問題ない場合はOKボタンを押してください。</p>
        <form method="POST" action="{{ route('shifts.destroy', $shift->shift_id) }} ">
            @csrf
            <table border="1">
                <tr>
                    <th>ダンサー名</th>
                    <th>ショー名</th>
                    <th>日付</th>
                    <th>ポジション名</th>
                    <th>オン/オフ</th>
                </tr>
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
                </tr>
            </table>
            <x-primary-button class="mt-4">
                OK
            </x-primary-button>
        </form>
    </div>

</x-app-layout>
