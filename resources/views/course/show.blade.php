@extends('layouts.app')

@section('content')
    @guest
        <li>You are not login, please log in <a href="{{ route('store') }}">here</a></li>
    @else
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header ">
                        <h5 class="float-left">Khóa Học: {{ $course->name }}</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Tên giáo viên</td>
                                <td>{{ $course->name_teacher }} </td>
                            </tr>
                            <tr>
                                <td>Học phí</td>
                                <td> {{ $course->fee }}</td>
                            </tr>
                            <tr>
                                <td>Số lương đăng ký tối đa</td>
                                <td>{{ $course->number_max }} </td>
                            </tr>
                            <tr>
                                <td>Số lương đã đăng ký</td>
                                <td>{{ $course->number_user }} </td>
                            </tr>
                            <tr>
                                <td>Ngày bắt đầu</td>
                                <td>{{ $course->start }} </td>
                            </tr>
                            <tr>
                                <td>Ngày kết thúc</td>
                                <td>{{ $course->end }} </td>
                            </tr>
                        </table>
                        <a href="{{ action('CourseController@edit', $course->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ action('CourseController@destroy', $course->id) }}" class="btn btn-info">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endguest
@endsection
