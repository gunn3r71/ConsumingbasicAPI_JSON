<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<?php
  $cep = $_GET['cep'];
  if(isset($cep) && $cep != ""){
    if(strlen($cep)>=8 && strlen($cep)<=9){
      $url = "https://viacep.com.br/ws/".$cep."/json/";
      $data = json_decode(file_get_contents($url),true);

      echo "
      <table class='table' border=1>
      <thead>
        <tr>
          <th scope='col'>Cep</th>
          <th scope='col'>Rua</th>
          <th scope='col'>Bairro</th>
          <th scope='col'>Cidade</th>
          <th scope='col'>Estado</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>".$data['cep']."</td>
          <td>".$data['logradouro']."</td>
          <td>".$data['bairro']."</td>
          <td>".$data['localidade']."</td>
          <td>".$data['uf']."</td>
      </tbody>
      ";
    } else{
      echo "
      <table class='table' border=1>
      <thead>
        <tr>
          <th scope='col'>Cep</th>
          <th scope='col'>Rua</th>
          <th scope='col'>Bairro</th>
          <th scope='col'>Cidade</th>
          <th scope='col'>Estado</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Não encontrado</td>
          <td>Não encontrado</td>
          <td>Não encontrado</td>
          <td>Não encontrado</td>
          <td>Não encontrado</td>
        </tr>
      </tbody>
      ";
      echo "<div class='alert alert-danger' role='alert'>
      Número incorreto de caracteres <a href='index.html' class='alert-link'>Clique aqui para consultar de novo</a>.
      </div>";
    }
  } else{
    echo "
    <table class='table' border=1>
    <thead>
      <tr>
        <th scope='col'>Cep</th>
        <th scope='col'>Rua</th>
        <th scope='col'>Bairro</th>
        <th scope='col'>Cidade</th>
        <th scope='col'>Estado</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      </tr>
    </tbody>
    ";
    echo "<div class='alert alert-danger' role='alert'>
    Parece que o campo CEP não foi preenchido, <a href='index.html' class='alert-link'>pode preenche-lo clicando aqui</a>.
    </div>";
  }
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>