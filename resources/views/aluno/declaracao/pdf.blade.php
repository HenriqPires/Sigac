<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Declaração de Horas Complementares</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            margin: 50px;
            line-height: 1.6;
        }

        .titulo {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .conteudo {
            margin-top: 20px;
        }

        .assinatura {
            margin-top: 50px;
            text-align: center;
        }

        .assinatura p {
            margin: 0;
        }

        .dados {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="titulo">
        Declaração de Cumprimento de Horas Complementares
    </div>

    <div class="conteudo">
        <p>Declaramos para os devidos fins que <strong>{{ $nome }}</strong>, regularmente matriculado no curso, cumpriu um total de <strong>{{ $horas }} horas complementares</strong>, conforme as normas da instituição.</p>

        <p class="dados">Data de emissão: <strong>{{ $data }}</strong></p>
    </div>

    <div class="assinatura">
        <p>_______________________________</p>
        <p>Coordenação Geral</p>
        <p>SIGAC - Sistema de Gestão de Atividades Complementares</p>
    </div>

</body>
</html>
