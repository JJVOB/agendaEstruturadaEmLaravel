    
<div class="modal fade" id="confirmarExclusaoModal" tabindex="-1" role="dialog" aria-labelledby="modalConfirmacaoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalConfirmacaoLabel">Confirmação de Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                    Tem certeza de que deseja excluir este item?
            </div>

            <div class="modal-footer">
                <button type="button" onclick="location.href='{{ route('site.agenda') }}' " class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form id="formDelete" action={{ route('site.delete') }}  method="DELETE" style="display: inline;">
                    <button id="delete" type="submit" class="btn btn-danger">Excluir</button>
                </form> 
            </div>
        </div>
    </div>
</div>