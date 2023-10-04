<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pedido</title>
</head>

<body style="font-family: 'Arial', sans-serif;
background-color: #f1eff1e0;
margin: 0;
padding: 0;
margin: 20px;">
    <div style=" display: flex;
    justify-content: center;
    padding: 20px;">
        <div
            style=" max-width: 600px;
        width: 100%;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-top: 20px;
        margin-bottom: 20px;">
            <div style="text-align: center;
            margin-bottom: 20px;">
                <img src="{{ asset('img/logo/FAMILC.png') }}"
                    style=" width: 150px;
                height: 150px;
                border-radius: 50%;"
                    alt="Logo">
            </div>

            <div
                style=" background-color: rgba(255, 255, 255, 0.842);
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 20px;">
                <h1 style="color: blueviolet;">{{ $nombres }}</h1>
                <p style="font-size: 18px;">¡Venta realizada por: , {{ $nombres }}!</p>
            </div>

            <div
                style=" background-color: rgba(255, 255, 255, 0.842);
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 20px;">
                <h2 style="color: blueviolet;
                font-size: 20px;">Monto total de la Compra</h2>
                <p style="font-size: 18px;">Total Compra: S/.{{ $total_venta }}</p>
                <p style="font-size: 18px;">Estado: Cancelado</p>
                <p style="font-size: 18px;">WhatsApp: {{ $telefono }}</p>
            </div>

            <div
                style=" margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.842);
            border-radius: 10px;
            padding: 20px;">
                <h2 style="color: blueviolet;
                font-size: 20px;">Socios</h2>
                <ul style="list-style: none;
                padding: 0;
                margin: 0;">
                    <li style="margin-bottom: 5px;">j.a_alarcon_24@outlook.com</li>
                    <li style="margin-bottom: 5px;">nsnyliz@gmail.com</li>
                    <li style="margin-bottom: 5px;">Huamanirosase@gmail.com</li>
                    <li style="margin-bottom: 5px;">nunezcancharimabell@gmail.com | +51 952 955 205</li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
