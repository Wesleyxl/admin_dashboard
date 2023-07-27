<?php

if (! function_exists('current_time')) {
    function current_time($dataHoraEspecifica) {
        // $dataHoraEspecifica = new DateTime('2023-07-26 15:30:00');

        // Obtenha a data e hora atual
        $dataHoraAtual = new DateTime();

        // Calcule a diferença entre as duas datas/horas
        $intervalo = $dataHoraEspecifica->diff($dataHoraAtual);

        // Construa a frase com a informação de tempo decorrido
        $mensagem = '';

        if ($intervalo->y > 0) {
            $mensagem = $intervalo->y . ($intervalo->y === 1 ? ' ano' : ' anos') . ' atrás';
            return $mensagem;
        }

        if ($intervalo->m > 0) {
            $mensagem = $intervalo->m . ($intervalo->m === 1 ? ' mês' : ' meses') . ' atrás';
            return $mensagem;
        }

        if ($intervalo->d > 0) {
            $mensagem = $intervalo->d . ($intervalo->d === 1 ? ' dia' : ' dias') . ' atrás';
            return $mensagem;
        }

        if ($intervalo->h > 0) {
            $mensagem = $intervalo->h . ($intervalo->h === 1 ? ' hora' : ' horas') . ' atrás';
            return $mensagem;
        }

        if ($intervalo->i > 0) {
            $mensagem = $intervalo->i . ($intervalo->i === 1 ? ' minuto' : ' minutos') . ' atrás';
            return $mensagem;
        }

        if ($intervalo->s > 0) {
            $mensagem = $intervalo->s . ($intervalo->s === 1 ? ' segundo' : ' segundos') . ' atrás';
            return $mensagem;
        }

        if (empty($mensagem)) {
            return 'agora mesmo';
        }
    }
}
