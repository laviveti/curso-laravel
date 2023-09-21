<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TodoApp</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Rubik:wght@400;500&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style.css" />
</head>

<body>
  <div class="container">
    <div class="sidebar">
      <img src="/assets/images/logo.png" alt="Logo da aplicação" />
    </div>
    <div class="content">
      <nav>
        <a href="#" class="btn btn-primary">
          Criar Tarefa
        </a>
      </nav>
      <main>
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
            <div class="task">

              <div class="title">
                <input type="checkbox" />
                <div class="task_title">Título da tarefa</div>
              </div>
              <div class="priority">
                <div class="sphere"></div>
                <div>Categoria</div>
              </div>
              <div class="actions">
                <a href="#"><img src="/assets/images/icon-edit.png" alt="Editar"></a>
                <a href="#"><img src="/assets/images/icon-delete.png" alt="Editar"></a>
              </div>

            </div>
          </div>
        </section>
      </main>
    </div>
  </div>
</body>

</html>
