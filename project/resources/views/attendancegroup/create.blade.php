@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Project groups list</h1>     
</div> 

        @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{session()->get('error_message')}}
        </div>
        @endif

        @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{session()->get('success_message')}}
                    success_message
                </div>
        @endif


        @if (count($groups) == 0)
            <p>There is no groups</p>
        @endif
      
    <form class="form-control" action="{{ route('attendancegroup.store') }}" method="POST">
    @csrf
        @foreach ($groups as $group)
            ID:<p>{{ $group->id }}</p>
            Group name  <input class="form-control" name="group_id"  value="{{ $group->id }}">
            Student:  <select class="form-select" name="student_id">
                                    @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                        </select>
            <input class="btn btn-primary" type="submit" value="Add">
            <a class="btn btn-secondary" href="{{ route('attendancegroup.index') }}">Back to list</a>
        @endforeach
    </form>
    
    <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Group</th>
                                
                <th class="col-2" colspan="3">Action</th>
            </tr>
           
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    @if (empty($student->getStudentGroup->title))
                    <td>-</td>
                    @else 
                    <td>{{ $student->getStudentGroup->title }}</td>  
                    @endif
                        
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
</div>
@endsection