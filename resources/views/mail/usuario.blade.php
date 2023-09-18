<div style="display: flex;justify-content: center; background-color: #f1eff1e0; padding: 14px">
    <div>
        <div style="text-align: center; margin: auto">
            <img src="{{ asset('img/logo/FAMILC.png') }}" style="width: 200px; height: 200px; border-radius: 50%"
                alt="...">
        </div>
        <div
            style="width: 100% ;border-radius: 10px;background-color: rgba(255, 255, 255, 0.842); margin-bottom: 10px; margin-top:20px; padding: 15px;">
            <h1 style="color: blueviolet;">{{ $nombres }}</h1>
            <p style="font-size: 22px;">Bienvenido a Familc - 4Ositos {{ $nombres }}.
                Gracias por
                elegirnos - Detalles de tu pedido</p>
        </div>

        <div
            style="width: 100% ;border-radius: 10px;background-color: rgba(255, 255, 255, 0.842); margin-bottom: 10px; margin-top:20px; padding: 15px;">
            <h2 style="color: blueviolet; font-size: 20px;">Monto total de la Compra que realizaste</h2>
            <p style="">Total Compra: S/.{{ $total_venta }}</p>
            <p style="">Estado : por Entragar</p>
            <p style="">Whasaap : {{ $telefono }}</p>
        </div>

        <div
            style="width: 100% ;border-radius: 10px;background-color: rgba(255, 255, 255, 0.842); margin-bottom: 10px; margin-top:20px; padding: 15px;">
            <h2 style="color: blueviolet; font-size: 20px;">Nuestro Socios se pondrán en contacto contigo</h2>
            <ul style="list-style: none">
                <li>j.a_alarcon_24@outlook.com</li>
                <li>nsnyliz@gmail.com</li>
                <li>Huamanirosase@gmail.com</li>
                <li>nunezcancharimabell@gmail.com | +51 952 955 205</li>
            </ul>
        </div>
    </div>
</div>
