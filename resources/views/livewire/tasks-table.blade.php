<table class="table table-responsive-sm">
    <tbody>
    @foreach ($tasks as $task)
        <tr>
            <td>
                @if ($task->position > 1)
                <a wire:click.prevent="task_up({{ $task->id }})" href="#">
                    &uarr;
                </a>
                @endif
                @if ($task->position < $tasks->max('position'))
                <a wire:click.prevent="task_down({{ $task->id }})" href="#">
                    &darr;
                </a>
                @endif
            </td>
            <td>{{ $task->name }}</td>
            <td>
                <a class="btn btn-sm btn-primary"
                   href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}">{{ trans('admin.manage_checklists.tasks.edit.title') }}</a>
                <form style="display: inline-block"
                      action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('{{ trans('admin.manage_checklists.tasks.delete.content.are_you_sure') }}')"> {{ trans('admin.manage_checklists.tasks.delete.title') }}</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
