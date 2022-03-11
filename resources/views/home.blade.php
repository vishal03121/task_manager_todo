@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                </div>
                <h5 class="card-header">
                    <a href="{{ route('todo.create') }}" class="btn btn-sm btn-outline-primary">Add Task</a>
                </h5>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <table class="table table-dark table-striped table-borderless table-hover">
                        <thead>
                          <tr class="row">
                            <th class="col-sm-3 pl-4">Tasks</th>
                            <th class="col-sm-3 pl-4">Created On</th>
                            <th class="col-sm-3 pl-4">Completed On</th>
                            <th class="col-sm-3 pl-4">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($todos as $todo)
                                <tr class="row">
                                    @if ($todo->completed)
                                        <td class="col-sm-3 pl-4"><a href="{{ route('todo.edit', $todo->id) }}" style="color: white"><s>{{ $todo->title }}</s></a></td>
                                        <td class="col-sm-3 pl-4"> {{ $todo->created_at }} </td>
                                        <td class="col-sm-3 pl-4"> {{ $todo->updated_at }} </td>
                                    @else
                                        <td class="col-sm-3 pl-4"><a href="{{ route('todo.edit', $todo->id) }}" style="color: white">{{ $todo->title }}</a></td>
                                        <td class="col-sm-3 pl-4"> {{ $todo->created_at }} </td>
                                        <td class="col-sm-3 pl-4"> -- </td>
                                    @endif
                                    <td class="col-sm-3 pl-4">
                                        <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-sm btn-outline-success"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="{{ route('todo.show', $todo->id) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="row">
                                    <td colspan=4><center>No Tasks To Show!!!</center></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
