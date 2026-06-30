<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator App - 100% Responsiva</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-[var(--bg-main)] min-h-screen flex items-center justify-center p-4 sm:p-6 transition-colors duration-300"
    style="font-family: 'League Spartan', sans-serif;">

    <form id="form-calculadora" action="#" method="POST" class="w-full max-w-md flex flex-col gap-4 sm:gap-6">
        @csrf

        <div class="flex justify-between items-end text-[var(--text-main)] px-1 transition-colors duration-300">
            <h1 class="text-3xl font-bold tracking-wide">Calculadora</h1>

            <div class="flex items-center gap-4 sm:gap-6 text-xs font-bold tracking-widest uppercase">
                <span>TEMA</span>
                <div
                    class="bg-[var(--bg-keypad)] p-1.5 rounded-full flex gap-3 shadow-md transition-colors duration-300">
                    <button type="button" id="btn-tema-1"
                        class="w-4 h-4 rounded-full inline-block cursor-pointer bg-[var(--btn-eq-bg)] transition-all duration-200"
                        title="Tema 1"></button>
                    <button type="button" id="btn-tema-2"
                        class="w-4 h-4 rounded-full inline-block cursor-pointer bg-slate-500/40 hover:bg-slate-400 transition-all duration-200"
                        title="Tema 2"></button>
                    <button type="button" id="btn-tema-3"
                        class="w-4 h-4 rounded-full inline-block cursor-pointer bg-slate-500/40 hover:bg-slate-400 transition-all duration-200"
                        title="Tema 3"></button>
                </div>
            </div>
        </div>

        <div
            class="bg-[var(--bg-screen)] p-5 sm:p-6 rounded-xl text-right text-[var(--text-screen)] border border-transparent shadow-inner transition-colors duration-300">
            <div id="pantalla-historial"
                class="opacity-60 text-xs sm:text-sm h-5 font-bold tracking-wide mb-1 overflow-hidden whitespace-nowrap text-ellipsis">
            </div>
            <div id="pantalla"
                class="text-4xl sm:text-5xl font-bold tracking-tight overflow-x-auto select-all scrollbar-none">0</div>
        </div>

        <div
            class="bg-[var(--bg-keypad)] p-4 sm:p-6 rounded-xl grid grid-cols-4 gap-3 sm:gap-4 shadow-xl transition-colors duration-300">

            <button type="button" data-valor="7"
                class="h-12 sm:h-14 bg-[var(--btn-num-bg)] border-b-4 border-[var(--btn-num-border)] text-[var(--btn-num-text)] text-2xl sm:text-3xl font-bold rounded-xl active:brightness-90 transition-all">7</button>
            <button type="button" data-valor="8"
                class="h-12 sm:h-14 bg-[var(--btn-num-bg)] border-b-4 border-[var(--btn-num-border)] text-[var(--btn-num-text)] text-2xl sm:text-3xl font-bold rounded-xl active:brightness-90 transition-all">8</button>
            <button type="button" data-valor="9"
                class="h-12 sm:h-14 bg-[var(--btn-num-bg)] border-b-4 border-[var(--btn-num-border)] text-[var(--btn-num-text)] text-2xl sm:text-3xl font-bold rounded-xl active:brightness-90 transition-all">9</button>
            <button type="button" data-valor="DEL"
                class="h-12 sm:h-14 bg-[var(--btn-ctrl-bg)] border-b-4 border-[var(--btn-ctrl-border)] text-[var(--btn-ctrl-text)] text-lg sm:text-xl font-bold rounded-xl uppercase active:brightness-90 transition-all">DEL</button>

            <button type="button" data-valor="4"
                class="h-12 sm:h-14 bg-[var(--btn-num-bg)] border-b-4 border-[var(--btn-num-border)] text-[var(--btn-num-text)] text-2xl sm:text-3xl font-bold rounded-xl active:brightness-90 transition-all">4</button>
            <button type="button" data-valor="5"
                class="h-12 sm:h-14 bg-[var(--btn-num-bg)] border-b-4 border-[var(--btn-num-border)] text-[var(--btn-num-text)] text-2xl sm:text-3xl font-bold rounded-xl active:brightness-90 transition-all">5</button>
            <button type="button" data-valor="6"
                class="h-12 sm:h-14 bg-[var(--btn-num-bg)] border-b-4 border-[var(--btn-num-border)] text-[var(--btn-num-text)] text-2xl sm:text-3xl font-bold rounded-xl active:brightness-90 transition-all">6</button>
            <button type="button" data-valor="+"
                class="h-12 sm:h-14 bg-[var(--btn-num-bg)] border-b-4 border-[var(--btn-num-border)] text-[var(--btn-num-text)] text-2xl sm:text-3xl font-bold rounded-xl active:brightness-90 transition-all">+</button>

            <button type="button" data-valor="1"
                class="h-12 sm:h-14 bg-[var(--btn-num-bg)] border-b-4 border-[var(--btn-num-border)] text-[var(--btn-num-text)] text-2xl sm:text-3xl font-bold rounded-xl active:brightness-90 transition-all">1</button>
            <button type="button" data-valor="2"
                class="h-12 sm:h-14 bg-[var(--btn-num-bg)] border-b-4 border-[var(--btn-num-border)] text-[var(--btn-num-text)] text-2xl sm:text-3xl font-bold rounded-xl active:brightness-90 transition-all">2</button>
            <button type="button" data-valor="3"
                class="h-12 sm:h-14 bg-[var(--btn-num-bg)] border-b-4 border-[var(--btn-num-border)] text-[var(--btn-num-text)] text-2xl sm:text-3xl font-bold rounded-xl active:brightness-90 transition-all">3</button>
            <button type="button" data-valor="-"
                class="h-12 sm:h-14 bg-[var(--btn-num-bg)] border-b-4 border-[var(--btn-num-border)] text-[var(--btn-num-text)] text-2xl sm:text-3xl font-bold rounded-xl active:brightness-90 transition-all">-</button>

            <button type="button" data-valor="."
                class="h-12 sm:h-14 bg-[var(--btn-num-bg)] border-b-4 border-[var(--btn-num-border)] text-[var(--btn-num-text)] text-2xl sm:text-3xl font-bold rounded-xl active:brightness-90 transition-all">.</button>
            <button type="button" data-valor="0"
                class="h-12 sm:h-14 bg-[var(--btn-num-bg)] border-b-4 border-[var(--btn-num-border)] text-[var(--btn-num-text)] text-2xl sm:text-3xl font-bold rounded-xl active:brightness-90 transition-all">0</button>
            <button type="button" data-valor="/"
                class="h-12 sm:h-14 bg-[var(--btn-num-bg)] border-b-4 border-[var(--btn-num-border)] text-[var(--btn-num-text)] text-2xl sm:text-3xl font-bold rounded-xl active:brightness-90 transition-all">/</button>
            <button type="button" data-valor="*"
                class="h-12 sm:h-14 bg-[var(--btn-num-bg)] border-b-4 border-[var(--btn-num-border)] text-[var(--btn-num-text)] text-2xl sm:text-3xl font-bold rounded-xl active:brightness-90 transition-all">*</button>

            <button type="button" data-valor="RESET"
                class="h-12 sm:h-14 bg-[var(--btn-ctrl-bg)] border-b-4 border-[var(--btn-ctrl-border)] text-[var(--btn-ctrl-text)] text-lg sm:text-xl font-bold rounded-xl col-span-2 uppercase active:brightness-90 transition-all">RESET</button>
            <button type="button" data-valor="="
                class="h-12 sm:h-14 bg-[var(--btn-eq-bg)] border-b-4 border-[var(--btn-eq-border)] text-[var(--btn-eq-text)] text-lg sm:text-xl font-bold rounded-xl col-span-2 active:brightness-90 transition-all">=</button>
        </div>

    </form>

</body>

</html>
