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
        <h1 class="text-3xl font-bold mb-4">職務経歴書＆履歴書</h1>
        <!-- 履歴書 -->
        <section>
            <h2 class="text-2xl font-bold mb-4">履歴書</h2>

            <div class="bg-white p-4 rounded shadow-md mb-4">
                <p><span class="font-bold">氏名: </span>森谷 和徳</p>
                <p><span class="font-bold">生年月日: </span>1989年11月11日</p>
                <p><span class="font-bold">電話: </span>080-1265-4284</p>
                <p><span class="font-bold">メール: </span>g.ff.k.96@gmail.com</p>
                <!-- その他の項目を追加 -->
            </div>

            <div class="bg-white p-4 rounded shadow-md">
                <h3 class="text-lg font-bold mb-2">学歴</h3>
                <ul class="list-disc list-inside">
                    <li>2008年3月 埼玉県立和光国際高校 卒業</li>    
                    <li>2012年3月 日本大学理工学部数学科 卒業</li>
                    <li>2014年3月 日本大学大学院理工学研究科数学専攻 修了</li>
                </ul>
            </div>
        </section>

        <!-- 職務経歴 -->
        <section class="my-8">
            <h2 class="text-2xl font-bold mb-4">職務経歴</h2>

            <!-- 職歴1 -->
            <div class="mb-8">
                <div class="bg-white p-4 rounded shadow-md">
                    <h3 class="text-xl font-bold mb-2">株式会社アドバンスドシステムテクノロジー</h3>
                    <p class="text-sm text-gray-600 mb-2">2014年4月 - 2015年4月</p>
                    <p class="my-2">新人研修</p>
                    <ul class="list-disc list-inside">
                        <li>ビジネスマナー</li>
                        <li>プログラミング（C, Java）</li>
                        <li>インフラ（Linuxコマンド, FTP通信）</li>
                    </ul>
                    <p class="my-2">省庁向けシムテム基板構築</p>
                    <ul class="list-disc list-inside">
                        <li>ミドルウェア検証</li>
                        <li>構築手順書作成</li>
                        <li>データセンターでの構築作業</li>
                        <li>不具合・障害の管理・調査</li>
                    </ul>
                </div>
            </div>

            <!-- 職歴2 -->
            <div class="mb-8">
                <div class="bg-white p-4 rounded shadow-md">
                    <h3 class="text-xl font-bold mb-2">株式会社フロンティアソリューション</h3>
                    <p class="text-sm text-gray-600 mb-2">2016年10月 - 2018年3月</p>
                    <p class="my-2">金融会社向けファイアフォール・ロードバランサー運用保守</p>
                    <ul class="list-disc list-inside">
                        <li>設定変更要件整理</li>
                        <li>設定変更作業</li>
                        <li>管理ドキュメント更新</li>
                    </ul>
                    <p class="my-2">法人ユーザ向けネットワークルータのマイグレーション</p>
                    <ul class="list-disc list-inside">
                        <li>設定変更箇所整理</li>
                        <li>事前試験（ポート・ケーブル故障確認）</li>
                        <li>本番切り替え作業</li>
                        <li>本番作業手順書作成用補助ツール作成</li>
                    </ul>
                </div>
            </div>

            <!-- 職歴3 -->
            <div class="mb-8">
                <div class="bg-white p-4 rounded shadow-md">
                    <h3 class="text-xl font-bold mb-2">株式会社LOWCAL</h3>
                    <p class="text-sm text-gray-600 mb-2">2018年4月 - 2021年5月</p>
                    <p class="my-2">クレジットカード決済基板構築（オンプレミス）</p>
                    <ul class="list-disc list-inside">
                        <li>VMwareを用いた設計・構築・試験・保守</li>
                        <li>VMware技術検証</li>
                        <li>リリース後セキュリティ対策・スケールアップ対応</li>
                    </ul>
                    <p class="my-2">クローリングデータ活用新規開発</p>
                    <ul class="list-disc list-inside">
                        <li>食用品サイトの商品ランキング付け</li>
                        <li>クローリングデータのクリーニングバッチ作成</li>
                        <li>トレンド商品ピックアップ</li>
                    </ul>
                    <p class="my-2">総合商社向け食品ECサイト改修・試験</p>
                    <ul class="list-disc list-inside">
                        <li>デザインリニューアル</li>
                        <li>HTML, Thymeleaf, JavaScript, JQueryの修正</li>
                        <li>改修試験</li>
                    </ul>
                    <p class="my-2">医療帳票デジタル化開発</p>
                    <ul class="list-disc list-inside">
                        <li>画像の縦横斜めのズレ修正</li>
                        <li>チェックボックスのチェック有無判定</li>
                        <li>クラウドOCRサービスを用いた画像のcsv化</li>
                    </ul>
                    <p class="my-2">アパレルECサイト向け在庫最適化・需要予測</p>
                    <ul class="list-disc list-inside">
                        <li>販売データのテーブル整理→DBへのインポート</li>
                        <li>需要予測モデル構築</li>
                    </ul>
                </div>
            </div>

            <!-- 職歴4 -->
            <div class="mb-8">
                <div class="bg-white p-4 rounded shadow-md">
                    <h3 class="text-xl font-bold mb-2">株式会社グラフ</h3>
                    <p class="text-sm text-gray-600 mb-2">2021年6月 - 現在</p>
                    <p class="my-2">組織形成</p>
                    <ul class="list-disc list-inside">
                        <li>営業</li>
                        <li>経営補佐</li>
                        <li>人事</li>
                    </ul>
                    <p class="my-2">データサイエンス研修事業</p>
                    <ul class="list-disc list-inside">
                        <li>マネジメント</li>
                        <li>大学・企業向けデータサイエンス講義の講師・教材作成</li>
                        <li>データサイエンス教材のオンライン配信化</li>
                    </ul>
                    <p class="my-2">DX事業</p>
                    <ul class="list-disc list-inside">
                        <li>テレビ局の視聴データ抽出・活用</li>
                        <li>学習塾の顧客管理システムの改修・運用保守</li>
                        <li>パチンコ台・パチスロ台の需要予測プロジェクト</li>
                    </ul>
                </div>
            </div>
        </section>
        <a href="{{ url('/') }}" class="text-indigo-500 inline-flex items-center">
            トップに戻る
        </a>
    </div>
</body>

</html>