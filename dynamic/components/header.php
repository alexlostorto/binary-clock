<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <!-- Google Console Verification -->
        <meta name="google-site-verification" content="Ypc_O50xyYcRsv6t5OlfQYcCYE6oPsvqoFYubJ__8UY" />

        <!-- Default Settings -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- SEO -->
        <meta name="keywords" content="<?= $seo_keywords ?>" />
        <meta name="description" content="<?= $seo_description ?>" />
        <meta name="author" content="<?= $seo_author ?>" />

        <!-- Icons -->
        <!-- <link rel="apple-touch-icon" sizes="180x180" href="../assets/icons/apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/icons/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/icons/favicon-16x16.png" /> -->

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            html, body {
                width: 100%;
                height: 100%;
            }

            a {
                text-decoration: none;
                color: black;
            }
        </style>

        <!-- Hotjar -->
        <script defer>
        (function (h, o, t, j, a, r) {
            h.hj =
            h.hj ||
            function () {
                (h.hj.q = h.hj.q || []).push(arguments);
            };
            h._hjSettings = { hjid: 3560401, hjsv: 6 };
            a = o.getElementsByTagName("head")[0];
            r = o.createElement("script");
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, "https://static.hotjar.com/c/hotjar-", ".js?sv=");
        </script>

        <title><?= $site_title ?></title>
    </head>
    <body class="d-flex flex-column align-items-center justify-content-center">