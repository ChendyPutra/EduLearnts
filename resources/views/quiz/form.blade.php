@extends('layouts.app') {{-- atau layouts.student jika ada --}}

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">
  <h2 class="text-2xl font-bold text-indigo-700 mb-4">
    Kuis: {{ $module->title }}
  </h2>

  <form action="{{ route('quiz.submit', $module) }}" method="POST">
    @csrf

    @foreach ($quizzes as $quiz)
      <div class="mb-6">
        <p class="font-semibold">{{ $loop->iteration }}. {{ $quiz->question }}</p>
        <div class="mt-2 space-y-1">
          @foreach (['A', 'B', 'C', 'D'] as $opt)
            <label class="block">
              <input type="radio" name="quiz_{{ $quiz->id }}" value="{{ $opt }}" required>
              {{ $opt }}. {{ $quiz->{'option_' . strtolower($opt)} }}
            </label>
          @endforeach
        </div>
      </div>
    @endforeach

    <button type="submit"
            class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
      Kumpulkan Jawaban
    </button>
  </form>
</div>
@endsection
