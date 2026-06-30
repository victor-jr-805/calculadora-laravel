<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator app - Laravel 13</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#181f32] min-h-screen flex items-center justify-center p-4"
    style="font-family: 'League Spartan', sans-serif;">

    <form id="form-calculadora" action="#" method="POST" class="w-full max-w-md flex flex-col gap-6">

        <div class="flex justify-between items-end text-white px-2">
            <h1 class="text-3xl font-bold tracking-wide">calculadora</h1>

            <div class="flex items-center gap-6 text-xs font-bold tracking-widest uppercase">
                <span>THEME</span>
                <div class="bg-[#252c46] p-1 rounded-full flex gap-2">
                    <span class="w-4 h-4 bg-[#d03f2f] rounded-full inline-block cursor-pointer"></span>
                    <span
                        class="w-4 h-4 bg-transparent rounded-full inline-block cursor-pointer hover:bg-slate-700"></span>
                    <span
                        class="w-4 h-4 bg-transparent rounded-full inline-block cursor-pointer hover:bg-slate-700"></span>
                </div>
            </div>
        </div>

        <div class="bg-[#182034] p-6 rounded-xl text-right text-white border border-transparent shadow-inner">
            <div id="pantalla-historial" class="text-slate-400 text-sm h-5 font-bold tracking-wide mb-1"></div>
            <div id="pantalla" class="text-5xl font-bold tracking-tight overflow-x-auto select-all">0</div>
        </div>

        <div class="bg-[#252c46] p-6 rounded-xl grid grid-cols-4 gap-4 shadow-xl">

            <button type="button" data-valor="7"
                class="h-14 bg-[#eae3dc] border-b-4 border-[#b4a597] text-[#444b5a] text-3xl font-bold rounded-xl active:brightness-90 transition">7</button>
            <button type="button" data-valor="8"
                class="h-14 bg-[#eae3dc] border-b-4 border-[#b4a597] text-[#444b5a] text-3xl font-bold rounded-xl active:brightness-90 transition">8</button>
            <button type="button" data-valor="9"
                class="h-14 bg-[#eae3dc] border-b-4 border-[#b4a597] text-[#444b5a] text-3xl font-bold rounded-xl active:brightness-90 transition">9</button>
            <button type="button" data-valor="DEL"
                class="h-14 bg-[#647198] border-b-4 border-[#414e73] text-white text-xl font-bold rounded-xl uppercase active:brightness-90 transition">DEL</button>

            <button type="button" data-valor="4"
                class="h-14 bg-[#eae3dc] border-b-4 border-[#b4a597] text-[#444b5a] text-3xl font-bold rounded-xl active:brightness-90 transition">4</button>
            <button type="button" data-valor="5"
                class="h-14 bg-[#eae3dc] border-b-4 border-[#b4a597] text-[#444b5a] text-3xl font-bold rounded-xl active:brightness-90 transition">5</button>
            <button type="button" data-valor="6"
                class="h-14 bg-[#eae3dc] border-b-4 border-[#b4a597] text-[#444b5a] text-3xl font-bold rounded-xl active:brightness-90 transition">6</button>
            <button type="button" data-valor="+"
                class="h-14 bg-[#eae3dc] border-b-4 border-[#b4a597] text-[#444b5a] text-3xl font-bold rounded-xl active:brightness-90 transition">+</button>

            <button type="button" data-valor="1"
                class="h-14 bg-[#eae3dc] border-b-4 border-[#b4a597] text-[#444b5a] text-3xl font-bold rounded-xl active:brightness-90 transition">1</button>
            <button type="button" data-valor="2"
                class="h-14 bg-[#eae3dc] border-b-4 border-[#b4a597] text-[#444b5a] text-3xl font-bold rounded-xl active:brightness-90 transition">2</button>
            <button type="button" data-valor="3"
                class="h-14 bg-[#eae3dc] border-b-4 border-[#b4a597] text-[#444b5a] text-3xl font-bold rounded-xl active:brightness-90 transition">3</button>
            <button type="button" data-valor="-"
                class="h-14 bg-[#eae3dc] border-b-4 border-[#b4a597] text-[#444b5a] text-3xl font-bold rounded-xl active:brightness-90 transition">-</button>

            <button type="button" data-valor="."
                class="h-14 bg-[#eae3dc] border-b-4 border-[#b4a597] text-[#444b5a] text-3xl font-bold rounded-xl active:brightness-90 transition">.</button>
            <button type="button" data-valor="0"
                class="h-14 bg-[#eae3dc] border-b-4 border-[#b4a597] text-[#444b5a] text-3xl font-bold rounded-xl active:brightness-90 transition">0</button>
            <button type="button" data-valor="/"
                class="h-14 bg-[#eae3dc] border-b-4 border-[#b4a597] text-[#444b5a] text-3xl font-bold rounded-xl active:brightness-90 transition">/</button>
            <button type="button" data-valor="*"
                class="h-14 bg-[#eae3dc] border-b-4 border-[#b4a597] text-[#444b5a] text-3xl font-bold rounded-xl active:brightness-90 transition">*</button>

            <button type="button" data-valor="RESET"
                class="h-14 bg-[#647198] border-b-4 border-[#414e73] text-white text-xl font-bold rounded-xl col-span-2 uppercase active:brightness-90 transition">RESET</button>
            <button type="button" data-valor="="
                class="h-14 bg-[#d03f2f] border-b-4 border-[#93261a] text-white text-xl font-bold rounded-xl col-span-2 active:brightness-90 transition">=</button>
        </div>

    </form>

</body>

</html>
