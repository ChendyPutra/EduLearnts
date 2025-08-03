@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-indigo-700">Feedback Pengguna</h1>

<div class="bg-white shadow rounded-lg overflow-hidden">
    <table class="min-w-full text-sm">
        <thead class="bg-indigo-100 text-left text-indigo-700">
            <tr>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Pesan</th>
                <th class="px-4 py-3">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($feedbacks as $feedback)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $feedback->name }}</td>
                    <td class="px-4 py-2">{{ $feedback->message }}</td>
                    <td class="px-4 py-2">{{ $feedback->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-4 text-center text-gray-500">Belum ada feedback.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $feedbacks->links() }}
</div>
@endsection
