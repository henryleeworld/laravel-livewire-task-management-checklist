@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form
                            action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header">{{ trans('admin.manage_checklists.checklist.edit.title') }}</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="checklist-name">{{ trans('admin.manage_checklists.checklist.edit.content.name') }}</label>
                                            <input value="{{ $checklist->name }}" class="form-control" name="name" type="text" id="checklist-name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit"> {{ trans('admin.manage_checklists.checklist.edit.content.save') }}</button>
                            </div>
                        </form>
                    </div>

                    <form
                        action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit"
                                onclick="return confirm('{{ trans('admin.manage_checklists.checklist.edit.content.are_you_sure') }}')"> {{ trans('admin.manage_checklists.checklist.edit.content.delete') }}</button>
                    </form>

                    <hr/>

                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i> {{ trans('admin.manage_checklists.tasks.show.title') }}</div>
                        <div class="card-body">
                            @livewire('tasks-table', ['checklist' => $checklist])
                        </div>
                    </div>

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
                            action="{{ route('admin.checklists.tasks.store', [$checklist]) }}" method="POST">
                            @csrf
                            <div class="card-header">{{ trans('admin.manage_checklists.tasks.create.title') }}</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="task-name">{{ trans('admin.manage_checklists.tasks.create.content.name') }}</label>
                                            <input value="{{ old('name') }}" class="form-control" name="name" type="text" id="task-name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="task-textarea">{{ trans('admin.manage_checklists.tasks.create.content.description') }}</label>
                                            <textarea class="form-control" name="description" rows="5" id="task-textarea">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit"> {{ trans('admin.manage_checklists.tasks.create.content.save') }}</button>
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
