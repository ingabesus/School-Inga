@extends('layouts.app')
@section('content')

<div class="container">

<a class="btn btn-secondary" href="{{route('project.index') }}">Projects list</a>
<a class="btn btn-secondary" href="{{route('group.index') }}">Group list</a>
<a class="btn btn-secondary" href="{{route('student.index') }}">Student list</a>

    <h1>Project details</h1>
    
   
    <p>Project title: {{ $project->title }}</p>
    <p>Number of groups: {{ $project->groups_number }}</p>
    <p>Student per group: {{ $project->students_number }}</p>
    
  
    <a class="btn btn-primary" href="{{route('group.create') }}">Create group</a>
    
</br>
<h2>Students</h2> 
<table class="table table-striped">
            <tr>
                <th>Student</th>
                <th>Group</th>
                <th class="col-2" colspan="3">Action</th>
            </tr>
            @foreach ($students as $key => $student)

            <tr>
                <td>{{ $student->name }}</td>
                
                    @if (is_null($student->group_id)) 
                        <td>-</td>
                    @else
                        <td>
                        @php echo App\Http\Controllers\ProjectController::getGroupName($student->getStudentGroup->group_id);  @endphp
                        </td>
                    @endif
               
                <td>
                    <form method="post" action="{{route('student.destroy', [$student->id]) }}">
                            <button class="btn btn-danger" type="submit">Delete</button>
                            @csrf
                    </form> 
                </td>
            </tr>
            @endforeach       
            
</table>

<a class="btn btn-primary" href="{{route('student.create') }}">Add Student</a>

</br>
    <h2>Project groups</h2> 

<div class="row">

    @foreach ($groups as $group) 
    @php $till=0; 
    @endphp
    <div class="col-md-6 col-lg-4">
        
            <div class="card-header">
                <h2>
                {{ $group->title }}
                </h2>
            </div>
            <div class="card-body">
            <form class="form-control" method="POST" action="{{ route('attendancegroup.update', [$group->id]) }}">
                <input hidden value="{{ $group->project_id }}" name="project_id">
                <input hidden value="{{ $group->id }}" name="group_id">
                <ul class="list-group">
                    @php $students_count = 0; @endphp
                    @foreach ($attendancegroups as $attendancegroup)
                        @if ( $group->id == $attendancegroup->group_id )
                            <li class="list-group-item"><span>{{$attendancegroup->getStudent->name}}</span></li>
                            @php $students_count++; @endphp
                        @endif
                    @php $till = $project->students_number - $students_count; @endphp
                    @endforeach
                    @if ($till) 
                    @for ($i=0; $i<$till; $i++)
                    <li class="list-group-item">
                        <select id="students" class="form-select" name="student_id" size="1">
                            @foreach ($students as $student)
                                @if (is_null($student->group_id)) 
                                <option value="{{ $student->id }}">{{$student->name}}</option>
                                @endif
                            @endforeach
                        </select> 
                        <input class="btn btn-primary" type="submit" value="Add to group">
                        @csrf
                    </li>
                    @endfor
                    @endif
                </ul>  
            </form>
            </div>
        
    </div>
    @endforeach
    </div>

</div>
   

    
@endsection