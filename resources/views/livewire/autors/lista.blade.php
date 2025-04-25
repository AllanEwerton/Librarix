<div>
    <div class="container">
        <h1>Lista de Autores</h1>
        <table class="table table-striped bg-white">
            <thead>
                <tr>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                @foreach($autores as $autor)
                    <tr>
                        <td>{{ $autor->nome }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
