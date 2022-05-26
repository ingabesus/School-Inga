@extends('layouts.app')
@section('content')

<div class="container">

<a class="btn btn-secondary" href="{{route('project.index') }}">Projects list</a>
<a class="btn btn-secondary" href="{{route('group.index') }}">Group list</a>
<a class="btn btn-secondary" href="{{route('student.index') }}">Student list</a>

    <h1>Add student</h1>

   

<form class="form-control" action="{{ route('student.store') }}" method="POST">

    Name: <input class="form-control" name="student_name" type="text" placeholder="Student name, surname">
    <select class="form-select" name="project_id">
        <option value="" selected >Select project</option>

        @foreach ($projects as $project)
            <option value="{{ $project->id }}">{{ $project->title }}</option>
        @endforeach
    </select>
    <input class="btn btn-primary" type="submit" value="Add">
    <a class="btn btn-secondary" href="{{ route('student.index') }}">Back to list</a>
    @csrf
</form>

</div>
@endsection