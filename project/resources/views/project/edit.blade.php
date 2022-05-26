@extends('layouts.app')
@section('content')

<div class="container">
<a class="btn btn-secondary" href="{{route('project.index') }}">Projects list</a>
<a class="btn btn-secondary" href="{{route('group.index') }}">Group list</a>
<a class="btn btn-secondary" href="{{route('student.index') }}">Student list</a>

<h1>Edit project </h1>
    
<form class="form-control" action="{{ route('project.update',['project'=>$project]) }}" method="POST">
Title:<input  class="form-control" name="project_title" type="text" placeholder="Title" value="{{ $project->title }}">
Number og groups: <input class="form-control" name="project_groups_number" type="number" placeholder="Number" value="{{ $project->groups_number }}">
Students per group: <input class="form-control" name="project_students_number" type="number" placeholder="Number" value="{{ $project->students_number }}">

@csrf

<input class="btn btn-primary" type="submit" value="Update">


</form>
</div>
@endsection