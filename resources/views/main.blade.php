@extends('principal')

@section('script')

<script type="text/javascript" src="{{ url('/js/plugins/mask/jquery.mask.js') }}"></script>

<script type="text/javascript">
function bs_input_file() {
        $(".input-file").before(
            function() {
                if ( ! $(this).prev().hasClass('input-ghost') ) {
                    var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                    element.attr("name", $(this).attr("name"));
                    element.change(function(){
                        element.next(element).find('input').val((element.val()).split('\\').pop());
                    });
                    $(this).find("button.btn-choose").click(function(){
                        element.click();
                    });
                    $(this).find("button.btn-reset").click(function(){
                        element.val(null);
                        $(this).parents(".input-file").find('input').val('');
                    });
                    $(this).find('input').css("cursor","pointer");
                    $(this).find('input').mousedown(function() {
                        $(this).parents('.input-file').prev().click();
                        return false;
                    });
                    return element;
                }
            }
        );
    }

    $(function() {
        bs_input_file();
    });

    $(document).ready(function()
    {
        $(".flag").css('color', 'red');

        $("[type=checkbox]").change(function()
        {
            var ck = $(this);
            var dados = ck.attr('id').split('_');
            var p = "p_" + dados[1];

            var lb = String($('#'+p).text());

             if(lb.includes("SIM")) {
                 $('#'+p).text('NÃO');
                 $('#'+p).css('color', 'red');
             } else {
                 $('#'+p).text('SIM');
                 $('#'+p).css('color', 'green');
             }
        });
    });

</script>

@stop

@section('cabecalho')
<div>
        <img src=" {{ url('/img/mailp_ico.png') }}" >
        &nbsp;SRF - Administração
</div>
@stop

@section('conteudo')
    <form action="{{ action('SocioController@cadastrar') }}" method="POST">
        <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
        <input type ="hidden" name="cadastrar" value="C">

        <h3>Cadastrar Sócios</h3>
        <div class="row">
            <div class="col-sm-6">
                <label>Nome: </label>
                <input type="text" name="nome" class="form-control">
            </div>
            <div class="col-sm-6">
                <label>E-mail: </label>
                <input type="email" name="email" class="form-control">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary btn-block"><b>Cadastrar</b></button>
    </form>
    <form action="{{ action('SocioController@enviarEmail') }}" method="POST" enctype="multipart/form-data">
        <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
        <input type ="hidden" name="enviar" value="E">
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME DO SÓCIO</th>
                    <th>E-MAIL</th>
                    <th class="text-center">ENVIAR RELATÓRIO</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($socios as $dados)
                <tr>
                    <td>{{ $dados->id }}</td>
                    <td>{{ $dados->nome }}</td>
                    <td>{{ $dados->email }}</td>
                    <td class="text-center">
                        <input type="checkbox" id="ck_{{ $dados->id }}" value="{{ $dados->email }}" name="checks[]">
                        <label class="flag" id="p_{{ $dados->id }}">NÃO</label>
                        </input>
                    </td>
            @endforeach
            </tbody>
        </table>

        <h3>Enviar Relatorio Financeiro</h3>
        <div class="row">
            <div class="col-sm-6 form-group">
                <div class="input-group input-file" name="arq_financas">
                    <span class="input-group-btn">
                        <button class="btn btn-success btn-choose" type="button">Abrir Navegador</button>
                    </span>
                    <input type="text" class="form-control" placeholder='Nenhum arquivo selecionado...' />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success btn-block" id="enviar"><b>Enviar Relatório por E-mail</b></button>
                </div>
            </div>
        </div>
    </form>
@stop
