<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Laravel</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">職務経歴書＆履歴書</h1>

        <!-- 職務経歴 -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4">職務経歴</h2>

            <!-- 職歴1 -->
            <div class="mb-8">
                <div class="bg-white p-4 rounded shadow-md">
                    <h3 class="text-xl font-bold mb-2">会社A</h3>
                    <p class="text-sm text-gray-600 mb-2">2010年 - 2015年</p>
                    <p class="mb-2">業務内容の詳細をここに記載します。</p>
                    <ul class="list-disc list-inside">
                        <li>業務内容の詳細1</li>
                        <li>業務内容の詳細2</li>
                        <li>業務内容の詳細3</li>
                    </ul>
                </div>
            </div>

            <!-- 職歴2 -->
            <div class="mb-8">
                <div class="bg-white p-4 rounded shadow-md">
                    <h3 class="text-xl font-bold mb-2">会社B</h3>
                    <p class="text-sm text-gray-600 mb-2">2015年 - 現在</p>
                    <p class="mb-2">業務内容の詳細をここに記載します。</p>
                    <ul class="list-disc list-inside">
                        <li>業務内容の詳細1</li>
                        <li>業務内容の詳細2</li>
                        <li>業務内容の詳細3</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 履歴書 -->
        <section>
            <h2 class="text-2xl font-bold mb-4">履歴書</h2>

            <div class="bg-white p-4 rounded shadow-md mb-4">
                <p><span class="font-bold">氏名:</span> 山田 太郎</p>
                <p><span class="font-bold">生年月日:</span> 1990年1月1日</p>
                <p><span class="font-bold">住所:</span> 東京都千代田区</p>
                <p><span class="font-bold">電話:</span> 012-3456-7890</p>
                <p><span class="font-bold">メール:</span> example@example.com</p>
                <!-- その他の項目を追加 -->
            </div>

            <div class="bg-white p-4 rounded shadow-md">
                <h3 class="text-lg font-bold mb-2">学歴</h3>
                <ul class="list-disc list-inside">
                    <li>大学名  学部名  学科名  卒業年度</li>
                    <!-- 必要に応じて学歴を追加 -->
                </ul>
            </div>
        </section>
    </div>
</body>

</html>