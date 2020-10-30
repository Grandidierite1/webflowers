<?php
    if(!isset($_SESSION['logado']) || $_SESSION['logado'] != 1){
        echo '<script>window.location.href = "login.php";</script>';
    }
?>

<div class="container" style="background: transparent;">
    <div class="row align-items-center" style="text-align: center; margin: 0;">
        <p id="topCorpo" class="col-sm-12 text-center" style="font-family: 'Quicksand', sans-serif; color: black; font-size: 35px; padding: 10px; margin-bottom: 0;">Novo Atendimento</p>
    </div>
</div>
    <form name="formOrcamento" method="POST" id="formOrcamento">
        <div id="novoAtendimento" class="container" style="background: transparent; border:none; padding: 15px; font-family: 'Quicksand', sans-serif; color: black;">
            <!-- SELECT -->
            <div class="row col-10 offset-sm-1" style="text-decoration:none; border-top: #33d9b2 solid 2px; border-bottom: #33d9b2 solid 2px; padding-top: 5px; padding-bottom: 5px;">
                <label class="col-sm-3" id="labelForm">Procurar Empresa:</label>
                <select class="col-sm-6 form-control" name="selectConsulta" id="selectConsulta">
                    <option value="" style=" margin-top: 10px; margin-bottom: 10px;">Selecione...</option>
                    <?php
                        $Matriz = $conexao->prepare("SELECT COD_CLIENTE, NOME_CLIENTE FROM TB_CLIENTE");
                        $Matriz->execute();
                        while ($Linha = $Matriz->fetch(PDO::FETCH_OBJ)){
                    ?>
                            <option value="<?=$Linha->COD_CLIENTE?>" style="margin-top: 10px; margin-bottom: 10px;" ><?=$Linha->NOME_CLIENTE?></option>
                    <?php
                        }
                    ?>
                </select>
                <?php
                    $COD_CLIENTE = "";
                    $NOME_CLIENTE = "";
                    $CPF_CLIENTE = "";
                    $RG_CLIENTE = "";
                    $RUA_CLIENTE = "";
                    $NUM_CLIENTE = "";
                    $BAIRRO_CLIENTE = "";
                    $CIDADE_CLIENTE = "";
                    $ESTADO_CLIENTE = "";
                    $COMPLEMENTO_CLIENTE = "";
                    $CEP_CLIENTE = "";
                    $DATA_NASC_CLIENTE = "";
                    $CEL_CLIENTE = "";
                    $TEL_CLIENTE = "";
                    $EMAIL_CLIENTE = "";

                    /* CONSULTAR */
                    if(isset($_POST['selectConsulta']) && !empty($_POST['selectConsulta'])){
                        $Matriz2 = $conexao->prepare("SELECT tb_cliente.COD_CLIENTE, tb_cliente.NOME_CLIENTE, tb_cliente.RG_CLIENTE, tb_cliente.CPF_CLIENTE, tb_cliente.RUA_CLIENTE, tb_cliente.NUM_CLIENTE, tb_cliente.BAIRRO_CLIENTE, tb_cliente.CIDADE_CLIENTE, tb_cliente.ESTADO_CLIENTE, tb_cliente.COMPLEMENTO_CLIENTE, tb_cliente.CEP_CLIENTE, tb_cliente.DATA_NASC_CLIENTE, tb_cliente.CEL_CLIENTE, tb_cliente.TEL_CLIENTE, tb_cliente.EMAIL_CLIENTE FROM tb_cliente RIGHT JOIN tb_venda ON tb_cliente.COD_CLIENTE = tb_venda.COD_CLIENTE WHERE tb_cliente.COD_CLIENTE = ?");
                        $Matriz2-> bindParam(1, $_POST['selectConsulta']);
                        $Matriz2->execute();
                        $Linha2 = $Matriz2->fetch(PDO::FETCH_OBJ);
                        $COD_CLIENTE = $_POST['selectConsulta'];
                        $NOME_CLIENTE = $Linha2->NOME_CLIENTE;
                        $CPF_CLIENTE = $Linha2->CPF_CLIENTE;
                        $RG_CLIENTE = $Linha2->RG_CLIENTE;
                        $RUA_CLIENTE = $Linha2->RUA_CLIENTE;
                        $NUM_CLIENTE = $Linha2->NUM_CLIENTE;
                        $BAIRRO_CLIENTE = $Linha2->BAIRRO_CLIENTE;
                        $CIDADE_CLIENTE = $Linha2->CIDADE_CLIENTE;
                        $ESTADO_CLIENTE = $Linha2->ESTADO_CLIENTE;
                        $COMPLEMENTO_CLIENTE = $Linha2->COMPLEMENTO_CLIENTE;
                        $CEP_CLIENTE = $Linha2->CEP_CLIENTE;
                        $DATA_NASC_CLIENTE = $Linha2->DATA_NASC_CLIENTE;
                        $CEL_CLIENTE = $Linha2->CEL_CLIENTE;
                        $TEL_CLIENTE = $Linha2->TEL_CLIENTE;
                        $EMAIL_CLIENTE = $Linha2->EMAIL_CLIENTE;

                    }
                ?>
                <label class="offset-sm-1" id="labelForm">ID:</label>
                <input class="col-sm-1" type="text" readonly style="background: transparent; border: none;" name="COD_CLIENTE" value="<?=$COD_CLIENTE?>">
            </div>
    </form>

    <!-- FORMULARIO CADASTRO -->
    <div class="row">
                        <h5 style="margin-top: 15px; border-bottom: 2px rgb(88, 187, 201) solid;">Dados Pessoais</h5>
                        <div class="row col-sm-12" style="padding-top: 5px;">
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">*Nome Completo:</label>
                                <input id="NOME_CLIENTE" type="text" class="col-sm-6 txtForm form-control" name="NOME_CLIENTE" value="<?=$NOME_CLIENTE?>">
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">*RG:</label>
                                <input id="RG_CLIENTE" type="text" class="col-sm-6 txtForm form-control" name="RG_CLIENTE" value="<?=$RG_CLIENTE?>">
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">*CPF:</label>
                                <input id="CPF_CLIENTE" type="text" class="col-sm-6 txtForm form-control" name="CPF_CLIENTE" value="<?=$CPF_CLIENTE?>">
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">*Data de Nascimento:</label> 
                                <input id="DATA_NASC_CLIENTE" type="date" class="col-sm-6 txtForm form-control" name="DATA_NASC_CLIENTE" value="<?=$DATA_NASC_CLIENTE?>">
                            </div>
                        </div>
                        
                        <div class="row col-sm-12" style="margin-top: 5px; padding-top: 5px;">
                            <div class="row col-12">
                                <h5 style="margin-top: 15px; border-bottom: 2px rgb(88, 187, 201) solid;">Endereço</h5>
                            </div>
                            <div class="row col-6">
                                <label class="col-sm-5" id="" style="">*CEP:</label> 
                                <input id="cep_cliente" type="text" class="col-sm-6 txtForm form-control cep" onblur="pesquisacep(this.value);" name="CEP_CLIENTE" value="<?=$CEP_CLIENTE?>"> 
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">Rua:</label>
                                <input id="RUA_CLIENTE" type="text" class="col-sm-6 txtForm form-control" name="RUA_CLIENTE" value="<?=$RUA_CLIENTE?>">
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">*Numero:</label>
                                <input id="NUM_CLIENTE" type="text" class="col-sm-6 txtForm form-control" name="NUM_CLIENTE" value="<?=$NUM_CLIENTE?>">
                            </div>
                            <div class="row col-6">
                                <label class="col-sm-5" id="" style="">Complemento</label> 
                                <input id="COMPLEMENTO_CLIENTE" type="text" class="col-sm-6 cep txtForm form-control" name="COMPLEMENTO_CLIENTE" value="<?=$COMPLEMENTO_CLIENTE?>"> 
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">Bairro:</label> 
                                <input id="BAIRRO_CLIENTE" type="text" class="col-sm-6 txtForm form-control" name="BAIRRO_CLIENTE" value="<?=$BAIRRO_CLIENTE?>">
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">Cidade:</label> 
                                <input id="CIDADE_CLIENTE" type="text" class="col-sm-6 txtForm form-control" name="CIDADE_CLIENTE" value="<?=$CIDADE_CLIENTE?>">
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">Estado:</label> 
                                <input id="ESTADO_CLIENTE" type="text" class="col-sm-6 txtForm form-control" name="ESTADO_CLIENTE" value="<?=$ESTADO_CLIENTE?>">
                            </div>
                        </div>
                        <div class="row col-sm-12" style="margin-top: 5px; padding-top: 5px;">
                            <div class="row col-12">
                                <h5 style="margin-top: 15px; border-bottom: 2px rgb(88, 187, 201) solid;">Contato</h5>
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">*Email:</label> 
                                <input id="EMAIL_CLIENTE" type="text" class="col-sm-6 txtForm form-control" name='EMAIL_CLIENTE' value="<?=$EMAIL_CLIENTE?>">
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">Telefone:</label> 
                                <input id="TEL_CLIENTE" type="text" class="col-sm-6 txtForm form-control" name='TEL_CLIENTE' value="<?=$TEL_CLIENTE?>">    
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">*Celular:</label> 
                                <input id="CEL_CLIENTE" type="text" class="col-sm-6 txtForm form-control" name='CEL_CLIENTE' value="<?=$CEL_CLIENTE?>">
                            </div>
</div>