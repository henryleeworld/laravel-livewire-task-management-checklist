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

                        <form action="{{ route('admin.checklist_groups.update', $checklistGroup) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header">{{ trans('admin.manage_checklists.checklist_group.edit.title') }}</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="checklist-group-name">{{ trans('admin.manage_checklists.checklist_group.edit.content.name') }}</label>
                                            <input value="{{ $checklistGroup->name }}" class="form-control" name="name" type="text" id="checklist-group-name" required autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit"> {{ trans('admin.manage_checklists.checklist_group.edit.content.save') }}</button>
                            </div>
                        </form>
                    </div>

                    <form action="{{ route('admin.checklist_groups.destroy', $checklistGroup) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('{{ trans('admin.manage_checklists.checklist_group.edit.content.are_you_sure') }}')"> {{ trans('admin.manage_checklists.checklist_group.edit.content.delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
