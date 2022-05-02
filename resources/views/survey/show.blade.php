@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>{{ $questionnaire->title }}</h1>

                <form action="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="POST">
                    @csrf

                    @foreach ($questionnaire->questions as $key => $question)
                        <div class="card mt-3">
                            <div class="card-header"><strong>{{ $key + 1 }}</strong> {{ $question->question }}</div>
                            <div class="card-body">

                                @error('responses.' . $key . '.answer_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="list-group">
                                    @foreach($question->answers as $answer)
                                        <label for="answer{{ $answer->id }}">
                                            <li class="list-group-item">
                                                <input type="radio" name="responses[{{ $key }}][answer_id]"
                                                       id="answer{{ $answer->id }}" class="mr-2"
                                                       {{ old('responses.' . $key . '.answer_id') == $answer->id ? 'checked' : '' }}
                                                       value="{{ $answer->id }}"/>
                                                {{ $answer->answer }}

                                                <input type="hidden" name="responses[{{ $key }}][question_id]"
                                                       value="{{ $question->id }}"/>
                                            </li>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="card mt-4">
                        <div class="card-header">Your Information</div>

                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" class="form-control" id="name" name="survey[name]"
                                       aria-describedby="nameHelp" placeholder="Enter Name">
                                <small id="nameHelp" class="form-text text-muted">We'll never share your name with
                                    anyone
                                    else.</small>
                                @error('survey.name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Your Email</label>
                                <input type="text" class="form-control" id="email" name="survey[email]"
                                       aria-describedby="emailHelp" placeholder="Enter Email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone
                                    else.</small>
                                @error('survey.email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button class="btn btn-dark" type="submit">Complete Survey</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
