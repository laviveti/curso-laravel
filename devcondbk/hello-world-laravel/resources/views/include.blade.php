<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Include</title>
</head>
<body>
  <h1>
    Include page
  </h1>

  <section>
    @includeFirst(['components.component2', 'components.component1'])
  </section>
</body>
</html>

{{--

  @includeif('components.component2')
    Exibe o componente existir, exiba-o
  @includeWhen($isAdmin, 'components.component')
    Se a variável for true, exiba o componente
  @includeUnless($isAdmin, 'components.component')
    Se a variável for false, exiba o componente
  @includeFirst(['components.component2', 'components.component1'])
    Exiba o primeiro componente que existir
--}}
