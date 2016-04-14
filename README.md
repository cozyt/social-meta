# Social Meta

A Blade snippet that makes it easier you properly define the meta data for the application, specifically for sharing on social media.

Taken from the handy blog post at moz.com, http://moz.com/blog/meta-data-templates-123, this is the all bells and whistles template for handling social media tags that can be modified with parsing params to strip back the tags displayed.

Open Graph notes taken directly from the Facebook plugins documentation https://developers.facebook.com/docs/plugins/checklist/ the snippet makes sure that the basic Open Graph tags you should be implemented are, otherwise, it throws an error.

## Version

0.3

## Installation

1. Add the package to your `composer.json` file. As it's not yet registered on Packagist, you might want to add the full repository

    ```json
        "require": [
            "cozyt/social-meta": "0.*",
        ],
        "repositories": [
            {
                "type": "git",
                "url": "https://github.com/cozyt/social-meta"
            }
        ],
    ```

2. Register the view file

    ```php
    'paths' => [
        realpath(base_path('vendor/cozyt/social-meta')),
    ],
    ```

## Usage

The snippet can be used the same as any blade view.

```php
@include('social-meta')
```

The snippet should just work when included but it's output will hardly be useful. The following args should be parsed to start outputting minimal social meta tags:

```php
@include('social-meta', [
'title'       => 'Title of the document',
'description' => 'Document description',
'image'       => 'Share image',
'type'        => 'Document type e.g. an article',
'url'         => 'Shared URL, defaults to the current URL',
'fb_app_id'   => 'The facebook App ID associated with the application',
])
```

Other more specific tags can be set, such as open graph specific tags, by prefixing the parsed argument with the proeprty type followed by an underscore
E.g. `og_title` to create a specific title for `og:title`
