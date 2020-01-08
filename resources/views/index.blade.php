<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário de Contato</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
  <body class="bg-light">
    <div class="container">
      <div class="py-3 text-center">
        <h2>Formulário de contato</h2>
        <p class="lead">
            Preencha o formulário abaixo e entre em contato conosco!
        </p>
      </div>

      <div class="row">
        <div class="col">
          <form class="needs-validation" novalidate="" onsubmit="return false;">
            <div class="mb-3">
                <label for="primeiroNome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="" required="">
            </div>
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="fulano@exemplo.com">
            </div>

            <div class="mb-3">
              <label for="endereco">Telefone</label>
              <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(99) 9999-9999" required="">
            </div>

            <div class="mb-3">
              <label for="endereco2">Mensagem</label>
              <textarea class="form-control" name="mensagem" id="mensagem"></textarea>
            </div>
            
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg" type="submit" onclick="enviarEmail()">Enviar Mensagem</button>
          </form>
        </div>
      </div>
    </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        function enviarEmail(botao) {
            jQuery.ajax({
                type: "POST",
                url: "{{ route('enviar-email') }}",
                beforeSend: function( xhr ) {
                    $(botao).attr("disabled", true);
                },
                success: function (data, textStatus, jqXHR) {
                    console.log('textStatus',textStatus)
                    console.log('jqXHR',jqXHR)
                    $(botao).removeAttr("disabled");
                    // if(data.error === true){

                    // } else {
                    //     alert("E-mail enviado com sucesso!");
                    // }
                }
            });
        }
    </script>
</body>
</html>