<?php

$user = 'root';
$pass = '';
$db = new PDO('mysql:host=localhost;dbname=agenda_bd', $user, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$time = time();
$sql = "SELECT * FROM eventos";
$result = $db->prepare($sql);
$result->execute();
$rows = $result->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $key => &$value) {
    if (!empty($value['data_inicial']) && isset($value['data_inicial'])) {
        $value['data_inicial'] = date('d/m/Y H:i', strtotime($value['data_inicial']));
    }

    if (!empty($value['data_final']) && isset($value['data_final'])) {
        $value['data_final'] = date('d/m/Y H:i', strtotime($value['data_final']));
    }
}

foreach ($rows as $key => $value) {
    echo '
        <tr>
            <th>' . htmlspecialchars($value['id']) . '</th>
            <td>' . htmlspecialchars($value['titulo']) . '</td>
            <td>' . htmlspecialchars($value['data_inicial']) . '</td>
            <td>' . htmlspecialchars($value['data_final']) . '</td>
            <td>' . htmlspecialchars($value['descricao']) . '</td>
            <td>' . htmlspecialchars($value['cliente']) . '</td>
            <td> 
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                <input class="btn btn-danger btn-sm" type="submit" 
                onclick="deleteEvento(' . $value['id'] . ')" 
                value=" Excluir "/>


            </td>
        </tr>
    ';
}
?>

<script>

function deleteEvento(rotaUrl, idDoEvento) {
    // Exibe um prompt de confirmação para o usuário
    if (confirm('Deseja confirmar a exclusão?')) {
        $.ajax({
            url: rotaUrl, // URL da rota onde o evento será excluído
            method: 'DELETE', // Método HTTP DELETE para a exclusão
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: idDoEvento, // ID do evento a ser excluído
            },
            beforeSend: function () {
                // Antes de enviar a requisição, bloqueia a interface do usuário
                $.blockUI({
                    message: 'Carregando ... ',
                    timeout: 2000, // Desbloqueia após 2 segundos
                });
            },
        }).done(function (data) {
            // Quando a requisição é bem-sucedida, desbloqueia a interface e exibe os dados de resposta no console
            $.unblockUI();
            if(data.success == true){
                window.location.reload();
            }else{
                alert('Não foi possível realizar a exclusão do evento referenciado');
            }
        }).fail(function (data) {
            // Quando a requisição falha, desbloqueia a interface e exibe um alerta de erro
            $.unblockUI();
            alert('Não foi possível realizar a busca do evento referenciado');
            console.log(data);
        }).fail(function (data) {
            // Quando a requisição falha, desbloqueia a interface e exibe um alerta de erro
            $.unblockUI();
            alert('Não foi possível realizar a exclusão do evento referenciado');
        });
    }
}
</script>

