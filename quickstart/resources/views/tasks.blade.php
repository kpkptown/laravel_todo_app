@extends('layouts.app')
@section('content')
    <div class="container">
            <div class="col-10 mt-4">
                <div class="card h5 font-weight-normal">
                    <div class="card-header">
                        New Task
                    </div>

                    <div class="card-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')

                        <!-- New Task Form -->
                        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}

                            <!-- Task Name -->
                            <div class="form-group">
                                <label for="task-name" class="col-3 control-label">Task</label>
                                <div class="col-6">
                                    <input type="text" name="name" id="task-name" class="form-control">
                                </div>
                            </div>

                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>AddTask
                                </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- TODO: Current Tasks -->
                @if (count($tasks) > 0)
                    <div class="card mt-4">
                        <div class="card-header">
                            現在のタスク
                        </div>

                        <div class="card-body">
                            <table class="table table-striped task-table">

                                <!-- テーブルヘッダ -->
                                <thead>
                                    <th>Task</th>
                                    <th>&nbsp;</th>
                                </thead>

                                <!-- テーブル本体 -->
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <!-- タスク名 -->
                                            <td class="table-text">
                                                <div>
                                                    <span class="align-middle">{{ $task->name }}</span>
                                                </div>
                                            </td>

                                            <!-- Delete Button -->
                                            <td>
                                                <form action="{{ url('task/'.$task->id )}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button class="btn btn-secondary">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
    </div>
@endsection
