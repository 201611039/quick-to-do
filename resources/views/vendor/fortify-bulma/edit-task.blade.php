@extends('vendor.fortify-bulma.layout')

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-content">
            <form action="{{ route('task.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="columns">
                    <div class="column is-three-quarters">
                        <div class="field">
                            <label class="label">Task</label>
                            <div class="control">
                              <input value="{{ old('name')??$task->name }}" class="input @error('name') is-danger @enderror" name="name" type="text" placeholder="What's your task ">
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
                            <button type="submit" class="button is-primary" style="margin-top: 30px">Update Task</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
