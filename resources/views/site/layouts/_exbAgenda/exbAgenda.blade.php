        <div class="row justify-content-center">
            <table id="tabela" class="table table-bordereds justify-content-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome do evento</th>
                        <th>Data de inicio</th>
                        <th>Data final</th>
                        <th>Descrição do evento</th>
                        <th>Cliente</th>
                    </tr>
                    <tbody class="table table-bordereds justify-content-center">

                        @foreach($findEvento as $evento)
                            <td> {{$evento->titulo}}<\td>
                            <td> {{$evento->data_inicial}}<\td>
                            <td> {{$evento->data_final}}<\td>
                            <td> {{$evento->descricao}}<\td>
                            <td> {{$evento->cliente}}<\td>
                        @endforeach

                        <div>
                            <form action = "{{route('evento.index')}}" method = "get">
                            <input type = "text" name ="pesquisar" placeholder= "Pesquisar " />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Pesquisar</button>
                        </form>
                        <br><br><br>
                        </div>
                    </tbody>
                </thead>
            </table>
        </div>