<x-layout>

  <x-slot:btn>
    <a
      href="{{ route('home') }}"
      class="btn btn-primary"
    >Voltar</a>
  </x-slot:btn>

  <section id="task_section">
    <h1>Editar tarefa</h1>

    <form
      method="POST"
      action="{{ route('task.edit_action') }}"
    >
      @csrf

      <x-form.text-input
        name="title"
        label="Título da tarefa"
        placeholder="Digite o nome da tarefa"
        required
      />
      <x-form.text-input
        type="date"
        name="due_date"
        label="Data de realização"
      />


      <x-form.select-input
        name="category_id"
        label="Categoria"
      >
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
      </x-form.select-input>

      <x-form.textarea-input
        name="description"
        label="Descrição"
        placeholder="Digite uma descrição para sua tarefa
    "
      ></x-form.textarea-input>
      {{-- Não abrir/espaçar a tag --}}

      <x-form.form-button
        submitLabel="Criar tarefa"
        resetLabel="Limpar formulário"
      />

    </form>

  </section>

</x-layout>
