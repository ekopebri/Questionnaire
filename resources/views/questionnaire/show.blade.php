@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $questionnaire->title }}</div>

                    <div class="card-body">
                        <a href="/questionnaires/{{ $questionnaire->id }}/questions/create" class="btn btn-dark">Add New
                            Question</a>
                        <a href="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" class="btn btn-dark">Take Survey</a>
                    </div>
                </div>

                @foreach($questionnaire->questions as $question)
                    <div class="card mt-3">
                        <div class="card-header">{{ $question->question }}</div>
                        <div class="card-body">
                            <div class="list-group">
                                @foreach($question->answers as $answer)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>{{ $answer->answer }}</div>
                                        @if($question->responses->count())
                                            <div>{{ intval(($answer->responses->count() * 100) /  $question->responses->count()) }}%</div>
                                        @endif
                                    </li>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <form action="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}"
                                  method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete Question</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
