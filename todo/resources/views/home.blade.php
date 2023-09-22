<x-layout>

  <x-slot:btn>
    <a href="{{ route('task.create') }}" class="btn btn-primary">
      Criar Tarefa
    </a>
  </x-slot:btn>

  <section class="graph">
    <div class="graph_header">
      <h2>Progresso do Dia</h2>
      <div class="graph_header-line"></div>
      <div class="graph_header-date">
        <img src="/assets/images/icon-prev.png" alt="Anterior">
        13 de Dez
        <img src="/assets/images/icon-next.png" alt="Próximo">
      </div>

    </div>
    <div class="graph_subtitle"> Tarefas: <b>3/6</b> </div>

    <div class="graph-placeholder">
      {{-- Gráfico feito em CSS --}}
    </div>
    <div class="tasks_left_footer">
      <img src="/assets/images/icon-info.png" alt="">
      Restam 3 tarefas para serem realizadas
    </div>

  </section>

  <section class="list">
    <div class="list_header">
      <select class="list_header-select">
        <option value="1">Todas as tarefas</option>
      </select>
    </div>
    <div class="task_list">

      @foreach ($tasks as $task)
        <x-task :task=$task></x-task>
      @endforeach

    </div>
  </section>
</x-layout>