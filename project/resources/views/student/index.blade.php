@extends('layouts.app')
@section('content')

<div class = "container">
<a class="btn btn-secondary" href="{{route('project.index') }}">Projects list</a>
<a class="btn btn-secondary" href="{{route('group.index') }}">Group list</a>
<a class="btn btn-secondary" href="{{route('student.index') }}">Student list</a>    
       
    <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>In project</th>
                <th>In group</th>
                <th class="col-2" colspan="3">Action</th>
            </tr>
           
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>Project</td>
                    <td>Group</td>
                      
                    <td><a class="btn btn-primary" href="{{route('student.show', [$student])}}">Show</a></td>
                    <td><a class="btn btn-secondary" href="{{route('student.edit', [$student])}}">Edit</a></td>
                    <td>
                        <form method="post" action="{{route('student.destroy', [$student])}}">
                            <button class="btn btn-danger" type="submit">Delete</button>
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
    </table>
<a class="btn btn-primary" href="{{route('student.create') }}">Add student </a>
<a class="btn btn-primary" href="{{route('attendancegroup.index') }}">Asign students to the group </a>    

</div>
     

@endsection