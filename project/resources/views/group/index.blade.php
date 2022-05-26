@extends('layouts.app')
@section('content')

<div class="container">
    <div class="pb-2">
        <a class="btn btn-secondary " href="{{route('project.index') }}">Projects list</a>
        <a class="btn btn-secondary" href="{{route('group.index') }}">Group list</a>
        <a class="btn btn-secondary" href="{{route('student.index') }}">Student list</a>
    </div>
    <div class="pb-2">
        <h1>Project group list</h1>
        <a class="btn btn-primary" href="{{route('group.create') }}">Add group </a>
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
 
      <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Students per group</th>
                <th>Project title</th>
                
                <th class="col-2" colspan="3">Action</th>
            </tr>
           
            @foreach ($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->title }}</td>
                    <td>{{ $group->getProject->students_number }}</td>
                    <td>{{ $group->getProject->title}}</td>
                    <td><a class="btn btn-primary" href="{{route('group.show', [$group])}}">Show</a></td>
                    <td><a class="btn btn-secondary" href="{{route('group.edit', [$group])}}">Edit</a></td>
                    <td>
                        <form method="post" action="{{route('group.destroy', [$group])}}">
                            <button class="btn btn-danger" type="submit">Delete</button>
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
</div>
@endsection