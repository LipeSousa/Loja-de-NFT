<?php
$nomeCompleto = $_SESSION['name'];
$partesNome = explode(' ', $nomeCompleto);
$primeiroNome = $partesNome[0];
?>
<main class="main" id="main">
        <div class="page-title">Bem-Vindo ao seu Carrinho <span style="font-weight: bold;">
                <?php echo $primeiroNome; ?>
            </span></div>
        <div class="content">
            <section>
                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        
                    </tbody>
                </table>
            </section>
            <aside>
                <div class="box">
                    <div class="box-header">Resumo da Compra</div>
                    <div class="info">
                        <div><span>Sub-Total</span><span id="totalAmount">0.00 ETH</span></div>
                       <!-- <div><button>Adicionar Cupom de Desconto <i class="bx bx-right-arrow-alt"></i></button></div> -->
                    </div>
                    <div class="footer-01"><span>Total</span>
                        <span id="totalAmount1">0.00 ETH</span>
                    </div>
                </div>
                <button id="checkoutButton">Ir para o Pedido</button>
            </aside>
        </div>
    </main>