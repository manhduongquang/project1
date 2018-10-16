@extends('layouts.app')

@section('content')
    @guest
        <li>You are not login, please log in <a href="{{ route('store') }}">here</a></li>
    @else
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">This is Courses</div>
                    <div class="card-body">
                        @if($courses -> isEmpty())
                            <p>No course</p>
                        @else
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <td>Name course</td>
                                        <td>Teacher</td>
                                        <td>Max student</td>
                                        <td>Fee</td>
                                        <td>Time start</td>
                                        <td>Time end</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courses as $course)
                                        <tr>
                                            <td><a href="{{ action('CourseController@show', $course->id) }}">{{ $course -> name }} </a></td>
                                            <td>{{ $course -> name_teacher }}</td>
                                            <td>{{ $course -> number_max }}</td>
                                            <td>{{ $course -> fee }}</td>
                                            <td>{{ $course -> start }}</td>
                                            <td>{{ $course -> end }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endguest
@endsection
