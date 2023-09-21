<x-layout pageTitle="B7Web Todo - Criar Tarefa">

  <x-slot:btn>
    <a href=" {{ route('home') }} " class="btn btn-primary">Voltar</a>
  </x-slot:btn>

  <section id="create_task_section">
    <h1>Criar tarefa</h1>
    <form action="">
      <div class="inputArea">
        <label for="title">Título da tarefa:</label>
        <input type="text" id="title" name="title" placeholder="Digite o título da tarefa" required />
      </div>
      <div class="inputArea">
        <label for="due_date">Data de realização:</label>
        <input type="date" id="due_date" name="due_date" required />
      </div>
      <div class="inputArea">
        <label for="category">Categoria:</label>
        <select id="category" name="category" required>
          <div class="select-container"></div>
          <option value="" selected disabled>Selecione a categoria</option>
          <option>Valor qualquer</option>
        </select>
      </div>
      <div class="inputArea">
        <label for="description">Descrição:</label>
        <textarea id="description" name="description" placeholder="Digite uma descrição para sua tarefa"></textarea>
      </div>
    </form>
  </section>

</x-layout>
