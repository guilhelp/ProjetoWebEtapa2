<!-- Desenvolvido por Guilherme Lima de Paula 3 DS - Manhã - Matéria PW III -->

<!-- Iniciando projeto -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>

    <!-- Styles -->
    @vite([
        'resources/css/app.css', 
            'resources/js/app.js',
            'node_modules/bootstrap/dist/css/bootstrap.min.css',
            'node_modules/bootstrap/dist/js/bootstrap.bundle.js'
        ])
</head>
<body>

    <!-- Criando NavBar localizada na parte superior da aplicação -->
    <div class= "mx-auto bg-white">
        <div class="container-lg mx-auto px-0 py-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-lg">
                    <a class="navbar-brand" href="#">SISTEMA WEB</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link active" href="">Cadastrar </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="consulta">Consultar</a>
                            </li>
                        </ul>
                    </div>
            </nav>
    <!-- Fim do NavBar -->

    <!-- Iniciando o formulário para cadastrar os dados -->
    <div class="card">
            <div class="card-body">
                <div class="container-lg">
                    <h4 class="card-title"> Cadastrar - Agendamento de Potenciais Clientes </h4>
                    <p class="card-text"> Sistema utilizado para agendamento de serviços </p>
                    <form class="row g-3" method="POST" id="form" action="/atualizar/{{ $agendamento->id }}" nome="form">
                        @csrf
                        @method('PUT')

                        <!-- Formulário que pega os dados de cada coluna e envia para os inputs atráves dos metodos "update" ($agendamentos->coluna) -->
                        <div class="form-row">

                            <!-- Input Nome -->
                            <label for="validationCustom01">Nome</label>
                            <input value="{{ $agendamento->nome }}" type="text" name="nome" class="form-control" id="validationCustom01" placeholder="Nome Completo" required>
                            <br>

                            <!-- Input Telefone -->
                            <label for="validationCustom02">Telefone:</label>
                            <input value="{{ $agendamento->telefone }}" type="tel" name="telefone" class="form-control" id="validationCustom02" placeholder="(xx) xxxxx-xxxx"  required>
                            <br>

                            <!-- Input Origem -->
                            <label for="inputState" class="form-label">Origem</label>
                            <select class="form-select" name="origem" id="inlineFormCustomSelect" required>
                                <option {{ $agendamento->origem == "Celular" ? 'selected="selected"' : '' }} value="Celular">Celular</option>
                                <option {{ $agendamento->origem == "Telefone Fixo" ? 'selected="selected"' : '' }} value="Telefone Fixo">Telefone Fixo</option>
                                <option {{ $agendamento->origem == "Celular/Telefone Móvel" ? 'selected="selected"' : '' }} value="Celular/Telefone Móvel">Celular/Telefone Móvel</option>
                                <option {{ $agendamento->origem == "Ramal" ? 'selected="selected"' : '' }} value="Ramal">Ramal</option>
                                <option {{ $agendamento->origem == "Whatsapp" ? 'selected="selected"' : '' }} value="Whatsapp">Whatsapp</option>
                                <option {{ $agendamento->origem == "Telegram" ? 'selected="selected"' : '' }} value="Telegram">Telegram</option>
                                <option {{ $agendamento->origem == "Facebook" ? 'selected="selected"' : '' }} value="Facebook">Facebook</option>
                            </select>
                            <br>

                            <!-- Input Data do Contato -->
                            <label for="validationCustom03">Data do Contato:</label>
                            <input value="{{ $agendamento->data_contato }}" type="date" name="data_contato" class="form-control" id="validationCustom03" placeholder="dd/mm/aaaa" required></input>
                            <br>

                            <!-- Input Observação -->
                            <div class="form-group">
                                <label  for="exampleFormControlTextarea1">Observação:</label>
                                <textarea class="form-control" name="observacao" name="txtObservacao" id="txtObservacao" placeholder="Digite uma observação" rows="3" required>{{ $agendamento->observacao }}</textarea>
                            </div>
                            <br>

                            <!-- Botão Cadastrar -->
                            <button class="btn btn-primary" type="submit">Cadastrar Alteração</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Fim do formulário -->
</form>
</body>
</html>