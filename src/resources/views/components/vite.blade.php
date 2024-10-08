@if(config('app.env') == 'local')
    <!-- 検証環境 -->
    @vite('resources/css/app.css')
@else
    <!-- 本番環境 -->
    @php
        $css_file_path = public_path() . '/build/assets/*.css';
        $css_files = glob($css_file_path);
    @endphp  
    @foreach($css_files as $css_file)
        <link rel="stylesheet" href="{{ asset('build/assets/' . basename($css_file)) }}"/>
    @endforeach
    @php
        $js_file_path = public_path() . '/build/assets/*.js';
        $js_files = glob($js_file_path);
    @endphp  
    @foreach($js_files as $js_file)
        <script type="module" src="{{ asset('build/assets/' . basename($js_file)) }}"></script>
    @endforeach
@endif