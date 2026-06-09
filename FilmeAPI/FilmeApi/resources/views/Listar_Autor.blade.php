<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Filmes</title>
</head>
    <body>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DATA NASCIMENTO</th>
                    <th>EMAIL</th>
                     <th>TELEFONE</th>
     
                </tr>
            </thead>
   <tbody>
                @forelse($autores as $autor)
                    <tr>
                    <td>{{ $Filme->autor->id ?? 'N/A' }}</td>
                            <td>{{ $Filme->autor->nome ?? 'N/A'}}</td>
                                <td>{{ $Filme->autor->dataNascimento ?? 'N/A' }}</td>
                                    <td>{{ $Filme->autor->email ?? 'N/A' }}</td>
                                        <td>{{ $Filme->autor->telefone ?? 'N/A' }}</td>
                                              <td> 
                                                <a href="{{route('filme.atualizar', $Filme->id)}}">Atualizar</a>
                                        </td>
                </tr>
                @empty
                    <tr>
                        <td colsoan="13">Nenhum Filme encontrado</td>
                    </tr>
                @endforelse
            </tbody>


          
    </body>
</html>



