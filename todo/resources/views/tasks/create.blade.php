<x-layout pageTitle="B7Web Todo - Criar Tarefa">

  <x-slot:btn>
    <a href=" {{ route('home') }} " class="btn btn-primary">Voltar</a>
  </x-slot:btn>

  <section id="create_task_section">
    <h1>Criar tarefa</h1>
    <div class="inputArea">
      <label for="title">Título da tarefa:</label>
      <input type="text" name="title" placeholder="Digite o título da tarefa" required />
    </div>
    <div class="inputArea">
      <label for="title">Título da tarefa:</label>
      <input type="text" name="title" placeholder="Digite o título da tarefa" required />
    </div>
  </section>

</x-layout>
