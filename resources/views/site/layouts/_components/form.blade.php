
<form id="formularioItens" method="POST" action={{route('cadastro.evento')}}>
    @csrf
    <div class="form-group row">
        <label for="nomeDoEvento" class="col-md-3 col-form-label">Nome do evento</label>
        <div class="col-md-9">
            <input required="required" class="form-control" type="text" id="nomeDoEvento" placeholder=" Nome do evento " name="nomeDoEvento" maxlength="255">
        </div>
    </div>

    <div class="form-group row">
        <label for="descricao" class="col-md-3 col-form-label">Descrição</label>
        <div class="col-md-9">
            <input required="required" class="form-control" type="text" id="descricao" placeholder=" Descrição " name="descricao">
        </div>
    </div>

    <div class="form-group row">
        <label for="iniciodata" class="col-md-3 col-form-label">Início do evento</label>
        <div class="col-md-9">
            <input required="required" class="form-control" type="date" id="iniciodata" placeholder=" Data de inicio do evento" name="iniciodata">
        </div>
    </div>

    <div class="form-group row">
        <label for="fimdata" class="col-md-3 col-form-label">Fim do evento</label>
        <div class="col-md-9">
            <input required="required" class="form-control" type="date" id="fimdata" placeholder=" Data de termino termino " name="fimdata">
        </div>
    </div>

    <div class="form-group row">
        <label for="cliente" class="col-md-3 col-form-label">Cliente</label>
        <div class="col-md-9">
            <input required="required" class="form-control" type="text" id="cliente" placeholder=" Cliente " name="cliente" maxlength="255">
        </div>
    </div>

    <div id="botoes" class="row justify-content-center">
        <button id="botao" class="btn btn-custom btn-success" type="submit" value="Salvar" >SALVAR</button>
    </div>    
</form>