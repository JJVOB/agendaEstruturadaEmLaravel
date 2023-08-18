<?php 

$user = 'root';
$pass = '';
$db = new PDO('mysql:host=localhost;dbname=agenda_bd', $user, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$time = time();
$sql = "SELECT * FROM eventos";
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
                <meta name="csrf-token" content="{{ csrf_token() }}" />

                <input class="btn btn-info btn-sm" type="submit" 
                onclick="" value=" Editar  "/>
    
                <input class="btn btn-danger btn-sm" type="submit" 
                onclick="location.href=delete(\'{{ route(\'evento.delete\') }}\', ' . $value['id'] . ')" 
                value=" Excluir  "/>

            </td>
        </tr>
    ';
}
?>
