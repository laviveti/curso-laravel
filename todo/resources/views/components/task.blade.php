<div class="task">
  <div class="title">
    <input type="checkbox" @if ($task->is_done) checked @endif />
    <div class="task_title">{{ $task->title ?? 'Título da tarefa indisponível' }}</div>
  </div>
  <div class="priority">
    <div class="sphere" style="background-color: {{ $task->category->color }}"></div>
    <div>{{ $task->category->title ?? 'Categoria indisponível' }}</div>
  </div>
  <div class="actions">
    <a href="{{ route('task.edit', ['id' => $task->id]) }}">
      <img src="/assets/images/icon-edit.png" alt="Editar tarefa">
    </a>
    <a href="{{ route('task.delete', ['id' => $task->id]) }}">
      <img src="/assets/images/icon-delete.png" alt="Excluir tarefa">
    </a>
  </div>
</div>
