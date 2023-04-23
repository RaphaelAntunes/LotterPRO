COMPROVANTE DE APOSTA

BICHÃO DA SORTE

@if($prize == 1)
PREMIADO

@endif
NÚMERO DO BILHETE: {{$game->id}}°

EMITIDO EM: {{\Carbon\Carbon::parse($game->criado_em)->format('d/m/Y H:i:s')}}

CPF: {{\App\Helper\Mask::addMaskCpf($game->cliente_cpf)}}

PARTICIPANTE: {{mb_strtoupper($game->cliente_nome . ' ' . $game->cliente_sobrenome, 'UTF-8') }}

DATA SORTEIO: {{\Carbon\Carbon::parse($game->criado_em)->format('d/m/Y')}}

HORA SORTEIO: {{\Carbon\Carbon::parse($game->horario)->format('H:i:s')}}

{{mb_strtoupper($game->modalidade_nome, 'UTF-8')}}

APOSTA: {{ $aposta }}

PRÊMIOS: {{ $premios }}°

VALOR APOSTADO: R${{\App\Helper\Money::toReal($game->valor)}}

GANHO MÁXIMO: R${{\App\Helper\Money::toReal($game->valor * $game->multiplicador)}}


