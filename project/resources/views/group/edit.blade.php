@extends('layouts.app')
@section('content')

<div class="container">
<a class="btn btn-secondary" href="{{route('project.index') }}">Projects list</a>
<a class="btn btn-secondary" href="{{route('group.index') }}">Group list</a>
<a class="btn btn-secondary" href="{{route('student.index') }}">Student list</a>

<h1>Edit group </h1>
    
<form class="form-control" action="{{ route('group.update',['group'=>$group]) }}" method="POST">
Title:<input  class="form-control" name="group_title" type="text" placeholder="Title" value="{{ $group->title }}">
Students per groups: <input class="form-control" name="group_student_number" type="number" placeholder="Number" value="{{ $group->student_number }}">
Project: <input  class="form-control" name="group_project_id" type="number" placeholder="Project" value="{{ $group->project_id }}">
@csrf

<input class="btn btn-primary" type="submit" value="Update">
<a class="btn btn-secondary" href="{{ route('group.index') }}">Back to list</a>

</div>
@endsection