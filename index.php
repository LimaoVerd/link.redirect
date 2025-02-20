<!DOCTYPE html><html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bk Burguer</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const idRestaurante = "2703ae9c-401d-4d9d-bf8f-a9a14be2b313";
            const linkRestaurante = "https://www.ifood.com.br/delivery/macapa-ap/bkburguer-buritizal/" + idRestaurante;
            const linkIfoodMobile = "ifood://restaurant/" + idRestaurante;
            const linkAppStore = "https://apps.apple.com/app/ifood/id570393508";
            const linkGooglePlay = "https://play.google.com/store/apps/details?id=br.com.brainweb.ifood";let userAgent = navigator.userAgent || navigator.vendor || window.opera;
        let destino = linkRestaurante;
        let appLink = null;
        
        if (/iPhone|iPad|iPod/.test(userAgent)) {
            destino = linkIfoodMobile;
            appLink = linkAppStore;
        } else if (/Android/.test(userAgent)) {
            destino = linkIfoodMobile;
            appLink = linkGooglePlay;
        }
        
        function redirecionar() {
            window.location.href = destino;
            setTimeout(() => {
                if (appLink) window.location.href = appLink;
            }, 3000);
        }
        
        document.getElementById("irAoCardapio").addEventListener("click", redirecionar);
        document.getElementById("baixarApp").addEventListener("click", () => {
            if (appLink) window.location.href = appLink;
        });
        
        setTimeout(redirecionar, 10000);
    });
</script>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 offset-md-5 text-center">
                <img class="logo" src="images/ifood.png" alt="Logo">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <div class="spinner-border text-danger" style="width: 5rem; height: 5rem; margin: 50px 0;" role="status"></div>
                <p>Olá, estamos conectando você com o nosso cardápio!</p>
                <p>Você será redirecionado em <span id="contador">10</span> segundos.</p>
                <button id="irAoCardapio" class="btn btn-secondary">Ir ao cardápio</button>
                <button id="baixarApp" class="btn btn-danger mt-2">Baixar o aplicativo</button>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>