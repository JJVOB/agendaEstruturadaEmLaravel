@extends('site.layouts.estruturaBasica')
@section('titulo','Agendamentos Anteriores')


<!-- Resolver o problemado do BDD e exclusao do evento   -->

@section('principal')

    @include('site.layouts._partials.topo')

<section id="home">
    <div id="caixa_formulario" class="container pt-5 pb-5">
        <div class="row">
            <h1 class="display-4 text-center col">AGENDAMENTOS ANTERIORES</h1>
        </div>

        <div class="row justify-content-center">
            <table id="tabela" class="table table-bordereds justify-content-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome do evento</th>
                        <th>Descrição do evento</th>
                        <th>Data de inicio</th>
                        <th>Data final</th>
                        <th>Cliente</th>
                    </tr>
                    <tbody class="table table-bordereds justify-content-center">
                    <?php 
                        require_once 'connection.php';
                        $db = getConnection();

                        $time = time();
                        $sql = "SELECT * FROM consultoria WHERE $time > UNIX_TIMESTAMP(data_final);";
                                
                        $result = $db->query($sql);
                        $rows = $result->fetchAll();

                        foreach($rows as $key => $value){
                            if(!empty($value['data_inicial']) && isset($value['data_inicial'])){
                                $value['data_inicial'] = date('d/m/Y H:i', strtotime($value['data_inicial']));
                            }

                            if(!empty($value['data_final']) && isset($value['data_final'])){
                                        $value['data_final'] = date('d/m/Y H:i', strtotime($value['data_final']));
                            }

                            echo '
                                <tr>
                                    <th>' .$value['ID']. '</th>
                                    <td>' .$value['titulo']. '</td>
                                    <td>' .$value['descricao']. '</td>
                                    <td>' .$value['data_inicial']. '</td>
                                    <td>' .$value['data_final']. '</td>
                                    <td>' .$value['cliente']. '</td>
                                </tr>
                    ';
                        }
                    ?>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</section>

@endsection