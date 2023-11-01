<x-layout>

  <x-slot:btn>
    <a
      href="{{ route('task.create') }}"
      class="btn btn-primary"
    >
      Criar Tarefa
    </a>
    <a
      href="{{ route('logout') }}"
      class="btn btn-primary"
    >
      Sair
    </a>
  </x-slot:btn>

  <section class="graph">
    <div class="graph_header">
      {{-- {{ $authUser-> }} --}}
      <h2>Progresso do Dia</h2>
      <div class="graph_header-line"></div>
      <div class="graph_header-date">
        <a href="{{ route('home', ['date' => $date_prev_button]) }}">
          <img
            src="/assets/images/icon-prev.png"
            alt="Anterior"
          >
        </a>
        {{ $date_as_string }}
        <a href="{{ route('home', ['date' => $date_next_button]) }}">
          <img
            src="/assets/images/icon-next.png"
            alt="Próximo"
          >
        </a>
      </div>

    </div>
    <div class="graph_subtitle"> Tarefas: <b>3/6</b> </div>

    <div class="graph-placeholder">
      {{-- Gráfico feito em CSS --}}
    </div>
    <div class="tasks_left_footer">
      <img
        src="/assets/images/icon-info.png"
        alt=""
      >
      @if ($undone_tasks_count == 0)
        Todas as tarefas foram realizadas
      @elseif ($undone_tasks_count == 1)
        Resta {{ $undone_tasks_count }} tarefa para ser realizada
      @else
        Restam {{ $undone_tasks_count }} tarefas para serem realizadas
      @endif
    </div>

  </section>

  <section class="list">
    <div class="list_header">
      <select
        class="list_header-select"
        onchange="changeTaskStatusFilter(this)"
      >
        <option value="all_tasks">Todas as tarefas</option>
        <option value="task_pending">Tarefas pendentes</option>
        <option value="task_done">Tarefas realizadas</option>
      </select>
    </div>
    <div class="task_list">

      @foreach ($tasks as $task)
        <x-task :task=$task></x-task>
      @endforeach

    </div>


    <script>
      function changeTaskStatusFilter(element) {
        showAllTasks();
        if (element.value === 'task_pending') {
          document.querySelectorAll('.task_done').forEach(element => {
            element.style.display = 'none';
          });
        }
        if (element.value === 'task_done') {
          element.style.display = 'none';
        }
      }

      function showAllTasks() {
        document.querySelectorAll('.task').forEach(element => {
          element.style.display = 'block';
        })
      }
    </script>

    <script>
      async function taskUpdate(element) {
        let status = element.checked;
        let taskId = element.dataset.id;
        let url = '{{ route('task.update') }}';
        let rawResult = await fetch(url, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'accept': 'application/json'
          },
          body: JSON.stringify({
            status,
            taskId,
            _token: '{{ csrf_token() }}'
          })
        })
        let result = await rawResult.json()
        console.log(result);
        if (result.success) {
          alert('Tarefa atualizada com sucesso');
        } else {
          element.checked = !status
        }
      }
    </script>
  </section>
</x-layout>
