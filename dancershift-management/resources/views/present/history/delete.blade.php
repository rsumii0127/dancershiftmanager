<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            プレゼント履歴削除確認ページ
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <p>以下のプレゼント履歴情報を削除します。</p>
        <p>問題ない場合はOKボタンを押してください。</p>
        <form method="POST" action="{{ route('present.history.destroy', $present->present_id) }} ">
            @csrf
            <table id="index-table" border="1">
                <tr>
                    <th>プレゼント名</th>
                    <th>ブランド</th>
                    <th>価格</th>
                    <th>プレゼント主</th>
                    <th>プレゼント先</th>
                    <th>プレゼント日</th>
                    <th>プレゼント目的</th>
                </tr>
                <tr>
                    <td>{{ $present->present_name }}</td>
                    <td>{{ $present->brand }}</td>
                    <td>{{ $present->price }}</td>
                    <td>{{ $present->present_from }}</td>
                    <td>{{ $present->present_to }}</td>
                    <td>{{ $present->present_date }}</td>
                    <td>{{ $present->present_purpose }}</td>
                </tr>
            </table>
            <x-primary-button class="mt-4">
                OK
            </x-primary-button>
        </form>
    </div>
    <x-slot name="present_footer">
    </x-slot>
</x-app-layout>
