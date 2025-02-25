<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>OlveraDev-Blog App</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />

    <link
        href="https://unpkg.com/@tailwindcss/custom-forms/dist/custom-forms.min.css"
        rel="stylesheet" />


    <style>
        @import url("https://rsms.me/inter/inter.css");

        html {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI",
                Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif,
                "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol",
                "Noto Color Emoji";
        }

        .gradient {
            background-image: linear-gradient(-225deg, #cbbacc 0%, #2580b3 100%);
        }

        button,
        .gradient2 {
            background-color: #f39f86;
            background-image: linear-gradient(315deg, #f39f86 0%, #f9d976 74%);
        }


        .browser-mockup {
            border-top: 2em solid rgba(230, 230, 230, 0.7);
            position: relative;
            height: 60vh;
        }

        .browser-mockup:before {
            display: block;
            position: absolute;
            content: "";
            top: -1.25em;
            left: 1em;
            width: 0.5em;
            height: 0.5em;
            border-radius: 50%;
            background-color: #f44;
            box-shadow: 0 0 0 2px #f44, 1.5em 0 0 2px #9b3, 3em 0 0 2px #fb5;
        }

        .browser-mockup>* {
            display: block;
        }

        /* Custom code for the demo */
    </style>
</head>

<body class="gradient leading-relaxed tracking-wide flex flex-col">
    <!--Nav-->
    <nav id="header" class="w-full z-30 top-0 text-white py-1 lg:py-6">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-2 lg:py-6">
            <div class="pl-4 flex items-center">
                <a class="text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl flex items-center" href="#">
                    <img class="w-12 h-12 lg:w-16 lg:h-16 mr-2" src="https://img.icons8.com/nolan/96/backend-development.png" alt="backend-development" />
                    Blog App - OlveraDev
                </a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto h-screen">
        <div class="text-center px-3 lg:px-0">
            <h1
                class="my-4 text-2xl md:text-3xl lg:text-5xl font-black leading-tight">
                Este aplicativo web es solo el backend de una app para mi portafolio personal y profesional.
            </h1>
            <p
                class="leading-normal text-gray-800 text-base md:text-xl lg:text-2xl mb-8">
                Realicé APIs de autenticación, creación de posts, comentarios y likes.
            </p>
            <p
                class="leading-normal text-gray-800 text-base md:text-xl lg:text-2xl mb-8">
                También incluí manejo de recursos de tipo imagen en el usuario y los posts.
            </p>
        </div>

        <div class="flex items-center w-full mx-auto content-end">
            <div class="browser-mockup flex flex-1 m-6 md:px-0 md:m-12 bg-white w-1/2 rounded shadow-xl justify-center items-center">

            </div>
        </div>
    </div>

</body>

</html>