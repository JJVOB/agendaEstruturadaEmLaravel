
<?php 


$user = 'root';
$pass = '';
$db = new PDO('mysql:host=localhost;dbname=agenda_bd', $user, $pass);

$time = time();
$sql = "SELECT * FROM agenda_bd WHERE UNIX_TIMESTAMP(data_final) > $time ";

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
            <th>' .$value['id']. '</th>
            <td>' .$value['titulo']. '</td>
            <td>' .$value['descricao']. '</td>
            <td>' .$value['data_inicial']. '</td>
            <td>' .$value['data_final']. '</td>
            <td>' .$value['cliente']. '</td>
            <td> 
                <button class="btn btn-primary btn-edit" style="display: inline;" value="'. $value['id'] .'"data-bs-toggle="modal"  data-bs-target="#editarClienteModal"> <i class="fas fa-edit"></i></button>
                <button  class="btn btn-danger btn-delete" style="display: inline;" value="'. $value['id'] .'"data-bs-toggle="modal" data-bs-target="#confirmarExclusaoModal"><i class="fas fa-trash-alt"></i></button>
                
            </td>
        </tr>
    ';
}
?>