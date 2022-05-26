@extends('layouts.app')
@section('content')

<div class="container">
<a class="btn btn-secondary" href="{{route('project.index') }}">Projects list</a>
<a class="btn btn-secondary" href="{{route('group.index') }}">Group list</a>
<a class="btn btn-secondary" href="{{route('student.index') }}">Student list</a>

    <h1>Group details</h1>
    
    <p>ID: {{$group->id}}</p>
    <p>Project: {{$group->getProject->title}}</p>
    <p>Group title: {{ $group->title }}</p>
    <p>Student per group: {{ $group->student_number }}</p>
   
           
    
    <form method="post" action="{{route('group.destroy', [$group])}}">
                <button class="btn btn-danger" type="submit">Delete group</button>
            @csrf
    </form>
    
    <a class="btn btn-primary" href="{{route('student.index') }}">Add students to the {{ $group->title }} group</a>
    

    
</div>
   

    
@endsection