<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Confirmation de la réservation du {{ $date }} à {{ $hour }}</h1>
    <p>Votre place a bien été réservée ! 😉</p>
    <p>Nous vous attendons pour jouer ! 🎮 </p>
    <p>Numéro de réservation: {{ $token }}</p>
    <div style="text-align: center;">
    <small>Vous souhaitez annuler ?</small>
        <a href='http://localhost:8100/tabs/annulation'>
        <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-lg">Annuler</button>

        </a>
    </div>
    


</body>
</html>