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
          <form class="needs-validation" id="contactForm" novalidate="" action="{{ route('enviar-email') }}" onsubmit="return false;" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="primeiroNome">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required="">
            </div>
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="fulano@exemplo.com">
            </div>

            <div class="mb-3">
              <label for="endereco">Telefone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="(99) 9999-9999" required="">
            </div>

            <div class="mb-3">
              <label for="endereco2">Mensagem</label>
              <textarea class="form-control" name="message" id="message"></textarea>
            </div>
            
            <div class="mb-3">
              <label for="endereco2">Anexo</label>
              <input type="file" class="form-control" name="attachment" id="attachment"/>
            </div>
            
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg" type="submit" id="btn">Enviar Mensagem</button>
            <div id="error-msg" class="alert alert-danger d-none mt-3"></div>
          </form>
        </div>
      </div>
    </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
      $('#phone').mask('(00) 00000-0000');
      $("#contactForm").submit(function(e) {
          e.preventDefault();
          var formData = new FormData(this);
          let that = this;
          let botao = '#btn';
          $.ajax({
            url: $(that).attr("action"),
            type: 'POST',
            data: formData,
            dataType: 'json',
            beforeSend: function( xhr ) {
              $('#error-msg').addClass('d-none');
              $(botao).attr("disabled", true);
            },
            success: function (data) {
              $(botao).removeAttr("disabled");
              if(data.sent === true){
                  alert("E-mail enviado com sucesso! =D");
                  window.location.reload(true);
              } else {
                // alert("Ocorreu um erro ao enviar seu contato. =(");
                $('#error-msg').removeClass('d-none').html(data.message.join('<br>'));
              }
            },
            cache: false,
            contentType: false,
            processData: false
          });
          
          $(botao).removeAttr("disabled");
      });
    </script>
</body>
</html>