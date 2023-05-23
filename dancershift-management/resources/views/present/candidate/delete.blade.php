<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            プレゼント候補削除確認ページ
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <p>以下のプレゼント履歴情報を削除します。</p>
        <p>問題ない場合はOKボタンを押してください。</p>
        <form method="POST" action="{{ route('present.candidate.destroy', $candidate->candidate_id) }} ">
            @csrf
            <table id="index-table" border="1">
                <tr>
                    <th>プレゼント名</th>
                    <th>ブランド</th>
                    <th>価格</th>
                </tr>
                <tr>
                    <td>{{ $candidate->present_name }}</td>
                    <td>{{ $candidate->brand }}</td>
                    <td>{{ $candidate->price }}</td>
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
