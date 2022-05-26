@extends('layouts.app')

@section('content')
<div class="container">
<a class="btn btn-secondary" href="{{route('project.index') }}">Projects list</a>
<a class="btn btn-secondary" href="{{route('group.index') }}">Group list</a>
<a class="btn btn-secondary" href="{{route('student.index') }}">Student list</a>

    <form method="POST" action="{{ route('project.store')}}">
        @csrf
        <div class="form-group">
            <label for="project_title">Title</label>
            <input class="form-control" type='text' name='project_title' />
        </div>
        <div class="form-group">
            <label for="project_groups_number">Group</label>
            <input class="form-control" type='number' name='project_groups_number' />
        </div>
        <div class="form-group">
            <label for="project_students_number">Student</label>
            <input class="form-control" type='number' name='project_students_number' />
        </div>         
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>        
    </form>    
</div>
    
@endsection