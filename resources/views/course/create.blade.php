@extends('layouts.app')

@section('content')
    @guest
        <p>You are not login, please log in <a href="{{ route('login') }}">here</a></p>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Create Course') }}</div>
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <form method="POST" action="{{ route('store') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="teacher"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Name Teacher') }}</label>

                                    <div class="col-md-6">
                                        <input id="teacher" type="text"
                                               class="form-control{{ $errors->has('name_teacher') ? ' is-invalid' : '' }}"
                                               name="name_teacher" value="{{ old('name_teacher') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="maxNum"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Max Number') }}</label>
                                    <div class="col-md-4">
                                        <input id="maxNum" type="number"
                                               class="form-control{{ $errors->has('number_max') ? ' is-invalid' : '' }}"
                                               name="number_max" value="{{ old('number_max') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fee"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Fee') }}</label>
                                    <div class="col-md-4">
                                        <input id="fee" type="number"
                                               class="form-control{{ $errors->has('fee') ? ' is-invalid' : '' }}"
                                               name="fee" value="{{ old('fee') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date-start"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Date Start') }}</label>

                                    <div class="col-md-6">
                                        <input id="date_start" type="date"
                                               class="form-control{{ $errors->has('start') ? ' is-invalid' : '' }}"
                                               name="start" value="{{ old('start') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date-end"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Date End') }}</label>

                                    <div class="col-md-6">
                                        <input id="date_end" type="date"
                                               class="form-control{{ $errors->has('end') ? ' is-invalid' : '' }}"
                                               name="end" value="{{ old('end') }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Create') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
