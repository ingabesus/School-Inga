@extends('layouts.app')
@section('content')

<div class="container">
    <div class="pb-2">
        <a class="btn btn-secondary" href="{{route('project.index') }}">Projects list</a>
        <a class="btn btn-secondary" href="{{route('group.index') }}">Group list</a>
        <a class="btn btn-secondary" href="{{route('student.index') }}">Student list</a>
    <div>
    <div class="pb-2">
        <h1> Projects </h1>
        <a class="btn btn-primary" href="{{route('project.create')}}">Create new project</a> 
    </div>

@if (count($projects) == 0)
    <p>There is no projects</p>
@endif

<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Groups</th>
        <th>Students</th>
        <th colspan="3">Action</th>
    
    </tr>
  
        @foreach ($projects as $project)
        <tr>
            <td>{{$project->id}}</td>
            <td>{{$project->title}}</td>
            <td>{{$project->groups_number}}</td>
            <td>{{$project->students_number}} </td>
            <td><a class="btn btn-primary" href="{{route('project.edit', [$project])}}">Edit</a></td> 
            <td><a class="btn btn-secondary" href="{{route('project.show', [$project])}}">Show</a></td>
            <td>
                <form method="post" action="{{route('project.destroy', [$project])}}">
                @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            </td>
          
        </tr> 
        @endforeach
     
    </table>
</div>
    


</div>
@endsection

