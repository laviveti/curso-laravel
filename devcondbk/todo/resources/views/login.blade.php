<x-layout pageTitle="B7Web Todo - Criar Tarefa">

  <section id="task_section">
    <h1>Entre com sua conta</h1>

    @if ($errors->any())
      <ul class="alert alert-error">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    <form
      method="POST"
      action="{{ route('user.login_action') }}"
    >
      @csrf

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
        submitLabel="Entrar"
        resetLabel="Limpar"
      />

    </form>

  </section>

</x-layout>
