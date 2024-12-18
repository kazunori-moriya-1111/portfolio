<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <x-vite :files="['app', 'chartjs_top']"/>
    <title>Laravel</title>
</head>

<body class="bg-gray-100">
    <!-- nav bar -->
    <nav class="fixed top-0 left-0 w-full bg-gray-800 text-white shadow-md z-10">
        <div class="max-w-7xl mx-auto py-4 flex justify-between items-center">
            <div class="hidden md:flex space-x-4">
                <a href="#home" class="text-white hover:text-blue-200">ホーム</a>
                <a href="#portfolio" class="text-white hover:text-blue-200">ポートフォリオ</a>
                <a href="#episode" class="text-white hover:text-blue-200">ボートレースエピソード</a>
                <a href="#skill" class="text-white hover:text-blue-200">スキルセット</a>
                <a href="#profile" class="text-white hover:text-blue-200">プロフィール</a>
            </div>
            <div class="md:hidden">
                <button id="menu-button" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div id="menu" class="md:hidden">
            <a href="#home" class="block text-white hover:bg-blue-700 px-4 py-2">ホーム</a>
            <a href="#portfolio" class="block text-white hover:bg-blue-700 px-4 py-2">ポートフォリオ</a>
            <a href="#episode" class="block text-white hover:bg-blue-700 px-4 py-2">ボートレースエピソード</a>
            <a href="#skill" class="block text-white hover:bg-blue-700 px-4 py-2">スキルセット</a>
            <a href="#profile" class="block text-white hover:bg-blue-700 px-4 py-2">プロフィール</a>
        </div>
    </nav>
    <!-- ホーム -->
    <section id="home" class="bg-gray-200 my-4 px-5 py-6 mx-auto">
        <div class="container w-11/12 px-5 py-10 mx-auto flex flex-col">
            <h2 class="text-2xl font-bold text-center md:text-4xl">このサイトについて</h2>
            <div class="lg:w-4/6 mx-auto">
                <div class="flex flex-col sm:flex-row mt-10">
                    <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
                        <img src="{{ asset('img/profile.png') }}" class="w-30 h-30" />
                        <div class="flex flex-col items-center text-center justify-center">
                            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">森谷 和徳</h2>
                            <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                            <p class="text-base">moriya kazunori</p>
                            <p class="text-base">GitHub: 
                                <a href="https://github.com/kazunori-moriya-1111/portfolio" target="_blank" class="text-indigo-500 inline-flex items-center mb-4">
                                    https://github.com/kazunori-moriya-1111/portfolio
                                </a>
                            </p>
                            <p class="text-base">Qiita:
                                <a href="https://qiita.com/trkrcafeaulate" target="_blank" class="text-indigo-500 inline-flex items-center mb-4">
                                    https://qiita.com/trkrcafeaulate
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                        <p class="leading-relaxed text-lg mb-4">このサイトではプロフィールやWEBアプリを公開しています</p>
                        <p>職務経歴書、履歴書の電子ファイルはこちらからダウンロードいただけます</p>
                        <a href="{{ url('download/job_history.pdf') }}" target="_blank" class="text-indigo-500 inline-flex items-center mb-4">
                            職務経歴書
                        </a>
                        <a href="{{ url('download/resume.xlsx') }}" target="_blank" class="text-indigo-500 inline-flex items-center mb-4">
                            履歴書
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ポートフォリオ -->
    <section id="portfolio" class="bg-gray-200 my-4 px-5 py-6 mx-auto">
        <div class="max-w-7xl w-11/12 px-4 py-10 mx-auto">
            <h2 class="text-2xl font-bold text-center md:text-4xl">ポートフォリオ</h2>
            <p class="mt-1 text-gray-600">
                スマートフォンでアプリを用いてボートレース収支管理をしているのですが、PCでテレボートから舟券を購入することが多いのでPCでも収支管理をしたいと思い収支管理サイトを作成しました。
                <br> ボートレース収支管理アプリは<a href="{{ url('/login') }}" target="_brank" class="text-indigo-500 inline-flex items-center">こちら</a>
            </p>
            <div class="aspect-w-16 aspect-h-11">
                <img class="w-full object-cover rounded-xl" src="{{ asset('img/hunaken_1.jpg') }}" alt="Blog Image">
            </div>
        </div>
    </section>

    <!-- ボートレースエピソード -->
    <section id="episode" class="bg-gray-200 my-4 px-5 py-6 mx-auto">
        <!-- Card Blog -->
        <div class="max-w-7xl w-11/12 px-4 py-10 mx-auto">
            <div class="max-w-2xl mx-auto mb-10 lg:mb-14">
                <h2 class="text-2xl font-bold text-center md:text-4xl">ボートレースエピソード</h2>
                <p class="mt-1 text-gray-600">
                    大学生のときにモンキーターンを読むきっかけがあり、当時戸田市に住んでいたため戸田競艇場に行きました。
                    <br>
                    レース場でモーター音を聞き、迫力のあるレースを見てボートレースファンになりました。
                </p>
            </div>

            <!-- Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card -->
                <a class="group flex flex-col h-full border border-gray-200 hover:shadow-lg transition duration-300 rounded-xl p-5" href="#">
                    <div class="aspect-w-16 aspect-h-11">
                        <img class="w-full object-cover rounded-xl transform transition duration-300 ease-in-out hover:scale-110" src="{{ asset('img/rireki.png') }}" alt="Blog Image">
                    </div>
                    <div class="my-6">
                        <h3 class="text-xl font-semibold text-gray-800">コロナ禍</h3>
                        <p class="mt-5 text-gray-600">
                            コロナ禍をキッカケに自宅で楽しめる娯楽を探して、ボートレース熱が上昇しました。SG,G1,女子戦を中心に舟券を購入しています。
                        </p>
                    </div>
                </a>

                <!-- Card -->
                <a class="group flex flex-col h-full border border-gray-200 hover:shadow-lg transition duration-300 rounded-xl p-5" href="#">
                    <div class="aspect-w-16 aspect-h-11">
                        <img class="w-full object-cover rounded-xl" src="{{ asset('img/hunaken_1.jpg') }}" alt="Blog Image">
                    </div>
                    <div class="my-6">
                        <h3 class="text-xl font-semibold text-gray-800">3941 池田浩二選手</h3>
                        <p class="mt-5 text-gray-600">
                            池田浩二選手を応援しています。SG、G1でいつも優勝戦に出走しているかのような強さと、西山貴浩選手とのエピソード等のギャップが魅力に感じています。
                        <br>
                            関東のボートレース場で池田浩二選手が出場している時はレース場に行くようにしています。
                        </p>
                    </div>
                </a>

                <!-- Card -->
                <a class="group flex flex-col h-full border border-gray-200 hover:shadow-lg transition duration-300 rounded-xl p-5" href="#">
                    <div class="aspect-w-16 aspect-h-11">
                        <img class="w-full object-cover rounded-xl" src="{{ asset('img/hunaken_2.jpg') }}" alt="Blog Image">
                    </div>
                    <div class="my-6">
                        <h3 class="text-xl font-semibold text-gray-800">24場制覇</h3>
                        <p class="mt-5 text-gray-600">
                            年末年始の期間は普段行くことが難しいボートレース場に遊びに行っています。
                            <br>
                            あと2年以内には24場全てに行ってみたいです。
                        </p>
                    </div>
                </a>

                <!-- Card -->
                <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg focus:outline-none focus:border-transparent focus:shadow-lg transition duration-300 rounded-xl p-5 dark:border-neutral-700 dark:hover:border-transparent dark:hover:shadow-black/40 dark:focus:border-transparent dark:focus:shadow-black/40" href="#">
                    <div class="aspect-w-16 aspect-h-11">
                        <img class="w-full object-cover rounded-xl" src="{{ asset('img/sanman.png') }}" alt="Blog Image">
                    </div>
                    <div class="my-6">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-300 dark:group-hover:text-white">
                            3万舟
                        </h3>
                        <p class="mt-5 text-gray-600 dark:text-neutral-400">
                            2024年ボートレース戸田で開催されたボートレースクラシック最終日の11Rで3万舟を的中しました。
                        <br>
                            普段は高配当はあまり狙わないのですが、レース場で観戦しており、SGの祭りのような雰囲気と池田選手が出場していること、戸田の1号挺勝率の低さを考慮して高配当狙いをしました。
                        <br>
                            ※買い目 : 123-5=1234
                        <br>
                            一周1マークを回ったときは声を出して池田選手を応援していました。
                        </p>
                    </div>
                </a>
                <!-- End Card -->
            </div>
        </div>
    </section>
    
    <!-- スキルセット -->
    <section id="skill" class="bg-gray-200 my-4 px-5 py-6 mx-auto">
        <div class="max-w-7xl w-11/12 px-4 py-10 mx-auto">
            <h2 class="text-2xl font-bold text-center md:text-4xl">スキルセット</h2>
            <ul class="flex flex-col items-center">
                <li class="mb-4">5 : レクチャーや導入推進が可能</li>
                <li class="mb-4">4 : 業務で日常的に使用</li>
                <li class="mb-4">3 : 業務経験はあるが最近は触っていない</li>
                <li class="mb-4">2 : 本サイト作成のためにキャッチアップ</li>
                <li class="mb-4">1 : 興味があり個人的にキャッチアップ中</li>
            </ul>
            <div class="grid grid-cols-4 gap-4">
                <div>
                    <canvas id="front_skill" class="w-full h-full"></canvas>
                </div>
                <div>
                    <canvas id="backend_skill" class="w-full h-full"></canvas>
                </div>
                <div>
                    <canvas id="dev_skill" class="w-full h-full"></canvas>
                </div>
                <div>
                    <canvas id="aws_skill" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>
    </section>

    <!-- プロフィール -->
    <section id="profile" class="bg-gray-200 my-4 px-5 py-6 mx-auto">
        <div class="max-w-7xl w-11/12 px-4 py-10 mx-auto">
            <h2 class="text-2xl font-bold text-center md:text-4xl">プロフィール</h2>
            <div class="mx-auto py-8">
                <!-- Timeline Item (高校時代) -->
                <div class="flex items-center my-8 px-2 border-l-4 border-gray-500">
                    <!-- Date -->
                    <div class="w-1/6 text-2xl font-bold text-gray-700">
                        高校時代
                    </div>
    
                    <!-- Content -->
                    <div class="w-5/6">
                        <div class="flex ml-2 items-center">
                            <div class="flex-none w-24 h-24 mx-2 bg-white rounded-full overflow-hidden shadow-lg">
                                <img src="{{ asset('img/sports_badminton.png') }}" alt="Profile" class="w-24 h-24 object-cover">
                            </div>
    
                            <!-- Text Content -->
                            <div class="flex-1 space-y-2">
                                <div class="bg-gray-200 text-gray-700 p-4 rounded-md shadow-md">
                                    埼玉県で生まれ、高校生まで過ごす
                                </div>
                                <div class="bg-gray-200 text-gray-700 p-4 rounded-md shadow-md">
                                    中学は陸上部、高校はバドミントン部に所属する
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Timeline Item (大学時代) -->
                <div class="flex items-center my-8 px-2 border-l-4 border-gray-500">
                    <!-- Date -->
                    <div class="w-1/6 text-2xl font-bold text-gray-700">
                        大学時代
                    </div>
    
                    <!-- Content -->
                    <div class="w-5/6">
                        <div class="flex ml-2 items-center">
                            <div class="flex-none w-24 h-24 mx-2 bg-white rounded-full overflow-hidden shadow-lg">
                                <img src="{{ asset('img/job_programmer.png') }}" alt="Profile" class="w-24 h-24 object-cover">
                            </div>
    
                            <!-- Text Content -->
                            <div class="flex-1 space-y-2">
                                <div class="bg-gray-200 text-gray-700 p-4 rounded-md shadow-md">
                                    初めてのアルバイトでパチンコ屋を選択し、徐々に大学へ行かない生活が増え始める
                                </div>
                                <div class="bg-gray-200 text-gray-700 p-4 rounded-md shadow-md">
                                    留年と戦いながら、4年でなんとか卒業するが、就職活動を全くしていなかったため、何も考えず大学院へ進学する
                                </div>
                                <div class="bg-gray-200 text-gray-700 p-4 rounded-md shadow-md">
                                    大学院でプログラミングとAIを学び、将来はIT関係で食べていくことを決意する
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Timeline Item (社会人1年目〜5年目) -->
                <div class="flex items-center my-8 px-2 border-l-4 border-gray-500">
                    <!-- Date -->
                    <div class="w-1/6 text-2xl font-bold text-gray-700">
                        社会人1年目〜5年目
                    </div>
    
                    <!-- Content -->
                    <div class="w-5/6">
                        <div class="flex ml-2 items-center">
                            <div class="flex-none w-24 h-24 mx-2 bg-white rounded-full overflow-hidden shadow-lg">
                                <img src="{{ asset('img/job_it_dokata.png') }}" alt="Profile" class="w-24 h-24 object-cover">
                            </div>
    
                            <!-- Text Content -->
                            <div class="flex-1 space-y-2">
                                <div class="bg-gray-200 text-gray-700 p-4 rounded-md shadow-md">
                                    インフラエンジニアとしてキャリアをスタートしたが、大手企業に常駐しながら、スーツを着て毎朝9時に出勤する働き方に疑問を持つ
                                </div>
                                <div class="bg-gray-200 text-gray-700 p-4 rounded-md shadow-md">
                                    インフラエンジニアからフルスタックエンジニアへキャリアチェンジを決意する
                                </div>
                                <div class="bg-gray-200 text-gray-700 p-4 rounded-md shadow-md">
                                    開発現場を複数経験して、フルスタックエンジニア ✕ AIを活かせる、データサイエンティストへキャリアチェンジ
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Timeline Item (直近3年間) -->
                <div class="flex items-center my-8 px-2 border-l-4 border-gray-500">
                    <!-- Date -->
                    <div class="w-1/6 text-2xl font-bold text-gray-700">
                        直近3年間
                    </div>
    
                    <!-- Content -->
                    <div class="w-5/6">
                        <div class="flex ml-2 items-center">
                            <div class="flex-none w-24 h-24 mx-2 bg-white rounded-full overflow-hidden shadow-lg">
                                <img src="{{ asset('img/document_data_bunseki.png') }}" alt="Profile" class="w-24 h-24 object-cover">
                            </div>
    
                            <!-- Text Content -->
                            <div class="flex-1 space-y-2">
                                <div class="bg-gray-200 text-gray-700 p-4 rounded-md shadow-md">
                                    データサイエンティストのキャリアを歩みつつ、同時にリーダーやマネージャーを任されるようになる
                                </div>
                                <div class="bg-gray-200 text-gray-700 p-4 rounded-md shadow-md">
                                    データサイエンス業界の成果を上げるにはクライアント業界の深い理解が必要で、複数のクライアント業務をこなすことが難しいことを痛感する
                                </div>
                                <div class="bg-gray-200 text-gray-700 p-4 rounded-md shadow-md">
                                    自身の興味がある業界 ✕ ITの仕事がしたいと思い、ボートレース ✕ ITができる業務への転職を決意する
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script>
    const menuButton = document.getElementById('menu-button');
    const menu = document.getElementById('menu');

    menuButton.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>

</html>
