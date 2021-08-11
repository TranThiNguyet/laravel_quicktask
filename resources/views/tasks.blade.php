@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alert')
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ __('new_task') }}
                </div>
                <div class="panel-body">
                    <!-- New Task Form -->
                    <form action="{{isset($task) ? route('tasks.update',$task->id) : route('tasks.store') }}" method="post" class="form-horizontal">
                        @csrf
                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">{{ __('Task') }}</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name',isset($task->name) ? $task->name : '')}}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>{{ __('add_task') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>  
            </div>
            <!-- Current Tasks -->
            @if (isset($tasks) && count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="cpanel-heading">
                        {{ __('current_tasks') }}
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">

                            <!-- Table Headings -->
                            <thead>
                                <th>{{ __('Task') }}</th>
                                <th>&nbsp;</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>

                                        <td>
                                            <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}"
                                                method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>{{ __(' Delete') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $tasks->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
