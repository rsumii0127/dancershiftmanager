<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ダンサー情報削除確認ページ
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <p>以下のショー情報を削除します。</p>
        <p>問題ない場合はOKボタンを押してください。</p>
        <form method="POST" action="{{ route('dancers.destroy', $dancer->dancer_id) }} ">
            @csrf
            <table id="index-table" border="1">
                <tr>
                    <th>ダンサー名</th>
                    <th>出演パーク</th>
                    <th>出演ショー1</th>
                    <th>出演ショー2</th>
                </tr>
                <tr>
                    <td>{{ $dancer->dancer_name }}</td>
                    <td>{{ $dancer->performance_park }}</td>
                    <td>{{ $dancer->performance_show_1 }}</td>
                    <td>{{ $dancer->performance_show_2 }}</td>
                </tr>
            </table>
            <x-primary-button class="mt-4">
                OK
            </x-primary-button>
        </form>
    </div>
    <x-slot name="footer">
    </x-slot>
</x-app-layout>
