@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if ($errors->storetask->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->storetask->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form
                            action="{{ route('admin.checklists.tasks.update', [$checklist, $task]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header">{{ trans('admin.manage_checklists.tasks.edit.title') }}</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="task-name">{{ trans('admin.manage_checklists.tasks.edit.content.name') }}</label>
                                            <input value="{{ $task->name }}" class="form-control" name="name" type="text" id="task-name" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="task-textarea">{{ trans('admin.manage_checklists.tasks.edit.content.description') }}</label>
                                            <textarea class="form-control" name="description" rows="5" id="task-textarea">{{ $task->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit"> {{ trans('admin.manage_checklists.tasks.edit.content.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.ckeditor')
@endsection

