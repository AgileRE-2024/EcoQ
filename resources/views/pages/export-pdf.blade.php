<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $plant->name }} - Plant Card</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .card {
            width: 297mm;
            height: 210mm;
            position: relative;
            background: linear-gradient(to right, #f0fdf4, #dcfce7, #f0fdf4);
            /* Tailwind green-50 to green-100 to green-50 */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #166534 0%, #15803d 100%);
            /* Tailwind green-800 to green-700 */
            color: #fff;
            padding: 40px;
            height: 40%;
            position: relative;
        }

        .header::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: 0;
            right: 0;
            height: 100px;
            background: linear-gradient(to right, #f0fdf4, #dcfce7, #f0fdf4);
            transform: skewY(-3deg);
        }

        .plant-name {
            font-size: 64px;
            font-weight: bold;
            margin: 0;
            padding: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .scientific-name {
            font-size: 36px;
            font-style: italic;
            margin: 20px 0;
            opacity: 0.9;
        }

        .family-name {
            font-size: 32px;
            margin: 10px 0;
        }

        .taxonomy-path {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.9);
            margin-top: 20px;
            background: rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 8px;
            max-width: 80%;
        }

        .content {
            padding: 40px;
            position: relative;
            z-index: 1;
        }

        .qr-section {
            position: absolute;
            right: 40px;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .qr-code {
            width: 200px;
            height: 200px;
            padding: 10px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .app-info {
            font-size: 24px;
            margin-bottom: 30px;
            color: #166534;
            /* Tailwind green-800 */
            line-height: 1.4;
        }

        .download-info {
            font-size: 20px;
            color: #166534;
            /* Tailwind green-800 */
            padding: 15px;
            background: #bbf7d0;
            /* Tailwind green-200 */
            border-radius: 8px;
            display: inline-block;
        }

        .download-info strong {
            color: #15803d;
            /* Tailwind green-700 */
        }

        .logos {
            position: absolute;
            bottom: 40px;
            left: 40px;
            display: flex;
            align-items: center;
            gap: 40px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .logo {
            height: 60px;
        }

        @media print {
            body {
                background: white;
            }

            .card {
                box-shadow: none;
            }

            /* Memastikan gradien tetap tercetak */
            .card,
            .header,
            .header::after {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="header">
            <h1 class="plant-name">{{ $plant->name }}</h1>
            <div class="scientific-name">{{ $plant->scientific_name }}</div>
            <div class="taxonomy-path">
                {{ $plant->species->genus->family->order->class->phylum->kingdom->name }} >
                {{ $plant->species->genus->family->order->class->phylum->name }} >
                {{ $plant->species->genus->family->order->class->name }} >
                {{ $plant->species->genus->family->order->name }} >
                {{ $plant->species->genus->family->name }} >
                {{ $plant->species->genus->name }} >
                {{ $plant->species->name }}
            </div>
        </div>

        <div class="content">
            <div class="app-info">
                To learn more about this plant, scan the QR code using<br>
                <strong>MyTamanHusada App</strong> or visit<br>
                <strong>tamanhusadagrahafamili.com</strong>
            </div>

            <div class="download-info">
                Download App (Android)<br>
                <strong>bit.ly/myTamanHusada</strong>
            </div>

            <div class="qr-section">
                @if ($plant->qr_image)
                    <img src="{{ URL::asset('storage/' . $plant->qr_image) }}" class="qr-code" alt="QR Code">
                @endif
            </div>

            <div class="logos">
                <img src="C:\Bimo\UNAIR\Semester 5\Pembangunan Perangkat Lunak (Praktikum)\eco_q\public\assets\images\airlangga.png"
                    class="logo" alt="UNAIR Logo">
                <img src="{{ URL::asset('assets/images/intiland.jpg') }}" class="logo" alt="Intiland Logo">
                <img src="{{ URL::asset('assets/images/taman_husada.jpg') }}" class="logo" alt="Taman Husada Logo">
            </div>
        </div>
    </div>
</body>

</html>
