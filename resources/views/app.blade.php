<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Paymolt es un robusto aplicativo que genera enlaces de pago para hacer efectivo tus cobros por internet con cualquier tipo de tarjeta de débito o crédito." />
    <meta inertia property="og:title" content="Acepta pagos con tarjeta sin complicaciones - Paymolt" />
    <meta inertia property="og:description"
        content="Paymolt es un robusto aplicativo que genera enlaces de pago para hacer efectivo tus cobros por internet con cualquier tipo de tarjeta de débito o crédito." />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('images/open_graph-paymolt_brand.png') }}" />

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/d5fbbacbfe.js" crossorigin="anonymous"></script>
    <!-- Incluyendo .js de Culqi JS -->
    <script src="https://checkout.culqi.com/v2"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTIC_ID') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', "{{ env('GOOGLE_ANALYTIC_ID') }}");
    </script>
</head>

<body class="font-sans antialiased">
    @inertia

    @env('local')
    <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
    @endenv
</body>

</html>
