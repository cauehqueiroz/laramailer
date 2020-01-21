<html>
    <body>
        <p>Olá.</p>
        <p></p>
        <p>Alguém entrou em contato no seu portal, segue alguns dados:</p>
        <p>
            Nome: {{$contact->name}}
            <br/>E-mail: {{$contact->email}}
            <br/>Telefone: {{$contact->phone}}
            <br/>Mensagem: {{$contact->message}}
            <br/>Anexo: {{$contact->attachment}}
        </p>
        <p></p>
        <p>Não responda essa mensagem.</p>
    </body>
</html>