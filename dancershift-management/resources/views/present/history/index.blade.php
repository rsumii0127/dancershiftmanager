<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            プレゼント履歴一覧ページ
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
                    <th>プレゼント名</th>
                    <th>ブランド</th>
                    <th>価格</th>
                    <th>プレゼント主</th>
                    <th>プレゼント先</th>
                    <th>プレゼント日</th>
                    <th>プレゼント目的</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
                @foreach ($presents as $present)
                <tr>
                    <td>{{ $present->present_name }}</td>
                    <td>{{ $present->brand }}</td>
                    <td>{{ $present->price }}</td>
                    <td>{{ $present->present_from }}</td>
                    <td>{{ $present->present_to }}</td>
                    <td>{{ $present->present_date }}</td>
                    <td>{{ $present->present_purpose }}</td>
                    <td><a href="{{ route('present.history.edit', $present->present_id) }}" class="btn btn-primary" type="submit">編集する</a></td>
                    <td><a href="{{ route('present.history.delete', $present->present_id) }}" class="btn btn-primary" type="submit">削除する</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </form>
    <x-slot name="present_footer">
    </x-slot>
</x-app-layout>
