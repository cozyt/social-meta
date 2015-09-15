{{-----------------------------------------------------------------------------
 * Social Meta
 * A snippet that makes it easier you properly define the meta data for
 * the application, specifically for sharing on social media.
 *
 * Taken from the handy blog post at moz.com,
 * http://moz.com/blog/meta-data-templates-123,
 * this is the all bells and whistles template for handling social media tags
 * that can be modified with parsing params to strip back the tags displayed.
 *
 * Open Graph notes taken directly from the Facebook plugins documentation
 * https://developers.facebook.com/docs/plugins/checklist/
 * the snippet makes sure that the basic Open Graph tags you should be
 * implemented are, otherwise, it throws an error.
 *
 * og:title 		The title of your article, excluding any branding.
 * og:site_name		The name of your website. e.g. IMDb not imdb.com.
 * og:URL 			The URL that is the the unique identifier for your post.
 * 					It should match your canonical URL used for SEO, and it
 * 					should not include any session variables, user identifying
 *					parameters, or counters. If you use this improperly, likes
 *					and shares will not be aggregated for this URL and will be
 *					spread across all of the variations of the URL.
 * og:description	A detailed description of the piece of content, usually
 * 					between 2 and 4 sentences.
 * og:image			The URL of the image that you want to appear when you share
 *					a link. We suggest that you use an image of at least
 *					1200x630 pixels.
 *
 * @param string $title
 * @param string $description
 * @param string $image
 * @param string $url
 * @param string $type
 * @param string $fb_app_id
 * @param array  $fb_admins
 * @param string $twitter_username
 * @param string $twitter_author
 * @url
 * @author  A. Harvey @since 0.1
 * @version  0.1
 * @since  0.1
 * @return string
-----------------------------------------------------------------------------}}

<?php
// Set some really basic defaults
$title       = isset($title)        ? $title        : Config::get('app.name');
$description = isset($description)  ? $description  : '';
$image       = isset($image)        ? $image        : '';
$type        = isset($type)         ? $type         : 'article';
$url         = isset($url)          ? $url          : Request::url();
?>

<title>{{ $title }}</title>
<meta name="description"         content="{{ $description }}" />

{{-- Schema.org markup for Google+ --}}
<meta itemprop="name"            content="{{ $itemprop_name        or $title }}">
<meta itemprop="description"     content="{{ $itemprop_description or $description }}">
@if( isset($itemprop_image) || $image )
<meta itemprop="image"           content="{{ $itemprop_image       or $image }}">
@endif

{{-- Twitter Card data --}}
<meta name="twitter:card"        content="{{ $twitter_card         or 'summary' }}">
<meta name="twitter:title"       content="{{ $twitter_title        or $title }}">
<meta name="twitter:description" content="{{ $twitter_description  or $description }}">
@if( isset($twitter_username) )
<meta name="twitter:site"        content="{{ $twitter_username }}">
@endif
@if( isset($twitter_author) || isset($twitter_username) )
<meta name="twitter:creator"     content="{{ $twitter_author       or $twitter_username }}">
@endif
@if( isset($twitter_image) || $image )
<meta name="twitter:image"       content="{{ $twitter_image        or $image }}">
@endif

{{-- Open Graph data --}}
<meta property="og:site_name"    content="{{ $og_site_name         or Config::get('app.name') }}" />
<meta property="og:title"        content="{{ $og_title             or $title }}" />
<meta property="og:description"  content="{{ $og_description       or $description }}" />
<meta property="og:type"         content="{{ $og_type              or $type }}" />
<meta property="og:url"          content="{{ $og_url               or $url }}" />
@if( isset($image) )
<meta property="og:image"        content="{{ $og_image             or $image }}" />
@endif

{{-- Facebook admin --}}
@if( isset($fb_app_id) )
<meta property="fb:app_id"       content="{{ $fb_app_id }}" />
@endif
@if( isset($fb_admins) && count($fb_admins) )
@foreach($fb_admins as $fb_admin)
<meta property="fb:admins"       content="{{ $fb_admin }}" />
@endforeach
@endif
