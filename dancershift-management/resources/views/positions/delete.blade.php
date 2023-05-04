<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ショー削除確認ページ
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <p>以下のショー情報を削除します。</p>
        <p>問題ない場合はOKボタンを押してください。</p>
        <form method="POST" action="{{ route('positions.destroy', $position->position_id) }} ">
            @csrf
            <table border="1">
                <tr>
                    <th>ショー名</th>
                    <th>ポジション</th>
                    <th>ショータイプ</th>
                    <th>開始日</th>
                    <th>終了日</th>
                </tr>
                <tr>
                    <td>{{ $position->position_name }}</td>
                    <td>{{ $position->hold_park }}</td>
                    <td>{{ $position->show_type }}</td>
                    <td>{{ $position->start_date }}</td>
                    <td>{{ $position->end_date }}</td>
                </tr>
            </table>
            <x-primary-button class="mt-4">
                OK
            </x-primary-button>
        </form>
    </div>

</x-app-layout>
