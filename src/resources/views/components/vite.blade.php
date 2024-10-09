@props(['files'])

@if(config('app.env') == 'local')
    <!-- 検証環境 -->
    @foreach($files as $file)
        @php
            $css_file_path = resource_path() . "/css/$file*.css";
            $css_files = glob($css_file_path);
        @endphp

        @foreach($css_files as $css_file)
            @if($css_file)
                @vite("resources/css/$file.css")
            @endif
        @endforeach
        
        @php
            $js_file_path = resource_path() . "/js/$file*.js";
            $js_files = glob($js_file_path);
        @endphp  
        
        @foreach($js_files as $js_file)
            @if($js_file)
                @vite("resources/js/$file.js")
            @endif
        @endforeach
    @endforeach
@else
    <!-- 本番環境 -->
    @foreach($files as $file)
        @php
            $css_file_path = public_path() . "/build/assets/$file*.css";
            $css_files = glob($css_file_path);
        @endphp

        @foreach($css_files as $css_file)
            @if($css_file)
                <link rel="stylesheet" href="{{ asset('build/assets/' . basename($css_file)) }}"/>
            @endif
        @endforeach
        
        @php
            $js_file_path = public_path() . "/build/assets/$file*.js";
            $js_files = glob($js_file_path);
        @endphp  
        
        @foreach($js_files as $js_file)
            @if($js_file)
                <script type="module" src="{{ asset('build/assets/' . basename($js_file)) }}"></script>
            @endif
        @endforeach
    @endforeach
@endif