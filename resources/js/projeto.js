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
        });
    }
}
