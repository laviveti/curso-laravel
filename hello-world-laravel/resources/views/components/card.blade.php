<div class="card_main">
  <div class="card_image">
    <img src="{{$image}}" alt="Foto do usuário"/>
  </div>
  <div class="card_content">
    <p class="card_content--name">Nome: <span>{{$name}}</span></p>
    <p>Idade: <span>{{$age}} anos</span></p>
    <p>Data de nascimento: <span>{{$birthDate}}</span></p>
  </div>
</div>

<style>
  .card_main {
    width: fit-content;
    padding: 8px;
    box-shadow: 0 0 8px rgba(0,0,0,0.2);
    border-radius: 4px;
  }
  .card_content span {
    font-weight: bold;
  }
  .card_content--name {
    font-size: 24px
  }
  .card_image {
    width: 240px;
    height: 240px;
  }
  .card_image img {
    border-radius: 8px;
    width: 100%;
    height: 100%;
  }
</style>
