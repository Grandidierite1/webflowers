<!-- CORPO -->
<div id="orc" class="container-fluid" style="background: transparent; border:none; padding: 15px; font-family: 'Quicksand', sans-serif; color: black;">
    <div class="row">
        <div class="containe-fluid col-md-12" style="background: linear-gradient(125deg, rgb(88, 187, 201) 30%, transparent 20%); margin-bottom: 15px;">
            <h1 class="col-md-5 offset-md-1">Orçamento</h1>
        </div>
    </div>
    <div class="row">
        <form method="POST" id="formOrcamento">
            <?php
                $nome_cliente = "";
                $rg_cliente = "";
                $cpf_cliente = "";
                $data_nasc_cliente = ""; 
                $cep_cliente = "";      
                $rua_cliente = "";
                $num_cliente = "";
                $bairro_cliente = "";
                $cidade_cliente = "";
                $estado_cliente = "";
                $complemento_cliente = "";
                $email_cliente = "";
                $tel_cliente = "";   
                $cel_cliente = "";
                $descricao_kit = "";
                $cod_kit = "";
                $cod_cliente = "";
                $cod_forn = "";
                $sql = "";
                
                /* INCLUIR */
                if(isset($_POST['botao']) && $_POST['botao'] == 'solicitar'){
                    if(!empty($_POST['nome_cliente']) || !empty($_POST['rg_cliente']) || !empty($_POST['cpf_cliente']) || !empty($_POST['data_nasc_cliente']) || !empty($_POST['cep_cliente']) || !empty($_POST['num_cliente']) || !empty($_POST['email_cliente']) || !empty($_POST['cel_cliente'])){
        
                        $nome_cliente = $_POST["nome_cliente"];
                        $rg_cliente = $_POST["rg_cliente"];
                        $cpf_cliente = $_POST["cpf_cliente"];
                        $data_nasc_cliente = $_POST["data_nasc_cliente"];
                        $cep_cliente = $_POST["cep_cliente"];
                        $rua_cliente = $_POST["rua_cliente"];
                        $num_cliente = $_POST["num_cliente"];
                        $bairro_cliente = $_POST["bairro_cliente"];
                        $cidade_cliente = $_POST["cidade_cliente"];
                        $estado_cliente = $_POST["estado_cliente"];
                        $complemento_cliente = $_POST["complemento_cliente"];
                        $email_cliente = $_POST["email_cliente"];
                        $tel_cliente = $_POST["tel_cliente"];
                        $cel_cliente = $_POST["cel_cliente"];
                        $cod_kit = $_POST["cod_kit"];
                        $cod_forn = $_POST["cod_forn"];
                            
                        try {
                            $Comando = $conexao->prepare("INSERT INTO TB_CLIENTE( nome_cliente, rg_cliente, cpf_cliente, data_nasc_cliente, cep_cliente, rua_cliente, num_cliente, bairro_cliente, cidade_cliente, estado_cliente, complemento_cliente, email_cliente, tel_cliente, cel_cliente)
                                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            
                            $Comando-> bindParam(1, $nome_cliente);
                            $Comando-> bindParam(2, $rg_cliente);
                            $Comando-> bindParam(3, $cpf_cliente);
                            $Comando-> bindParam(4, $data_nasc_cliente);
                            $Comando-> bindParam(5, $cep_cliente);
                            $Comando-> bindParam(6, $rua_cliente);
                            $Comando-> bindParam(7, $num_cliente);
                            $Comando-> bindParam(8, $bairro_cliente);
                            $Comando-> bindParam(9, $cidade_cliente);
                            $Comando-> bindParam(10, $estado_cliente);
                            $Comando-> bindParam(11, $complemento_cliente);
                            $Comando-> bindParam(12, $email_cliente);
                            $Comando-> bindParam(13, $tel_cliente);
                            $Comando-> bindParam(14, $cel_cliente);
                            if($Comando->execute()){
                                
                                if($Comando->rowCount()>0){
                                                                
                                    try{
                                            
                                        $sql = "SELECT tb_cliente.COD_CLIENTE FROM tb_cliente ORDER BY COD_CLIENTE DESC LIMIT 1";
                                        $Comando3 = $conexao->prepare($sql);
                                        $Comando3->execute();
                                        $Linha3 = $Comando3->fetch(PDO::FETCH_OBJ);
                                        $trazID = $Linha3->COD_CLIENTE;

                                        $sql = "SELECT tb_forn.VALOR_KIT FROM tb_forn WHERE COD_FORN = ?";
                                        $Comando3 = $conexao->prepare($sql);
                                        $Comando3-> bindParam(1, $cod_forn);
                                        $Comando3->execute();
                                        $Linha3 = $Comando3->fetch(PDO::FETCH_OBJ);
                                        $trazValor = $Linha3->VALOR_KIT;

                                        $sql = "INSERT INTO tb_venda(COD_CLIENTE, COD_KIT, COD_FORN, VALOR_VENDA) VALUES (?, ?, ?, ?)";
                                        $query = $conexao->prepare($sql);
                                        $query-> bindParam(1, $trazID);
                                        $query-> bindParam(2, $cod_kit);
                                        $query-> bindParam(3, $cod_forn);
                                        $query-> bindParam(4, $trazValor);
                                        $query->execute();
                                        
                                    
                                        if($query->rowCount()>0){
                                            echo "<script>Swal.fire({position: 'center', type: 'success', title: 'Solicitação concluida com sucesso!', text: 'Entraremos em contato em até 1 hora atravez de seu telefone/celular.', showConfirmButton: false, timer: 15000})</script>";
                                            echo ('<meta http-equiv="refresh"content=1;>');
                                        }
                                        else{
                                            echo "<script>Swal.fire({ type: 'error', title: 'Não foi possível registrar o atendimento!', showConfirmButton: false, timer: 1500})</script>";
                                        }
                                    }
                                    catch(PDOException $erro){
                                        echo "<script>Swal.fire({ type: 'error', title: 'Não foi possível efetuar o pedido!', showConfirmButton: false, timer: 1500})</script>";
                                    }
                                }
                                else{
                                    echo "<script>Swal.fire({ type: 'error', title: 'Não foi possivel efetuar o pedido!', showConfirmButton: false, timer: 1700})</script>";
                                }
                            }
                            else{
                                throw new PDOException("Erro:Não foi possivel executar sql");
                            }
                        }
                            catch(PDOException $erro){
                                echo "<script>Swal.fire({ type: 'error', title: 'Não foi possivel efetuar o pedido!', showConfirmButton: false, timer: 1700})</script>";
                            }
                    }
                    else{
                        echo "<script>Swal.fire({ type: 'error', title: 'Por favor preencha os campos solicitados!', showConfirmButton: false, timer: 1700})</script>";
                    }
                }
                ?>
            
            <!-- FORMULARIO CADASTRO -->
            <div class="container-fluid">
                <!-- INICIO SELECT PRODUTOS -->
                <div class="col-sm-3 offset-md-1" style="display: inline-block; padding: 0;">
                    <div class="row">
                        <h3><strong>Passo 1 - Selecione o kit desejado.</strong></h3>
                    </div>
                    <div class="row">
                        <h5 style="margin-top: 15px; margin-bottom: 15px; padding-bottom: 0  ; border-bottom: 2px rgb(88, 187, 201) solid;">Procurar Kits</h5>
                        
                        <select class="col-sm-12 form-control" name="selectConsulta" id="selectConsulta">
                            <option value="" style=" margin-top: 10px; margin-bottom: 10px;">Selecione...</option>
                            <?php
                                $Matriz = $conexao->prepare("select cod_kit, nome_kit from tb_kit");
                                $Matriz->execute();
                                while ($Linha = $Matriz->fetch(PDO::FETCH_OBJ)){
                            ?>
                                    <option value="<?=$Linha->cod_kit?>" style="margin-top: 10px; margin-bottom: 10px;" ><?=$Linha->nome_kit?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <?php
                        /* CONSULTA */
                        if(isset($_POST['selectConsulta']) && !empty($_POST['selectConsulta'])){
                            $Matriz2 = $conexao->prepare("SELECT * from tb_kit WHERE cod_kit = ?");
                            $Matriz2-> bindParam(1, $_POST['selectConsulta']);
                            $Matriz2->execute();
                            $Linha2 = $Matriz2->fetch(PDO::FETCH_OBJ);
                            $descricao_kit = $Linha2->DES_KIT;
                            $cod_forn = $Linha2->COD_FORN;                            
                            $cod_kit = $_POST['selectConsulta'];
                        }
                        ?>
                        <div class="container-fluid" style="margin-top: 5px; padding: 5px;" id="hiddenKit">
                            <h5 class="col-sm-12"style="margin-top: 5px; margin-bottom: 10px; padding: 0;">Descrição:</h5>
                            <textarea class="form-control" id="txtArea" name ="des_kit" rows="5" readonly><?=$descricao_kit?></textarea>
                            <input type="text" name="cod_kit" value="<?=$cod_kit?>" hidden readonly>
                            <input type="text" name="cod_forn" value="<?=$cod_forn?>" hidden readonly>
                        </div>
                        <div class="row" style="padding: 5px;">
                            <h3><strong>Passo 2 - Data e Local do Evento</strong></h3>e
                        </div>
                    </div>
                </div><!-- END SELECT PRODUTOS -->

                <!-- INICIO FORM CAD -->
                <div class="col-sm-7" style="display: inline-block; padding: 0; margin-left: 5%;">
                    <div class="row">
                        <h3><strong>Passo 2 - Nos informe alguns dados para fazermos seu cadastro.</strong></h3>
                    </div>
                    <div class="row">
                        <h5 style="margin-top: 15px; border-bottom: 2px rgb(88, 187, 201) solid;">Dados Pessoais</h5>
                        <div class="row col-sm-12" style="padding-top: 5px;">
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">*Nome Completo:</label>
                                <input id="nome_cliente" type="text" class="col-sm-6  txtForm form-control" name="nome_cliente" value="<?=$nome_cliente?>">
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">*RG:</label>
                                <input id="rg_cliente" type="text" class="col-sm-6  txtForm form-control" name="rg_cliente" value="<?=$rg_cliente?>">
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">*CPF:</label>
                                <input id="cpf_cliente" type="text" class="col-sm-6  txtForm form-control" name="cpf_cliente" value="<?=$cpf_cliente?>">
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">*Data de Nascimento:</label> 
                                <input id="data_nasc_cliente" type="date" class="col-sm-6 txtForm form-control" name="data_nasc_cliente" value="<?=$data_nasc_cliente?>">
                            </div>
                        </div>
                        
                        <div class="row col-sm-12" style="margin-top: 5px; padding-top: 5px;">
                            <div class="row col-12">
                                <h5 style="margin-top: 15px; border-bottom: 2px rgb(88, 187, 201) solid;">Endereço</h5>
                            </div>
                            <div class="row col-6">
                                <label class="col-sm-5" id="" style="">*CEP:</label> 
                                <input id="cep_cliente" type="text" class="col-sm-6 txtForm form-control cep" onblur="pesquisacep(this.value);" name="cep_cliente" value="<?=$cep_cliente?>"> 
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">Rua:</label>
                                <input id="rua_cliente" type="text" class="col-sm-6 txtForm form-control" name="rua_cliente" value="<?=$rua_cliente?>">
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">*Numero:</label>
                                <input id="num_cliente" type="text" class="col-sm-6 txtForm form-control" name="num_cliente" value="<?=$num_cliente?>">
                            </div>
                            <div class="row col-6">
                                <label class="col-sm-5" id="" style="">Complemento</label> 
                                <input id="complemento_cliente" type="text" class="col-sm-6 cep txtForm form-control" name="complemento_cliente" value="<?=$complemento_cliente?>"> 
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">Bairro:</label> 
                                <input id="bairro_cliente" type="text" class="col-sm-6 txtForm form-control" name="bairro_cliente" value="<?=$bairro_cliente?>">
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">Cidade:</label> 
                                <input id="cidade_cliente" type="text" class="col-sm-6 txtForm form-control" name="cidade_cliente" value="<?=$cidade_cliente?>">
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">Estado:</label> 
                                <input id="estado_cliente" type="text" class="col-sm-6 txtForm form-control" name="estado_cliente" value="<?=$estado_cliente?>">
                            </div>
                        </div>
                        <div class="row col-sm-12" style="margin-top: 5px; padding-top: 5px;">
                            <div class="row col-12">
                                <h5 style="margin-top: 15px; border-bottom: 2px rgb(88, 187, 201) solid;">Contato</h5>
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">*Email:</label> 
                                <input id="email_cliente" type="text" class="col-sm-6 txtForm form-control" name='email_cliente' value="<?=$email_cliente?>">
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">Telefone:</label> 
                                <input id="tel_cliente" type="text" class="col-sm-6 txtForm form-control" name='tel_cliente' value="<?=$tel_cliente?>">    
                            </div>
                            <div class="row col-sm-6">
                                <label class="col-sm-5" id="">*Celular:</label> 
                                <input id="cel_cliente" type="text" class="col-sm-6 txtForm form-control" name='cel_cliente' value="<?=$cel_cliente?>">
                            </div>
                            <div class="container" style="margin: 10px 0 0 0; padding: 0;">
                            <p style="margin-bottom: 0;">Todos os campos que contém * são obrigatórios.</p>
                        </div>
                        </div><!-- END FORM CAD -->
                        <div class="row col-sm-3 offset-sm-8">
                            <button type="submit" class="btn btn-success btn-block" name="botao" value="solicitar" style="margin-top: 17px; float:right">Solicitar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
