<?php
define("page_title", "Bk Burguer");
define("logo", "ifood.png");
define("id_restaurante", "2703ae9c-401d-4d9d-bf8f-a9a14be2b313");
define("link_restaurante", "https://www.ifood.com.br/delivery/macapa-ap/bkburguer-buritizal/2703ae9c-401d-4d9d-bf8f-a9a14be2b313");
define("id_gtm", "GTM-W8HLDDGP");
define("mensagem_personalizada", "Olá, estamos conectando você com o nosso cardápio!");

function IdentificaDispositivo() {
    $LinkIfoodMobile = "ifood://restaurant/" . id_restaurante;
    $LinkIfoodComputador = link_restaurante;
    $LinkAppStore = "https://apps.apple.com/app/ifood/id570393508"; // App Store
    $LinkGooglePlay = "https://play.google.com/store/apps/details?id=br.com.brainweb.ifood"; // Google Play

    $iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
    $ipad = strpos($_SERVER['HTTP_USER_AGENT'], "iPad");
    $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

    if ($iphone || $ipad) {
        return json_encode(['mobile' => $LinkIfoodMobile, 'store' => $LinkAppStore]);
    } elseif ($android) {
        return json_encode(['mobile' => $LinkIfoodMobile, 'store' => $LinkGooglePlay]);
    } else {
        return json_encode(['web' => $LinkIfoodComputador, 'store' => null]);
    }
}
$links = IdentificaDispositivo();
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <title><?php echo page_title; ?></title>
    <script>
        var links = <?php echo $links; ?>;

        // Redirecionamento automático
        function redirecionarParaDestino() {
            if (links.mobile) {
                // Tenta abrir o aplicativo via deep link
                window.location.href = links.mobile;
            } else if (links.web) {
                // Redireciona para o site no PC
                window.location.href = links.web;
            }
        }

        // Ação manual do botão "Ir ao cardápio"
        function irAoCardapio() {
            redirecionarParaDestino();
        }

        // Ação manual do botão "Baixar o aplicativo"
        function baixarApp() {
            if (links.store) {
                window.location.href = links.store;
            } else {
                alert("Loja de aplicativos não identificada.");
            }
        }

        // Redirecionamento automático na carga da página
        window.onload = function () {
            redirecionarParaDestino();
        };
    </script>
</head>
<body>
    <!-- Google Tag Manager -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo id_gtm; ?>"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 offset-md-5 text-center">
                <img class="logo" src="images/<?php echo logo; ?>" alt="Logo">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="text-center">
                    <div class="spinner-border text-danger" style="width: 5rem; height: 5rem; margin: 50px 0;" role="status"></div>
                </div>
                <p class="text-center mensagem"><?php echo mensagem_personalizada; ?></p>
                <div class="text-center">
                    <!-- Botão manual para abrir o aplicativo ou site -->
                    <button id="irAoCardapio" class="btn btn-secondary" onclick="irAoCardapio()">
                        Ir ao cardápio
                    </button>
                    <br>
                    <!-- Botão para baixar o aplicativo -->
                    <button id="baixarApp" class="btn btn-danger mt-2" onclick="baixarApp()">
                        Baixar o aplicativo
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
