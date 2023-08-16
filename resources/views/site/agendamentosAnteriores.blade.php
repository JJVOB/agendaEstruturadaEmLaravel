@extends('site.layouts.estruturaBasica')
@section('titulo','Agendamentos Anteriores')

@section('principal')
<!--    -->
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
                        <th>Data de inicio</th>
                        <th>Data final</th>
                        <th>Descrição do evento</th>
                        <th>Cliente</th>
                    </tr>
                    <tbody class="table table-bordereds justify-content-center">
                    
                        @component('site.layouts._exbAgenda.exbAnteriores')
                
                        @endcomponent 
                    </tbody>
                </thead>
            </table>
        </div>
    </div>


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
                    <button type="button" action="" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form id="formDelete" action="" method="post" style="display: inline;">
                        <button id="delete" type="submit" class="btn btn-danger">Excluir</button>
                    </form> 
                </div>
            </div>
            </div>
    </div>
</section>

@endsection