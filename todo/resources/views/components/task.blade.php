<div class="task">
  <div class="title">
    <input type="checkbox" @if ($data['done']) checked @endif />
    <div class="task_title">{{ $data['title'] ?? null }}</div>
  </div>
  <div class="priority">
    <div class="sphere"></div>
    <div>{{ $data['category'] ?? null }}</div>
  </div>
  <div class="actions">
    <a href="{{ route('task.edit') }}">
      <img src="/assets/images/icon-edit.png" alt="Editar tarefa">
    </a>
    <a href="{{ route('task.delete') }}">
      <img src="/assets/images/icon-delete.png" alt="Excluir tarefa">
    </a>
  </div>
</div>
