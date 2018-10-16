@extends('layouts.app')

@section('content')
    @guest
        <li>You are not login, please log in <a href="{{ route('store') }}">here</a></li>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header ">
                            <h5 class="float-left">Edit course</h5>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body mt-2">
                            <form method="post" action="{{ route('update', $course->id)}}">
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="name" value="{{ $course -> name }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="teacher"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Name Teacher') }}</label>

                                        <div class="col-md-6">
                                            <input id="teacher" type="text"
                                                   class="form-control{{ $errors->has('name_teacher') ? ' is-invalid' : '' }}"
                                                   name="name_teacher" value="{{ $course -> name_teacher  }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="maxNum"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Max Number') }}</label>
                                        <div class="col-md-4">
                                            <input id="maxNum" type="number"
                                                   class="form-control{{ $errors->has('number_max') ? ' is-invalid' : '' }}"
                                                   name="number_max" value="{{ $course -> number_max }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fee"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Fee') }}</label>
                                        <div class="col-md-4">
                                            <input id="fee" type="number"
                                                   class="form-control{{ $errors->has('fee') ? ' is-invalid' : '' }}"
                                                   name="fee" value="{{ $course -> fee }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="date-start"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Date Start') }}</label>

                                        <div class="col-md-6">
                                            <input id="date_start" type="date"
                                                   class="form-control{{ $errors->has('start') ? ' is-invalid' : '' }}"
                                                   name="start" value="{{ $course -> start}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="date-end"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Date End') }}</label>

                                        <div class="col-md-6">
                                            <input id="date_end" type="date"
                                                   class="form-control{{ $errors->has('end') ? ' is-invalid' : '' }}"
                                                   name="end" value="{{ $course -> end}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <button class="btn btn-default">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection
