# Planejamento

## Entidades e Relacionamentos

- **Usuários**

  - Usuários x Tarefas
    - Um usuário pode criar várias tarefas
  - Usuários x Categorias
    - Um usuário pode criar ter várias categorias

- **Tarefas**

  - Tarefas x Usuários
    - Uma tarefa SEMPRE vai _pertencer_ à um único usuário
  - Tarefas x Categorias
    - Uma tarefa SEMPRE vai _pertencer_ à uma categoria

- **Categorias**

  - Categorias x Tarefas
    - Uma categoria pode ter várias tarefas
  - Categorias x Usuários
    - Uma categoria SEMPRE vai _pertencer_ à um usuário

## Detalhamento das Migrations

- **Users:**

  - Padrão do Laravel

- **Tasks:**

  - id
  - title
  - data
  - description
  - category_id
  - user_id

- **Categories:**
  - id
  - name
  - color (hex string)
  - user_id
