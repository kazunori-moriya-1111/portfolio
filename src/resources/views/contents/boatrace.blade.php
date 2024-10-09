<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <x-vite :files="['app']"/>
    <title>Laravel</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Card Blog -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Title -->
            <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
                <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">ボートレースを始めたきっかけ</h2>
                <p class="mt-1 text-gray-600 dark:text-neutral-400">大学生のときにモンキーターンを読むきっかけがあり、当時戸田市に住んでいたため戸田競艇場に行きました。実際のモーター音を聞き、迫力のあるレースを見てのめり込みました。</p>
            </div>
            <!-- End Title -->

            <!-- Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card -->
                <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg focus:outline-none focus:border-transparent focus:shadow-lg transition duration-300 rounded-xl p-5 dark:border-neutral-700 dark:hover:border-transparent dark:hover:shadow-black/40 dark:focus:border-transparent dark:focus:shadow-black/40" href="#">
                    <div class="aspect-w-16 aspect-h-11">
                        <img class="w-full object-cover rounded-xl" src="{{ asset('img/rireki.png') }}" alt="Blog Image">
                    </div>
                    <div class="my-6">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-300 dark:group-hover:text-white">
                        コロナ禍
                        </h3>
                        <p class="mt-5 text-gray-600 dark:text-neutral-400">
                        コロナ禍をキッカケにボートレース熱が上昇しました。SGやG1戦を中心に舟券を購入しています。
                        </p>
                    </div>
                </a>
                <!-- End Card -->

                <!-- Card -->
                <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg focus:outline-none focus:border-transparent focus:shadow-lg transition duration-300 rounded-xl p-5 dark:border-neutral-700 dark:hover:border-transparent dark:hover:shadow-black/40 dark:focus:border-transparent dark:focus:shadow-black/40" href="#">
                    <div class="aspect-w-16 aspect-h-11">
                        <img class="w-full object-cover rounded-xl" src="{{ asset('img/hunaken_1.jpg') }}" alt="Blog Image">
                    </div>
                    <div class="my-6">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-300 dark:group-hover:text-white">
                        3941 池田浩二選手
                        </h3>
                        <p class="mt-5 text-gray-600 dark:text-neutral-400">
                        池田浩二選手を応援しています。SG、G1でいつも優勝戦で出走しているかのような強さと、西山貴浩との交友関係等のギャップが魅力に感じています。
                        <br>
                        関東のボートレース場で池田浩二選手が出場している時は現地に行くようにしています。
                        </p>
                    </div>
                </a>
                <!-- End Card -->

                <!-- Card -->
                <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg focus:outline-none focus:border-transparent focus:shadow-lg transition duration-300 rounded-xl p-5 dark:border-neutral-700 dark:hover:border-transparent dark:hover:shadow-black/40 dark:focus:border-transparent dark:focus:shadow-black/40" href="#">
                    <div class="aspect-w-16 aspect-h-11">
                        <img class="w-full object-cover rounded-xl" src="{{ asset('img/hunaken_2.jpg') }}" alt="Blog Image">
                    </div>
                    <div class="my-6">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-300 dark:group-hover:text-white">
                        24場制覇
                        </h3>
                        <p class="mt-5 text-gray-600 dark:text-neutral-400">
                        年末年始の期間は普段行くことが難しいボートレース場に遊びに行っています。
                        <br>
                        あと2年以内には24場全てに行ってみたいです。
                        </p>
                    </div>
                </a>
                <!-- End Card -->
            </div>
        <!-- End Grid -->
        </div>
        <!-- End Card Blog -->
    </div>
    <a href="{{ url('/') }}" class="text-indigo-500 inline-flex items-center">
        トップに戻る
    </a>
</body>
</html>

</html>