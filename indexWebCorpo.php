<!-- TABELA ORÇAMENTOS -->
<div id="consAtendimento" class="container" style="background: transparent; border:none; padding: 15px; font-family: 'Quicksand', sans-serif; color: black;">
            <div class="container">
                <table id="tabelaAtendimento" class="table table-light table-hover table-striped" style="">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone/Celular</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Nome Kit</th>
                        <th scope="col">Valor Kit</th>
                        <th scope="col">Data Venda</th>
                        </tr>
                    </thead>
                    <?php
                        $selectAtendimento = "SELECT
                        tb_venda.COD_VENDA,
                        tb_kit.NOME_KIT,
                        tb_cliente.NOME_CLIENTE,
                        tb_cliente.CPF_CLIENTE,
                        tb_cliente.CEL_CLIENTE,
                        tb_cliente.TEL_CLIENTE,
                        tb_venda.VALOR_VENDA,
                        tb_venda.DATA_VENDA,
                        tb_cliente.ESTADO_CLIENTE
                        FROM
                        tb_venda
                        INNER JOIN tb_kit ON tb_kit.COD_KIT = tb_venda.COD_KIT
                        INNER JOIN tb_forn ON tb_forn.COD_FORN = tb_venda.COD_FORN
                        INNER JOIN tb_cliente ON tb_cliente.COD_CLIENTE = tb_venda.COD_CLIENTE";
                        

                        $Matriz = $conexao->prepare($selectAtendimento);
                        $Matriz->execute();
                        
                        while ($Linha = $Matriz->fetch(PDO::FETCH_OBJ)){
                            
                            $data = date("d/m/Y", strtotime($Linha->DATA_VENDA));
                    ?>
                            <tr>
                                <td><?=$Linha->COD_VENDA?>
                                <td><?=$Linha->NOME_CLIENTE?>
                                <td><?=$Linha->CPF_CLIENTE?>
                                <td><?=$Linha->TEL_CLIENTE. "\n" .$Linha->CEL_CLIENTE?>
                                <td><?=$Linha->ESTADO_CLIENTE?>
                                <td><?=$Linha->NOME_KIT?>
                                <td><?=$Linha->VALOR_VENDA?>
                                <td><?=$data?>
                            </tr>
                    <?php        
                        } 
                    ?>
                </table>
            </div>
        </div>
        <!-- DATA TABLE -->
        <script>
            $(document).ready( function () {
                $('#tabelaAtendimento').DataTable();
            } );
        </script>