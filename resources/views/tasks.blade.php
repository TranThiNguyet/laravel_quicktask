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
                    <form action="{{ route('tasks.store') }}" method="post" class="form-horizontal">
                        @csrf
                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">{{ __('Task') }}</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="name" class="form-control" value="">
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
                                            <!-- TODO: Delete Button -->
                                            <a class="btn btn-primary btn-sm" href="">
                                                <i class="fas fa-edit">{{ __('Update') }}</i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm"
                                            onclick="">
                                                <i class="fas fa-trash">{{ __('Delete') }}</i>
                                            </a>
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
