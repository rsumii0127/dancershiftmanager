<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            プレゼント候補一覧ページ
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
                    <th>編集</th>
                    <th>削除</th>
                </tr>
                @foreach ($candidates as $candidate)
                <tr>
                    <td>{{ $candidate->present_name }}</td>
                    <td>{{ $candidate->brand }}</td>
                    <td>{{ $candidate->price }}</td>
                    <td><a href="{{ route('present.candidate.edit', $candidate->candidate_id) }}" class="btn btn-primary" type="submit">編集する</a></td>
                    <td><a href="{{ route('present.candidate.delete', $candidate->candidate_id) }}" class="btn btn-primary" type="submit">削除する</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </form>
    <x-slot name="present_footer">
    </x-slot>
</x-app-layout>
