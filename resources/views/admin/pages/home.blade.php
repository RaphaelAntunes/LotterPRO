@extends('admin.layouts.master')

@section('title', trans('admin.dashboard.page-title'))

@section('content')

<div class="row bg-cc p-2 p-md-5">


    <!-- Modal LOGIN -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-login" style="border-radius:10px;">

                @include('admin.pages.auth.login')


            </div>
            <div class="modal-content modal-register" style="border-radius:10px;">

                @include('admin.pages.auth.register')


            </div>

        </div>
    </div>

    <!-- Modal Create game -->
    <div class="modal fade" id="modalcreategame" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-login" style="border-radius:10px;">
                <div class="col-md-4" style="align-self: flex-end">
                    <button style="background:#ffe400; color:black; padding:3px;" type="submit"
                        class="btn btn-block btn-success mt-3">Adicionar Saldo
                    </button>
                </div>
                <div class="d-flex container card-jogos-done mt-3">
                    <div class="mr-4">
                        <img style=" border-radius: 50%;
                        width: 150px;"
                            src="https://ambientedev.loteriabr.com/storage/logo/L5SDLyqo1PGdh9WUd2Qna8tkhxt8i2otwHLQHU28.jpg"
                            alt="">
                    </div>
                    <div>
                        <h1>Nome do Jogo</h1>
                        <p>Descrição de como jogar Descrição de como jogar Descrição de como jogarDescrição de como
                            jogar Descrição de como jogar</p>
                        <span>premiação maxima: 1000,000</span>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                    <div class="form-group p-2">
                        <select style="background: #303536;" class="form-select form-control mb-2">
                            <option value="7">7 numeros (pode ganhar 3000 vezes)</option>
                            <option value="8">8 numeros (pode ganhar 1500 vezes)</option>
                            <option value="9">9 numeros (pode ganhar 500 vezes)</option>
                            <option value="10">10 numeros (pode ganhar 300 vezes)</option>
                            <option value="15">15 numeros (pode ganhar 15 vezes)</option>
                            <option value="16">16 numeros (pode ganhar 5 vezes)</option>
                        </select>
                    </div>
                    <h4 style="background:#303536; font-size:20px; padding:10px; border-radius:100px;"
                        class="numselecteds textbtnresponsive">Quantidade selecionada:<c style="color:#ffe400;">(0/25)
                        </c>
                    </h4>
                    <div class="d-flex align-items-center mt-3 mb-3">
                        <button type="submit" class="btn btn-block btn-success mr-5">Confirmar Aposta
                        </button>
                        <button style="margin: 0; background: #c95f5f;" type="submit"
                            class="btn btn-block btn-success">Cancelar Aposta
                        </button>
                    </div>
                </div>
                <table class="table text-center">

                    <tbody>
                        <tr>
                            <td>
                                <button id="number_1" type="button" class="btn btn-warning btn-full">1</button>
                            </td>
                            <td>
                                <button id="number_2" type="button" class="btn btn-warning btn-full">2</button>
                            </td>
                            <td>
                                <button id="number_3" type="button" class="btn btn-warning btn-full">3</button>
                            </td>
                            <td>
                                <button id="number_4" type="button" class="btn btn-warning btn-full">4</button>
                            </td>
                            <td>
                                <button id="number_5" type="button" class="btn btn-warning btn-full">5</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button id="number_6" type="button" class="btn btn-warning btn-full">6</button>
                            </td>
                            <td>
                                <button id="number_7" type="button" class="btn btn-warning btn-full">7</button>
                            </td>
                            <td>
                                <button id="number_8" type="button" class="btn btn-warning btn-full">8</button>
                            </td>
                            <td>
                                <button id="number_9" type="button" class="btn btn-warning btn-full">9</button>
                            </td>
                            <td>
                                <button id="number_10" type="button" class="btn btn-warning btn-full">10</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button id="number_11" type="button" class="btn btn-warning btn-full">11</button>
                            </td>
                            <td>
                                <button id="number_12" type="button" class="btn btn-warning btn-full">12</button>
                            </td>
                            <td>
                                <button id="number_13" type="button" class="btn btn-warning btn-full">13</button>
                            </td>
                            <td>
                                <button id="number_14" type="button" class="btn btn-warning btn-full">14</button>
                            </td>
                            <td>
                                <button id="number_15" type="button" class="btn btn-warning btn-full">15</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button id="number_16" type="button" class="btn btn-warning btn-full">16</button>
                            </td>
                            <td>
                                <button id="number_17" type="button" class="btn btn-warning btn-full">17</button>
                            </td>
                            <td>
                                <button id="number_18" type="button" class="btn btn-warning btn-full">18</button>
                            </td>
                            <td>
                                <button id="number_19" type="button" class="btn btn-warning btn-full">19</button>
                            </td>
                            <td>
                                <button id="number_20" type="button" class="btn btn-warning btn-full">20</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button id="number_21" type="button" class="btn btn-warning btn-full">21</button>
                            </td>
                            <td>
                                <button id="number_22" type="button" class="btn btn-warning btn-full">22</button>
                            </td>
                            <td>
                                <button id="number_23" type="button" class="btn btn-warning btn-full">23</button>
                            </td>
                            <td>
                                <button id="number_24" type="button" class="btn btn-warning btn-full">24</button>
                            </td>
                            <td>
                                <button id="number_25" type="button" class="btn btn-warning btn-full">25</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <script>
        $('.modal-register').hide();



        function toggleModal(modalType) {

            if (!modalType) {
                // Se nenhum parâmetro for fornecido, faz o toggle automaticamente
                $('.modal-login, .modal-register').toggle();
            } else if (modalType === 'login') {
                $('.modal-login').show();
                $('.modal-register').hide();
            } else if (modalType === 'register') {
                $('.modal-login').hide();
                $('.modal-register').show();
            }
        }
    </script>

    <!-- CARD GRANDE -->
    <div class="container">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

            </ol>
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://i.ibb.co/pRpF3xw/Texto-do-seu-par-grafo.jpg" alt="aaa">
                </div>
            </div>

            <a class="carousel-control-prev nott" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next nott" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container mt-2">



        <!-- Nav icons -->

        <!-- Conteúdo da sua view existente -->
        <div class="swiperroll p-2">
            <div class="swiper-wrapper">
                <div class="swiper-slide d-flex flex-column category-info" data-type-game-id="loto_facil">
                    <div class="icon-container">
                        <img class="img-bold" src="https://i.ibb.co/LSKMnnt/50-x-58.jpg" alt="">

                    </div>
                    <div>
                        <p class="txtnav">JOGO 1</p>
                    </div>
                </div>
                <div class="swiper-slide d-flex flex-column category-info" data-type-game-id="quina">
                    <div class="icon-container">
                        <img class="img-bold" src="https://i.ibb.co/LSKMnnt/50-x-58.jpg" alt="">

                    </div>
                    <div>
                        <p class="txtnav">JOGO 2</p>
                    </div>
                </div>
                <div class="swiper-slide d-flex flex-column category-info" data-type-game-id="mega_sena">
                    <div class="icon-container">
                        <img class="img-bold" src="https://i.ibb.co/LSKMnnt/50-x-58.jpg" alt="">

                    </div>
                    <div>
                        <p class="txtnav">JOGO 3</p>
                    </div>
                </div>
                <div class="swiper-slide d-flex flex-column category-info" data-type-game-id="loto_mania">
                    <div class="icon-container">
                        <img class="img-bold" src="https://i.ibb.co/LSKMnnt/50-x-58.jpg" alt="">

                    </div>
                    <div>
                        <p class="txtnav">JOGO 4</p>
                    </div>
                </div>
                <div class="swiper-slide d-flex flex-column category-info" data-type-game-id="dia_de_sorte">
                    <div class="icon-container">
                        <img class="img-bold" src="https://i.ibb.co/LSKMnnt/50-x-58.jpg" alt="">

                    </div>
                    <div>
                        <p class="txtnav">JOGO 5</p>
                    </div>
                </div>
                <div class="swiper-slide d-flex flex-column category-info" data-type-game-id="time_mania">
                    <div class="icon-container">
                        <img class="img-bold" src="https://i.ibb.co/LSKMnnt/50-x-58.jpg" alt="">

                    </div>
                    <div>
                        <p class="txtnav">JOGO 6</p>
                    </div>
                </div>
                <div class="swiper-slide d-flex flex-column category-info" data-type-game-id="dupla_sena">
                    <div class="icon-container">
                        <img class="img-bold" src="https://i.ibb.co/LSKMnnt/50-x-58.jpg" alt="">

                    </div>
                    <div>
                        <p class="txtnav">JOGO 7</p>
                    </div>
                </div>
                <div class="swiper-slide d-flex flex-column category-info" data-type-game-id="mais_milionaria">
                    <div class="icon-container">
                        <img class="img-bold" src="https://i.ibb.co/LSKMnnt/50-x-58.jpg" alt="">

                    </div>
                    <div>
                        <p class="txtnav">JOGO 8</p>
                    </div>
                </div>
                <div class="swiper-slide d-flex flex-column category-info" data-type-game-id="lotinha_corujao">
                    <div class="icon-container">
                        <img class="img-bold" src="https://i.ibb.co/LSKMnnt/50-x-58.jpg" alt="">

                    </div>
                    <div>
                        <p class="txtnav">JOGO 9</p>
                    </div>
                </div>
                <div class="swiper-slide d-flex flex-column category-info" data-type-game-id="mega_kino">
                    <div class="icon-container">
                        <img class="img-bold" src="https://i.ibb.co/LSKMnnt/50-x-58.jpg" alt="">

                    </div>
                    <div>
                        <p class="txtnav">JOGO 10</p>
                    </div>
                </div>
                <div class="swiper-slide d-flex flex-column category-info" data-type-game-id="santa_lucia_double">
                    <div class="icon-container">
                        <img class="img-bold" src="https://i.ibb.co/LSKMnnt/50-x-58.jpg" alt="">

                    </div>
                    <div>
                        <p class="txtnav">JOGO 11</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recomendados -->
        <div class="container mt-5">
            <div class="d-flex swipe-controles justify-content-between align-items-center mb-2">
                <div class="d-flex">
                    <h1 style="color:white">Recomendados</h1>
                    <svg width="10" class="ml-3 mr-3 swiper-prev swp" fill="#5A6268" color="#5A6268" data-v-3d6f2aec=""
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor"
                            d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z">
                        </path>
                    </svg>
                    <svg width="10" class="swiper-next swp" fill="#5A6268" color="#5A6268" data-v-3d6f2aec=""
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor"
                            d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z">
                        </path>
                    </svg>
                </div>
                <div>
                </div>
            </div>

            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-none d-md-block">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-md-none">

                            <a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-none d-md-block">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-md-none">

                            <a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-none d-md-block">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-md-none">

                            <a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-none d-md-block">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-md-none">

                            <a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-none d-md-block">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-md-none">

                            <a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-none d-md-block">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-md-none">

                            <a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-none d-md-block">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-md-none">

                            <a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-none d-md-block">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-md-none">

                            <a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-none d-md-block">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-md-none">

                            <a>
                    </div>
                    <div class="swiper-slide">
                        <a href="0">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-none d-md-block">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-md-none">

                            <a>
                    </div>
                    <div class="swiper-slide">
                        <a href="1">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-none d-md-block">
                            <img style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                src="https://i.ibb.co/VDCcFWP/360-x-100.jpg" class="d-md-none">

                            <a>
                    </div>
                </div>
            </div>

        </div>

        <div class="container mt-5">
            <div class="d-flex swipe-controles justify-content-between align-items-center mb-2">
                <div class="d-flex">
                    <h1 style="color:white">Sorteios Hoje</h1>
                    <svg width="10" class="ml-3 mr-3 swiper-jogos-prev swp" fill="#5A6268" color="#5A6268"
                        data-v-3d6f2aec="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor"
                            d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z">
                        </path>
                    </svg>
                    <svg width="10" class="swiper-jogos-next swp" fill="#5A6268" color="#5A6268" data-v-3d6f2aec=""
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor"
                            d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z">
                        </path>
                    </svg>
                </div>
                <div>
                </div>
            </div>

            <div class="swiperjogos">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>


        <div class="container mt-5">
            <div class="d-flex swipe-controles justify-content-between align-items-center mb-2">
                <div class="d-flex">
                    <h1 style="color:white">Jogos</h1>
                    <svg width="10" class="ml-3 mr-3 swiper-jogos2-prev swp" fill="#5A6268" color="#5A6268"
                        data-v-3d6f2aec="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor"
                            d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z">
                        </path>
                    </svg>
                    <svg width="10" class="swiper-jogos2-next swp" fill="#5A6268" color="#5A6268" data-v-3d6f2aec=""
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor"
                            d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z">
                        </path>
                    </svg>
                </div>
                <div>
                </div>
            </div>

            <div class="swiperjogos2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex p-2 box-imgs">
                            <a href="" class="hover-container">
                                <img class="img-todos-jogos"
                                    style="border-radius: 10px; width: 100%; height: 100%; object-fit: cover;"
                                    src="https://i.ibb.co/8KYqhP4/159-x-185.jpg">
                                <div class="hover-content">
                                    <p>Jogo</p>
                                    <button class="btn btn-primary">Jogar Agora</button>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>




    </div>

</div>





@endsection

@push('styles')
<style>
    .login100-form-btn {
        border-radius: 20px;
        padding: 10px;
        border: none;
        width: 100%;
        background: #9FD214;
        color: #212425;
        font-weight: 700;
    }

    .login100-form-btn:hover {
        background: #212425;
        color: #9FD214;
        font-weight: 700;
        border: 1px solid #9FD214;
    }
</style>
<style>
    .modal-content {
        background-color: #212425;
    }

    .img-bold {

        width: 100%;
        max-width: 50px;
        position: relative;
        z-index: 1;
        transition: .2s;
    }

    .img-bold:hover {
        max-width: 60px;

    }

    .txtnav {
        font-weight: bold;
        text-align: center;
        font-size: 14px;
    }

    .icon-container {
        position: relative;
        display: inline-block;
        padding: 20px;
    }

    .icon-container:after {
        content: "";
        position: absolute;
        border-radius: 50%;
        width: 80px;
        height: 80px;
        background: #ffe400;
        opacity: 0.15;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: -1;
    }

    .icon-container:hover:after {
        background-color: #bcff00;
    }

    @media screen and (max-width: 992px) {
        .img-bold {

            max-width: 35px;
        }

        .txtnav {
            font-size: 12px;
        }

        .icon-container:after {

            width: 60px;
            height: 60px;

        }

        .img-bold:hover {
            max-width: 40px;

        }


        .card-indica h5 {
            font-size: 15px;
        }

        .icon-copy {
            font-size: 25px;
            color: #ffe400;
        }


        .hover-content {
            padding: 10px !important;
        }

        .hover-content p {
            font-size: 10px;

        }

        .hover-content button {
            font-size: 10px;
            padding: 5px;

        }

    }

    *:focus {
        outline: none;
    }

    .link_copy_link {
        width: 100%;
        padding: .5em 0 .5em 0;
        border: 1px solid #007bff;
        font-size: 24px;
        text-align: center;
    }

    .link_copy_link:active,
    .link_copy_link:focus,
    .link_copy_link:focus-visible {
        border: 1px solid #00c054 !important;
    }

    .bg-light-2 {
        background-color: #f8f9fa !important;
    }

    .indica-corpo {
        padding: 35px;
    }

    .mensagem {
        color: #000;
        font-size: 10px;
        text-align: center;
        margin-top: 10px;
    }

    .hover-container {
        position: relative;
    }

    .hover-content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        text-align: center;
        display: none;
        background-color: rgba(0, 0, 0, 0.7);
        padding: 20px;
        border-radius: 10px;
        color: #fff;
        box-sizing: border-box;
    }

    .hover-container:hover .hover-content {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .hover-content p {

        font-weight: 700;

    }

    .hover-button {
        padding: 10px;
        background-color: #3498db;
        color: #fff;
        border: none;
        cursor: pointer;
    }


    @media screen and (max-width: 600px) {
        .faixa-jogos {
            background: url(https://superlotogiro.com/images/super-lotogiro01.jpg) auto;
            background-position: center;
        }


        .btn {
            padding: 10px;

        }

        .indica-corpo {
            padding: 0px;
        }

        .layout-fixed .main-sidebar {
            top: 56px;
        }
    }

    @media screen and (max-width: 1400px) {
        .hover-content {
            padding: 10px !important;
        }

        .hover-content p {
            font-size: 12px;

        }

        .hover-content button {
            font-size: 10px;
            padding: 5px;

        }
    }
</style>
@endpush

@push('scripts')


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var button = document.querySelector('.btn-collapse');
        button.addEventListener('click', function () {
            if (button.innerText === 'Ver Mais') {
                button.innerText = 'Ver Menos';
            } else {
                button.innerText = 'Ver Mais';
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.category-info').click(function () {
            var typeGameId = $(this).data('type-game-id');
            var categoriesContainer = $('#categories-container');

            // Verifica se o container está visível
            if (categoriesContainer.is(':visible') && categoriesContainer.data('type-game-id') === typeGameId) {
                // Se estiver visível e clicando no mesmo typeGameId, oculta o container
                categoriesContainer.hide();
            } else {
                // Faz uma requisição AJAX para obter as categorias
                $.ajax({
                    url: '/admin/categoria/'+typeGameId,
                    type: 'GET',
                    success: function (data) {
                        $('#categories-container').html(data);
                        var formattedTypeGameId = formatTypeGameId(typeGameId);
                        $('#nome_pesq').text(formattedTypeGameId);

                        // Atualiza os atributos de data para o novo typeGameId
                        categoriesContainer.data('type-game-id', typeGameId);
                    },
                    error: function (error) {
                        console.log('Erro na requisição AJAX:', error);
                    }
                });

                // Mostra o container
                categoriesContainer.show();
            }
        });

        var swiperroll = new Swiper('.swiperroll', {
            slidesPerView: 5,

            breakpoints: {
                768: {
                    slidesPerView: 6,
                }
            }
        });


        var swiperlist = new Swiper('.swiper-list', {
            slidesPerView: 4,
            navigation: {
                nextEl: '.swiper-list-next',
                prevEl: '.swiper-list-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 6,
                }
            }
        });

        var swiperbichao = new Swiper('.swiper-bichao', {
            slidesPerView: 3,
            navigation: {
                nextEl: '.swiper-bichao-next',
                prevEl: '.swiper-bichao-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 6,
                }
            }
        });

        var swiper = new Swiper('.swiper', {
            slidesPerView: 3,
            loop: true,
            autoplay:true,
            navigation: {
                nextEl: '.swiper-next',
                prevEl: '.swiper-prev',
            },
        });

        var swiperjogos = new Swiper('.swiperjogos', {
            slidesPerView: 6,
            loop: true,
            autoplay:true,
            navigation: {
                nextEl: '.swiper-jogos-next',
                prevEl: '.swiper-jogos-prev',
            },
        });

        var swiperjogos2 = new Swiper('.swiperjogos2', {
            slidesPerView: 6,
            loop: true,
            autoplay:true,
            navigation: {
                nextEl: '.swiper-jogos2-next',
                prevEl: '.swiper-jogos2-prev',
            },
        });

        

        function formatTypeGameId(typeGameId) {
            // Divide a string em palavras
            var words = typeGameId.split('_');

            // Capitaliza a primeira letra de cada palavra
            for (var i = 0; i < words.length; i++) {
                words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
            }

            // Junta as palavras novamente com espaço em branco
            return words.join(' ');
        }

        var suaVariavelJavaScript = @json(session('login'));

    if(suaVariavelJavaScript){
    $('#exampleModalCenter').modal('show');

}


        @if (session('error') || session('erro') || $errors -> has('email') || $errors -> has('password'))
            $('#exampleModalCenter').modal('show');
        @endif


        @if (!auth() -> check())
            $('a:not(.login, .nott), button:not(.btn-side,.login,.nott)').on('click', function (event) {
                event.preventDefault();
                $('#exampleModalCenter').modal('show');
            });
        @endif

      
            
        //$('#modalcreategame').modal('show');


        


    });




</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

</script>
@endpush