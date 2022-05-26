@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Project students list</h1>     
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

        @if (count($students) == 0)
            <p>There is no students</p>
        @endif
 
    <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <!-- <th>Group</th> -->
                                
                <th class="col-2" colspan="3">Action</th>
            </tr>
           
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                   
                        
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

    <h2>Project groups list</h2>

        @if (count($groups) == 0)
            <p>There is no groups</p>
        @endif
      

    
             
            @foreach ($attendancegroups as $attendancegroup)
         
            <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Group</th>
                        <th>Student</th>
                                        
                        <th class="col-2" colspan="3">Action</th>
                    </tr>
            
            <tr>
                    <td class="col-sm-3">{{ $attendancegroup->id }}</td>
                    <td class="col-sm-3">{{ $attendancegroup->getStudentGroup->title }}</td>
                    <td class="col-sm-3">{{ $attendancegroup->getStudent->name }}</td>
                   
                        
                    <td><a class="btn btn-primary" href="{{route('attendancegroup.show', [$attendancegroup])}}">Show</a></td>
                    <td><a class="btn btn-secondary" href="{{route('attendancegroup.edit', [$attendancegroup])}}">Edit</a></td>
                    <td>
                        <form method="post" action="{{route('attendancegroup.destroy', [$attendancegroup])}}">
                            <button class="btn btn-danger" type="submit">Delete</button>
                            @csrf
                        </form>
                    </td>
                </tr>
                </table>
            @endforeach

</div>
@endsection