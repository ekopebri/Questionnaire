@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Question</div>

                    <div class="card-body">
                        <form action="/questionnaires/{{ $questionnaire->id }}/questions" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="question">Question</label>
                                <input type="text" class="form-control" id="question" name="question[question]"
                                       value="{{ old("question.question") }}" aria-describedby="questionHelp" placeholder="Enter Question">
                                <small id="questionHelp" class="form-text text-muted">Enter the question you want to
                                    ask.</small>
                                @error('question.question')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <fieldset>
                                    <legend>Choices</legend>
                                    <small id="choicesHelp" class="form-text text-muted">Enter the choices you want to
                                        offer.</small>
                                    <div>
                                        <div class="form-group">
                                            <label for="answer1">Choice 1</label>
                                            <input name="answers[][answer]" class="form-control" id="answer1" aria-describedby="choicesHelp"
                                                   value="{{ old('answers.0.answer') }}" placeholder="Enter Choice 1">
                                            @error('answers.0.answer')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="answer2">Choice 2</label>
                                            <input name="answers[][answer]" class="form-control" id="answer2" aria-describedby="choicesHelp"
                                                   value="{{ old('answers.1.answer') }}" placeholder="Enter Choice 2">
                                            @error('answers.1.answer')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="answer3">Choice 3</label>
                                            <input name="answers[][answer]" class="form-control" id="answer3" aria-describedby="choicesHelp"
                                                   value="{{ old('answers.2.answer') }}" placeholder="Enter Choice 3">
                                            @error('answers.2.answer')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="answer4">Choice 4</label>
                                            <input name="answers[][answer]" class="form-control" id="answer4" aria-describedby="choicesHelp"
                                                   value="{{ old('answers.3.answer') }}" placeholder="Enter Choice 4">
                                            @error('answers.3.answer')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <button type="submit" class="btn btn-primary">Save Question</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
