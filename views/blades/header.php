<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apex Bank - Sua melhor opção em serviços financeiros</title>
    <!-- Adicione os arquivos CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Adicione o CSS personalizado -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Adicione as fontes do Google -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    * {
        font-family: 'Roboto';
    }

    .botao {
        background-color: purple;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
    }

    .card {
        background-color: rgb(189, 189, 189);
    }

    .card:hover {
        transform: 4;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }

    .botao:hover {
        background-color: #491755;

    }

    .btn-primary {
        border: none;
        background-color: rgba(95, 26, 181, 1)
    }

    @keyframes elevate {
        0% {
            transform: translate3d(0, 0, 0) rotate3d(0, 0, 1, 0deg);
            box-shadow: 0px 0px 0px rgba(0, 0, 0, 0);
        }

        50% {
            transform: translate3d(0, -5px, 0) rotate3d(0, 0, 1, 3deg);
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        }

        100% {
            transform: translate3d(0, 0px, 0) rotate3d(0, 0, 1, 0deg);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }
    }

    .btn-primary:hover {
        border: none;
        animation: elevate 2s ease-in  infinite;
    }
    </style>
</head>