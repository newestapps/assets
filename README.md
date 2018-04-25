# Newestapps Assets

- Simple and reusable.

- Create the file `resources/page_assets.php`

- Example of the file content

```
Assets::component('animate.css')
    ->addCSS(
        'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css',
        AssetPositioning::STYLES_START
    );

Assets::component('chartjs')
    ->addJs(
        'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js',
        AssetPositioning::SCRIPTS_END
    );

Assets::component('jquery-datatable')
    ->addCss(
        'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/jquery.dataTables.min.css',
        AssetPositioning::STYLES_START
    )
    ->addJs(
        'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js',
        AssetPositioning::SCRIPTS_END
    );

Assets::component('card-css')
    ->addCss(
        'https://cdnjs.cloudflare.com/ajax/libs/card/2.4.0/card.css',
        AssetPositioning::STYLES_START
    )
    ->addJs(
        'https://cdnjs.cloudflare.com/ajax/libs/card/2.4.0/jquery.card.min.js',
        AssetPositioning::SCRIPTS_START
    );

Assets::component('moip')
    ->addJs(
        '//assets.moip.com.br/v2/moip.min.js',
        AssetPositioning::SCRIPTS_START
    );
```

- And call the components you need, on your blade views, or anywhere.

```
{{--Will print a bunch of link tags with your assets (for component named 'global')--}}

{{-- In your main layout, for example --}}
{{ pageAssets()->renderCss('styles-start') }}

{{-- In your chield views, that extends your main layout --}}
{{-- Just say which components you wanna use in that page --}}
<?php pageAssets(['animate.css', 'card-css']); ?>

{{-- You your main layout view, it'll include all CSS references you've defined in page_assets.php file
    for that component, and only who's defined for 'styles-start' --}}
```
