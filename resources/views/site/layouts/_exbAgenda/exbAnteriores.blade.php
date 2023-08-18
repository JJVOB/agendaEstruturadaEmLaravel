<?php 

$user = 'root';
$pass = '';
$db = new PDO('mysql:host=localhost;dbname=agenda_bd', $user, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$time = time();
$sql = "SELECT * FROM eventos WHERE UNIX_TIMESTAMP(data_final) < :time";
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
              
                <button class="btn btn-danger btn-delete" style="display: inline;" data-bs-toggle="modal" data-bs-target="#confirmarExclusaoModal">
                    <i class="fas fa-trash-alt"></i>
                </button>
                
            </td>
        </tr>
    ';
}



