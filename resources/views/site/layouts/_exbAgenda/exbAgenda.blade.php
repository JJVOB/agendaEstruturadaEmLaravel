<?php 

$user = 'root';
$pass = '';
$db = new PDO('mysql:host=localhost;dbname=agenda_bd', $user, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$time = time();
$sql = "SELECT * FROM eventos ";
$result = $db->prepare($sql);
$result->bindValue(':time', $time, PDO::PARAM_INT);
$result->execute();
$rows = $result->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $key => &$value){  
    if(!empty($value['data_inicial']) && isset($value['data_inicial'])){
        $value['data_inicial'] = date('d/m/Y H:i', strtotime($value['data_inicial']));
    }

    if(!empty($value['data_final']) && isset($value['data_final'])){
        $value['data_final'] = date('d/m/Y H:i', strtotime($value['data_final']));
    }
}

foreach($rows as $key => $value){
    echo '
        <tr>
            <th>' .htmlspecialchars($value['id']). '</th>
            <td>' .htmlspecialchars($value['titulo']). '</td>
            <td>' .htmlspecialchars($value['data_inicial']). '</td>
            <td>' .htmlspecialchars($value['data_final']). '</td>
            <td>' .htmlspecialchars($value['descricao']). '</td>
            <td>' .htmlspecialchars($value['cliente']). '</td>
            <td>
                <!-- Botão para editar (abre um modal) -->
                <a href="" class="btn btn-primary btn-edit" style="display: inline;" data-bs-toggle="modal" data-bs-target="#editarClienteModal">
                    <i class="fas fa-edit"></i>
                </button>
                <!-- Botão para excluir (chama a função deleteEvento) -->
                <meta name="csrf-token" content="{{ csrf_token() }}" />

                <a onclick="deleteEvento('{{route('site.delete')}}',{{$evento->id}})" class="btn btn-danger btn-delete" style="display: inline;"  data-bs-toggle="modal" data-bs-target="#confirmarExclusaoModal">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
    ';
}
