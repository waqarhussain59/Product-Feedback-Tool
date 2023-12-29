<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Your website description here">
    <meta name="keywords" content="keywords, separated, by, commas">
    <meta name="author" content="Your Name">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Product Feedback Tool</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emojionearea/dist/emojionearea.min.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha384-xzjw3Tp5xGzCf6l51Z8z+JT6jUgA3UHDOpmxpBHTqke0ddowJz5PzDWz1wOVHptW" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Google Fonts - Nunito -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #app {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        body {
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            color: #555; /* Changed body text color to a darker shade */
        }

        header {
            background-image: linear-gradient(90deg,#96286d,#c33352,#ef3e36); !important; /* Updated header gradient colors */
            color: #fff;
            padding: 50px 20px;
            text-align: center;
        }

        section {
            padding: 50px 20px;
            text-align: center;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            color: #3498db; /* Changed heading color to a shade of blue */
        }

        p {
            font-size: 1.2em;
            color: #777; /* Adjusted paragraph text color */
            margin-bottom: 40px;
        }

        .navbar {
            background-image: linear-gradient(90deg,#96286d,#c33352,#ef3e36); !important; /* Updated navbar gradient colors */
        }

        .navbar-brand,
        .nav-link {
            color: #fff !important;
            font-size: 1.2em;
        }

        .btn-primary {
            background-image: linear-gradient(90deg,#96286d,#c33352,#ef3e36) !important; /* Updated button gradient colors */
            border-color: #3498db;
            font-size: 1.2em;
            border: none !important;
        }

        /*.btn-primary:hover {*/
        /*    background: linear-gradient(90deg, #1f2b38, #217dbb) !important; !* Adjusted button hover gradient colors *!*/
        /*    border-color: #217dbb;*/
        /*}  /*.btn-primary:hover {*/
        /*    background: linear-gradient(90deg, #1f2b38, #217dbb) !important; !* Adjusted button hover gradient colors *!*/
        /*    border-color: #217dbb;*/
        /*}*/

        /* Additional styles for Font Awesome icons within buttons */
        .btn i {
            margin-left: 5px;
        }

        /* Animation styles */
        .animate__animated {
            animation-duration: 1s;
        }

        .animate__fadeIn {
            animation-name: fadeIn;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>

