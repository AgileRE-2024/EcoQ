<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tambahkan Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Roboto:wght@300;400;500&display=swap"
        rel="stylesheet">


    <!-- CSS Khusus Navbar -->
    <style>
        .navbar-brand {
            font-size: 1.5rem;
            font-family: 'Georgia', serif;
        }

        .input-group-text {
            border-radius: 20px 0 0 20px;
        }

        .form-control {
            border-radius: 0 20px 20px 0;
            width: 300px;
        }

        .navbar-nav .nav-link {
            margin-right: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .btn-outline-success {
            border-radius: 0;
            padding: 5px 15px;
            font-weight: 500;
        }

        .btn-outline-green {
            border-radius: 0;
            padding: 5px 15px;
            font-weight: 500;
            background-color: #2f855a;
            color: white;
        }

        .btn-outline-success:hover {
            color: white;
            background-color: #198754;
        }

        .btn-outline-green:hover {
            border-radius: 0;
            padding: 5px 15px;
            font-weight: 500;
            background-color: #245e42;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Panggil komponen Navbar -->
    <x-navbar />

    <x-hero-section />


    <!-- Tambahkan Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
