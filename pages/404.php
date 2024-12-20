<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #FFE4C4;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 80px;
            color: #FF5733;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
            animation: bounce 2s infinite;
        }

        p {
            font-size: 20px;
            color: #FF4500;
            margin: 20px 0;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
            color: #fff;
            background-color: #FF4500;
            border-radius: 8px;
            text-decoration: none;
            transition: transform 0.2s, background-color 0.3s;
        }

        a:hover {
            background-color: #E63900;
            transform: scale(1.1);
        }

        .animation {
            height: 150px;
            margin: 20px auto;
            position: relative;
        }

        .animation div {
            width: 30px;
            height: 30px;
            background-color: #FF5733;
            border-radius: 50%;
            position: absolute;
            animation: move 1.5s infinite ease-in-out;
        }

        .animation div:nth-child(1) {
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            animation-delay: 0s;
        }

        .animation div:nth-child(2) {
            bottom: 0;
            left: 25%;
            animation-delay: 0.3s;
        }

        .animation div:nth-child(3) {
            bottom: 0;
            right: 25%;
            animation-delay: 0.6s;
        }

        @keyframes move {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.5);
            }
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>404</h1>
        <p>Oops! Le page que vous cherchez n'existe pas.</p>

        <div class="animation">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <a href=" /">Retourner a la page d'accueil</a>
    </div>
</body>

</html>