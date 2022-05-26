@extends('layouts.app')
@section('content')

<div class="container">
<a class="btn btn-secondary" href="{{route('project.index') }}">Projects list</a>
<a class="btn btn-secondary" href="{{route('group.index') }}">Group list</a>
<a class="btn btn-secondary" href="{{route('student.index') }}">Student list</a>

    <h1>Add group</h1>

<form class="form-control" action="{{ route('group.store') }}" method="POST">

    Title: <input class="form-control" name="group_title" type="text" placeholder="Group title">
    Student number: <input class="form-control" name="group_student_number" type="numebr" placeholder="Group student number">
    
    
    @csrf

    Project:  <select class="form-select" name="group_project_id">
                @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                @endforeach
            </select>

    <input class="btn btn-primary" type="submit" value="Add">
    <a class="btn btn-secondary" href="{{ route('group.index') }}">Back to list</a>

</form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection