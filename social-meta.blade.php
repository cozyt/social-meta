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
 * @param int $template_type 0|1|2
 * @param string $title
 * @param string $description 
 * @param string $image
 * @param string $url
 * @param string $type
 * @param array $fb_admins
 * @param string $twitter_username
 * @param string $twitter_author
 * @url 
 * @author  A. Harvey @since 0.1
 * @version  0.1
 * @since  0.1
 * @return string
-----------------------------------------------------------------------------}}


<title>{{ $title or Config::get('app.name') }}</title>
<meta name="description" content="{{ $description or '' }}" />

{{-- Schema.org markup for Google+ --}}
<meta itemprop="name" content="{{ $title or Config::get('app.name') }}">
<meta itemprop="description" content="{{ $description or '' }}">
@if( isset($image) )
	<meta itemprop="image" content="{{ $image or '' }}">
@endif

{{-- Twitter Card data --}}
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $title or Config::get('app.name') }}">
<meta name="twitter:description" content="{{ $description or '' }}">
@if( isset($twitter_username) )
	<meta name="twitter:site" content="{{ $twitter_username }}">
@endif
@if( isset($twitter_author) || isset($twitter_username) )
	<meta name="twitter:creator" content="{{ $twitter_author or $twitter_username }}">
@endif
@if( isset($image) )
	<meta name="twitter:image" content="{{ $image or '' }}">
@endif

{{-- Open Graph data --}}
<meta property="og:site_name" content="{{ Config::get('app.name') }}" />
<meta property="og:title" content="{{ $title or Config::get('app.name') }}" />
<meta property="og:description" content="{{ $description or '' }}" />
<meta property="og:type" content="{{ $type or 'article' }}" />
<meta property="og:url" content="{{ $url or  Request::url() }}" />
@if( isset($image) )
	<meta property="og:image" content="{{ $image or '' }}" />
@endif

@if( isset($fb_admins) && count($fb_admins) )
	@foreach($fb_admins as $fb_admin)
		<meta property="fb:admins" content="{{ $fb_admin }}" />
	@endforeach
@endif
