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

                        <form action="{{ route('admin.checklist_groups.checklists.store', $checklistGroup) }}" method="POST">
                            @csrf
                        <div class="card-header">{{ trans('admin.manage_checklists.checklist.create.content.new_checklist_in') }} {{ $checklistGroup->name }}</div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="checklist-name">{{ trans('admin.manage_checklists.checklist.create.content.name') }}</label>
                                        <input value="{{ old('name') }}" class="form-control" name="name" type="text" placeholder="{{ trans('admin.manage_checklists.checklist.create.content.checklist_name') }}" id="checklist-name" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit"> {{ trans('admin.manage_checklists.checklist.create.content.save') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
