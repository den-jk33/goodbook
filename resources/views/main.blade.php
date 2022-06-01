 @include('includes.header')
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                @include('includes.menu')

                @if(!empty($text))
                    <div style="padding-top: 50px;">
                        {{ $text }}
                    </div>
                @endif

            </div>
        </div>
    </body>
</html>
