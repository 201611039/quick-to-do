@extends('fortify-bulma::layout')

@section('content')


<div class="container mt-4">
    <div class="card">
        <div class="card-content">
            <form action="{{ route('task.store') }}" method="POST">
                @csrf
                <div class="columns">
                    <div class="column is-three-quarters">
                        <div class="field">
                            <label class="label">Task</label>
                            <div class="control">
                              <input value="{{ old('name') }}" class="input @error('name') is-danger @enderror" name="name" type="text" placeholder="What's your task ">
                            </div>
                        </div>
                        @error('name')
                            <span class="help is-danger">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="column">
                        <div class="field">
                            <button type="submit" class="button is-primary" style="margin-top: 30px">Save Task</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @php
        $percentage = (request()->user()->completedTasks()->count() / request()->user()->tasks->count()) * 100
    @endphp
    <div style="margin-top: 5rem">
        <h4>Completion {{ $percentage }}%</h4>
        <progress class="progress is-primary" value="{{ $percentage }}" max="100">{{ $percentage }}%</progress>
    </div>


    <div class="card mt-4">
        <div class="card-header">
            <div class="card-header-title">
                Today Task List
            </div>
        </div>
        <div class="card-content">
            <table class="table is-fullwidth">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task</th>
                        <th class="has-text-centered">Status</th>
                        <th class="has-text-centered">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (request()->user()->tasks()->orderBy('id', 'desc')->get() as $key => $task)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            @if ($task->completed_at)
                                <strike>{{ $task->name }}</strike>
                            @else
                            {{ $task->name }}
                            @endif
                        </td>
                        <td class="has-text-centered">
                            @if ($task->status == 'pending')
                            <span class="tag is-danger">Pending</span>

                            @elseif ($task->status == 'completed')
                            <span class="tag is-success">Completed</span>

                            @elseif ($task->status == 'onprogress')
                            <span class="tag is-info">On Progress</span>
                            @endif
                        </td>
                        <td class="has-text-centered">
                            @if ($task->completed_at)
                            <a  href="javascript:void(0)" onclick="incompleteTask({{ $task }})" class="button is-warning is-small">Incomplete</a>
                            <form id="incomplete{{ $task->id }}" action="{{ route('task.incomplete', $task->id) }}" hidden method="post">@csrf</form>

                            @else
                            <a href="javascript:void(0)" onclick="completeTask({{ $task }})" class="button is-primary is-small">Complete</a>
                            <a href="{{ route('task.edit', $task->id) }}" class="button is-info is-small">Edit</a>
                            <a href="javascript:void(0)" onclick="removeTask({{ $task }})" class="button is-danger is-small">Delete</a>
                            @endif

                            <form id="complete{{ $task->id }}" action="{{ route('task.complete', $task->id) }}" hidden method="post">@csrf</form>
                            <form id="delete{{ $task->id }}" action="{{ route('task.destroy', $task->id) }}" hidden method="post">@csrf @method('DELETE')</form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection

@push('js')
    <script>

            function removeTask(task) {
                if (confirm('Are you sure? remove '+ task.name)) {
                    $('#delete'+task.id).submit();
                }
            }

            function completeTask(task) {
                if (confirm('Are you sure? make complete '+ task.name)) {
                    $('#complete'+task.id).submit();
                }
            }

            function incompleteTask(task) {
                if (confirm('Are you sure? make incomplete '+ task.name)) {
                    $('#incomplete'+task.id).submit();
                }
            }

    </script>
@endpush
