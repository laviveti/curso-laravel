<x-layout pageTitle="B7Web Todo - Criar Tarefa">

    <x-slot:btn>
        <a href=" {{ route('home') }} " class="btn btn-primary">Voltar</a>
    </x-slot:btn>

    <section id="create_task_section">
        <h1>Criar uma nova tarefa</h1>

        <form action="">

            <x-form.text_input name="title" label="Título da tarefa" placeholder="Digite o nome da tarefa" required />
            <x-form.text_input name="due_date" label="Data de realização:" type="date" required />



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

            <div class="inputArea">
                <button class="btn btn-primary" type="submit">Criar tarefa</button>
            </div>
        </form>

    </section>

</x-layout>
