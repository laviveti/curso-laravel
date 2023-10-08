<x-layout pageTitle="B7Web Todo - Criar Tarefa">

  <x-slot:btn>
    <a
      href=" {{ route('home') }} "
      class="btn btn-primary"
    >
      Voltar
    </a>
  </x-slot:btn>

  <section id="task_section">
    <h1>Criar uma nova conta</h1>

    <form
      method="POST"
      action="{{ route('user.register_action') }}"
    >
      @csrf

      <x-form.text-input
        name="name"
        label="Seu nome"
        placeholder="Seu nome"
        required
      />
      <x-form.text-input
        type="email"
        name="email"
        label="Seu e-mail"
        placeholder="Seu e-mail"
      />
      <x-form.text-input
        type="password"
        name="password"
        label="Sua senha"
        placeholder="Sua senha"
      />

      <x-form.form-button
        submitLabel="Registrar-me"
        resetLabel="Limpar"
      />

    </form>

  </section>

</x-layout>
