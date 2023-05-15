<!-- Desenvolvido por Guilherme Lima de Paula 3 DS - Manhã - Matéria PW III -->

<!-- Iniciando projeto -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>

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
                                <a class="nav-link" href="/">Cadastrar </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="consulta">Consultar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </nav>
    <!-- Fim do NavBar -->

    <!-- Iniciando a tabela de dados -->
        <div class="container w-50 px-5 py-5">
        <h4 class="table-title"> Cadastrar - Contatos Agendados </h4>
        
        <div class="table-responsive-md">
            <table class="table table-borderless">
                <tr class='bg-primary'>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Origem</th>
                    <th scope="col">Contato</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Ação</th>
                </tr>

                </thead>
                <tbody>
                    @foreach($agendamentos as $tableagenda)
                    <tr>  
                        <!-- Acessando os dados de cada campo pelo método do AgendamentosController -->
                        <td>{{ $tableagenda->nome }}</td>
                        <td>{{ $tableagenda->telefone }}</td>
                        <td>{{ $tableagenda->origem }}</td>
                        <td>{{ $tableagenda->data_contato }}</td>
                        <td>{{ $tableagenda->observacao }}</td>
                        <td>
                        <!-- Criando botões editar e alterar -->
                        <div class="btn-group">
                            <!-- Formulário botão DELETE -->
                            <form action="{{ route('agendamentos.destroy', $tableagenda->id) }}" method="POST">
                                <!-- Redireciona para a rota de "destroy" (delete) -->
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-primary">Excluir</button>
                            </form>
                            <!-- Formulário botão EDITAR -->
                            <form action="{{ route('agendamentos.edit', $tableagenda->id) }}" method="GET">
                                <!-- Redireciona para a rota de "edit" (editar) -->
                                @csrf
                                <button type="submit" class="btn btn-outline-primary">Editar</button>
                            </form>
                        </div>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
            </table>
            <!-- Fim da tabela de dados -->
            </div>
            </div>
        </div>
    </div>
</body>
</html>