<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ $list_name }}
            </div>
            <div class="card-body">
                @if ($list_tasks->count())
                    <table class="table">
                        @foreach($list_tasks as $task)
                            @if ($loop->iteration == 6 && !Auth::user()->has_free_access && !Auth::user()->subscribed())
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <h3>{{ trans('admin.manage_checklists.tasks.show.content.you_are_limited') }}</h3>
                                        <a href="/billing" class="btn btn-primary">{{ trans('admin.manage_checklists.tasks.show.content.unlock_all_now') }}</a>
                                    </td>
                                </tr>
                            @elseif ($loop->iteration <= 5 || Auth::user()->has_free_access || Auth::user()->subscribed())
                                <tr>
                                    <td width="5%">
                                        <input type="checkbox" wire:click="complete_task({{ $task->id }})"
                                               @if (in_array($task->id, $completed_tasks)) checked="checked" @endif />
                                    </td>
                                    <td width="90%">
                                        <a wire:click.prevent="toggle_task({{$task->id }})"
                                           href="#">{{ $task->name }}</a>
                                        @if ($user_tasks->where('task_id', $task->id)->first())
                                            <div style="font-style: italic; font-size: 11px">
                                                @if ($list_type)
                                                    {{ $task->checklist->name }} |
                                                @endif
                                                @if ($user_tasks->where('task_id', $task->id)->first()->added_to_my_day_at)
                                                    <span class="mr-2">
                                                    &#9788;
                                                    {{ trans('admin.manage_checklists.tasks.my_day.title') }}
                                                </span>
                                                @endif
                                                @if ($user_tasks->where('task_id', $task->id)->first()->due_date)
                                                    <span class="mr-2">
                                                    &#9745;&nbsp;
                                                    {{ trans('admin.manage_checklists.tasks.show.content.due') }} {{ $user_tasks->where('task_id', $task->id)->first()->due_date->format('M d, Y') }}
                                                    </span>
                                                @endif
                                                @if ($user_tasks->where('task_id', $task->id)->first()->reminder_at)
                                                    <span class="mr-2">
                                                    &#9993;
                                                    </span>
                                                @endif
                                                @if ($user_tasks->where('task_id', $task->id)->first()->note)
                                                    <span class="mr-2">
                                                    &#9998;
                                                    </span>
                                                @endif
                                            </div>
                                        @endif
                                    </td>
                                    <td width="5%">
                                        @if (optional($user_tasks->where('task_id', $task->id)->first())->is_important)
                                            <a wire:click.prevent="mark_as_important({{ $task->id }})"
                                               href="#">&starf;</a>
                                        @else
                                            <a wire:click.prevent="mark_as_important({{ $task->id }})"
                                               href="#">&star;</a>
                                        @endif
                                    </td>
                                </tr>
                                @if (in_array($task->id, $opened_tasks))
                                    <tr>
                                        <td></td>
                                        <td colspan="3">{!! $task->description !!}</td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </table>
                @else
                    {{ trans('admin.manage_checklists.tasks.show.content.no_tasks_found') }}
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        @if (!is_null($current_task))
            <div class="card">
                <div class="card-body">
                    <div class="float-right">
                        @if ($current_task->is_important)
                            <a wire:click.prevent="mark_as_important({{ $current_task->id }})" href="#">&starf;</a>
                        @else
                            <a wire:click.prevent="mark_as_important({{ $current_task->id }})" href="#">&star;</a>
                        @endif
                    </div>
                    <b>{{ $current_task->name }}</b>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    &#9788;
                    &nbsp;
                    @if ($current_task->added_to_my_day_at)
                        <a wire:click.prevent="add_to_my_day({{ $current_task->id }})"
                           href="#">{{ trans('admin.manage_checklists.tasks.show.content.remove_from_my_day') }}</a>
                    @else
                        <a wire:click.prevent="add_to_my_day({{ $current_task->id }})"
                           href="#">{{ trans('admin.manage_checklists.tasks.show.content.add_to_my_day') }}</a>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    &#9993;
                    &nbsp;
                    @if ($current_task->reminder_at)
                        {{ trans('admin.manage_checklists.tasks.show.content.reminder_to_be_sent_at') }} {{ $current_task->reminder_at->format('M j, Y H:i') }}
                        &nbsp;&nbsp;
                        <a wire:click.prevent="set_reminder({{ $current_task->id }})" href="#">{{ trans('admin.manage_checklists.tasks.show.content.remove') }}</a>
                    @else
                        <a wire:click.prevent="toggle_reminder" href="#">{{ trans('admin.manage_checklists.tasks.show.content.remind_me') }}</a>
                        @if ($reminder_opened)
                            <ul>
                                <li>
                                    <a wire:click.prevent="set_reminder({{ $current_task->id }}, '{{ today()->addDay()->toDateString() }}')"
                                       href="#">{{ trans('admin.manage_checklists.tasks.show.content.tomorrow') }} {{ date('H') }}:00</a>
                                </li>
                                <li>
                                    <a wire:click.prevent="set_reminder({{ $current_task->id }}, '{{ today()->addWeek()->startOfWeek()->toDateString() }}')"
                                       href="#">{{ trans('admin.manage_checklists.tasks.show.content.next_monday') }} {{ date('H') }}:00</a>
                                </li>
                                <li>
                                    {{ trans('admin.manage_checklists.tasks.show.content.or_pick_a_date_and_time') }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input wire:model="reminder_date" class="form-control" type="date"/>
                                        </div>
                                        <div class="col-md-3">
                                            <select wire:model="reminder_hour" class="form-control">
                                                @foreach (range(0,23) as $hour)
                                                    <option value="{{ $hour }}">{{ $hour }}:00</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <button wire:click.prevent="set_reminder({{ $current_task->id }}, 'custom')"
                                                    class="btn btn-primary">{{ trans('admin.manage_checklists.tasks.show.content.save') }}</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endif
                    @endif
                    <hr/>
                    &#9745;
                    &nbsp;
                    @if ($current_task->due_date)
                        Due {{ $current_task->due_date->format('M j, Y') }}
                        &nbsp;&nbsp;
                        <a wire:click.prevent="set_due_date({{ $current_task->id }})" href="#">{{ trans('admin.manage_checklists.tasks.show.content.remove') }}</a>
                    @else
                        <a wire:click.prevent="toggle_due_date" href="#">{{ trans('admin.manage_checklists.tasks.show.content.add_due_date') }}</a>
                        @if ($due_date_opened)
                            <ul>
                                <li>
                                    <a wire:click.prevent="set_due_date({{ $current_task->id }}, '{{ today()->toDateString() }}')"
                                       href="#">{{ trans('admin.manage_checklists.tasks.show.content.today') }}</a>
                                </li>
                                <li>
                                    <a wire:click.prevent="set_due_date({{ $current_task->id }}, '{{ today()->addDay()->toDateString() }}')"
                                       href="#">{{ trans('admin.manage_checklists.tasks.show.content.tomorrow') }}</a>
                                </li>
                                <li>
                                    <a wire:click.prevent="set_due_date({{ $current_task->id }}, '{{ today()->addWeek()->startOfWeek()->toDateString() }}')"
                                       href="#">{{ trans('admin.manage_checklists.tasks.show.content.next_week') }}</a>
                                </li>
                                <li>
                                    {{ trans('admin.manage_checklists.tasks.show.content.or_pick_a_date') }}
                                    <br/>
                                    <input wire:model="due_date" type="date"/>
                                </li>
                            </ul>
                        @endif
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    &#9998;
                    &nbsp;
                    @if ($current_task->note)
                        <a wire:click.prevent="toggle_note" href="#">{{ trans('admin.manage_checklists.note.title') }}</a>
                        @if (!$note_opened)
                            <p>
                                {{ $current_task->note }}
                                <br/>
                                <a wire:click.prevent="toggle_note" href="#">{{ trans('admin.manage_checklists.note.edit.title') }}</a>
                            </p>
                        @endif
                    @else
                        <a wire:click.prevent="toggle_note" href="#">{{ trans('admin.manage_checklists.note.title') }}</a>
                    @endif
                    @if ($note_opened)
                        <div class="mt-4">
                            <textarea wire:model="note" class="form-control" rows="5"></textarea>
                            <button wire:click="save_note"
                                    class="btn btn-sm btn-primary mt-2">{{ trans('admin.manage_checklists.note.edit.content.save') }}</button>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
