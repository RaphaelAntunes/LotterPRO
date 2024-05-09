


<aside id="sidebar" class="main-sidebar sidebar-dark-info d-none d-md-block elevation-4" style="overflow-x: hidden">

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview"
                role="menu" data-accordion="false">

                <a href="" target="_blank"  class="nav-link">
                    <button type="button" style="background:#24e6b5;"
                        class="btn btn-success btn-side d-flex justify-content-around align-items-center">
                        <p>TESTE</p>
                        <div style="width:35px">💋</div>
                    </button>


                </a>

                 <!-- VISUALIZAÇÃO LIVRE A TODOS -->
                <li
                    class="nav-item nav-group-item has-treeview menu-open">
                    <a href="#" class="nav-link nott">
                      
                        <img width="24"  src="{{ asset('/admin/images/painel/clover.svg')}}" alt="">

                        <p class="title-link">LOTERIAS</p>
                        <i class="right fas fa-angle-left"></i>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href=""
                                class="nav-link ">
                                <img width="25" class="mr-2" src="/storage/" alt="">
                                <p>GAME</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link ">
                                <img width="25" class="mr-2" src="/storage/" alt="">
                                <p>GAME</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link ">
                                <img width="25" class="mr-2" src="/storage/" alt="">
                                <p>GAME</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link ">
                                <img width="25" class="mr-2" src="/storage/" alt="">
                                <p>GAME</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview"
                role="menu" data-accordion="false">

              
                 <!-- VISUALIZAÇÃO LIVRE A TODOS -->
                <li
                    class="nav-item nav-group-item has-treeview">
                    <a href="#" class="nav-link nott">
                        <img width="24"  src="{{ asset('/admin/images/painel/financial.svg')}}" alt="">

                        <p class="title-link">FINANCEIRO</p>
                        <i class="right fas fa-angle-left"></i>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/pedidos"
                                class="nav-link ">
                                <!-- <i class="far fa-dot-circle nav-icon"></i> -->
                                <img width="25" class="mr-2" src="/storage/" alt="">
                                <p>Pedidos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/order"
                                class="nav-link ">
                                <!-- <i class="far fa-dot-circle nav-icon"></i> -->
                                <img width="25" class="mr-2" src="/storage/" alt="">
                                <p>Extrato</p>
                            </a>
                        </li> <li class="nav-item">
                            <a href="/saquepremiacao"
                                class="nav-link ">
                                <!-- <i class="far fa-dot-circle nav-icon"></i> -->
                                <img width="25" class="mr-2" src="/storage/" alt="">
                                <p>Saques de Premiação</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/saquesaldo"
                                class="nav-link ">
                                <!-- <i class="far fa-dot-circle nav-icon"></i> -->
                                <img width="25" class="mr-2" src="/storage/" alt="">
                                <p>Saque de Saldo Disponível</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/atualizarcarteira"
                                class="nav-link ">
                                <!-- <i class="far fa-dot-circle nav-icon"></i> -->
                                <img width="25" class="mr-2" src="/storage/" alt="">
                                <p>Atualizar Carteira</p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>

            <div class="nav-item nav-group-item has-treeview solo-item">
                <a href="/bets"
                    class="nav-link">
                    <img width="24"  src="{{ asset('/admin/images/painel/bets.svg')}}" alt="">
                    <p class="title-link" style="margin:0px;">
                        Minhas Apostas
                    </p>
                </a>
            </div>
            <div class="nav-item nav-group-item has-treeview solo-item">
                <a href="/directs"
                    class="nav-link">
                    <img width="24"  src="{{ asset('/admin/images/painel/direct.svg')}}" alt="">
                    <p class="title-link" style="margin:0px;">
                        Directs
                    </p>
                </a>
            </div>

           
            <div class="nav-item nav-group-item has-treeview solo-item">
                <a href="https://t.me/+ndgVQ-A6ofIzMWQx"
                    class="nav-link" target="_blank">
                    <img width="24"  src="{{ asset('/admin/images/painel/telegram.svg')}}" alt="">
                    <p class="title-link" style="margin:0px;">
                        Telegram Português 
                    </p>
                </a>

            </div>
            <div class="nav-item nav-group-item has-treeview solo-item">
                <a href="https://t.me/+uiUCg-ezR6c4YWVh" 
                    class="nav-link" target="_blank">
                    <img width="24"  src="{{ asset('/admin/images/painel/telegram.svg')}}" alt="">
                    <p class="title-link" style="margin:0px;">
                        Telegram Espanhõl
                    </p>
                </a>

            </div>
            
            <div class="nav-item nav-group-item has-treeview solo-item">
                <a href="https://t.me/+1vX2OMK9Yrs0ZjQx"
                    class="nav-link" target="_blank">
                    <img width="24"  src="{{ asset('/admin/images/painel/telegram.svg')}}" alt="">
                    <p class="title-link" style="margin:0px;">
                        Telegram Inglês 
                    </p>
                </a>

            </div>

        

          
          

        </nav>
    </div>
</aside>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Verifique se a largura da tela é menor que 768 pixels (ou ajuste conforme necessário)
        if (window.innerWidth < 768) {
            setTimeout(function () {
                // Quando a página carregar e estiver em uma tela mobile, remova a classe d-none do elemento com o id "sidebar"
                var sidebar = document.getElementById("sidebar");
                sidebar.classList.remove("d-none");
            }, 1000);
        }
    });
</script>
