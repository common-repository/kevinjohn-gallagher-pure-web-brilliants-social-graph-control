=== Pure Web Brilliant's Social Graph Control ===
	Contributors:			kevinjohngallagher, purewebbrilliant, pure-web-brilliant 
	Donate link:			http://kevinjohngallagher.com/
	Tags: 					kevinjohn gallagher, pure web brilliant, framework, cms, facebook, opengraph, open graph, social, social media, twitter, twitter cards, google+
	Requires at least:		3.0
	Tested up to: 			3.4
	Stable tag: 			2.8



Adds essential Open Graph information to your WordPress header.


== Description ==

= Plugin extensions: =

* Twitter Cards: http://wordpress.org/extend/plugins/kevinjohn-gallagher-pure-web-brilliants-social-graph-twitter-cards-extention/
* Facebook Apps: http://wordpress.org/extend/plugins/kevinjohn-gallagher-pure-web-brilliants-social-graph-facebook-extension/

= Outputs =

* og:article:author
* og:article:modified_time
* og:article:published_time
* og:article:section
* og:article:tag
* og:audio
* og:description
* og:image
* og:image:url
* og:image:secure_url
* og:locale
* og:site_name
* og:title
* og:type
* og:url
* og:video



== Installation ==

1. Upload `kevinjohn_gallagher___social_graph_output` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress



== Frequently Asked Questions ==

= I am seeing "… requires the parent framework to be installed and activated" =

This program is part of the Pure Web Brilliant family, and requires the parent framework to be installed and activated.
You can find that at: http://wordpress.org/extend/plugins/kevinjohn-gallagher-pure-web-brilliants-base-framework/

= I thought this has Twitter integration =

It does. In version 2.5 we moved that to it's own extension. You can find it here: http://wordpress.org/extend/plugins/kevinjohn-gallagher-pure-web-brilliants-social-graph-twitter-cards-extention/


= I thought this has Facebook App integration =

It does. In version 2.5 we moved that to it's own extension. You can find it here: http://wordpress.org/extend/plugins/kevinjohn-gallagher-pure-web-brilliants-social-graph-facebook-extension/

= Do I have to rewrite all my SEO/page/user data ? =

Not at all. Where possible this plugin pulls the data it needs from other plugins that might have created it. Joost de Valk's wonderful Yoast WP SEO is a great example - we pull in your optomised description and keywords from that plugin :) 

= Do you support post formats ? =

We do. Image, Gallery, Video and Audio are now no longer called as "article" and are given their appropriate tags. To our knowledge, this is the only Open Graph plugin that has this functionality at this time. 

= Wow, can I write plugins or extensions ? =

Sure! Go for it.



== Changelog ==


= 2.8 =

* Updated security check


= 2.7 =

* Bug Fix: Images returnign a string instead of an Array if post has 1 image.


= 2.6 =

* tidying of __construct
* streamlining of init_child
* moved to use frameworks: define_child_settings_sections
* moved to use frameworks: define_child_settings_array
* moved to use frameworks: add_plugin_to_menu
* Added action: _social_graph_data_get___kevinjohn_gallagher___social_graph_control
* Added action: _social_graph_data_set___kevinjohn_gallagher___social_graph_control
* Setarated GET and SET methods for data storage.



= 2.5.1 =

* Added better ordering for meta tags (looks and reads better)
* Better parsing of meta tag array
* Addition of key_name and value_name to better handle different meta tag structures
* Addition of new types in line with WordPress Post_Formats e.g. Image, gallery, video, audio.
* Dropped get_children() in favour of parsing content for images.
* Separate language filter. 
* Stopped duplication of code between framework extensions.
* Properly escape each output.
* Added hooks to each externally facing function to enable child/extension loading: See Twitter Cards and Facebook extensions.
* Removed Facebook App/Pages functionality into separate plugin.
* Removed Twitter Cards functionality separate plugin.
* Added default image for Open Graph with default WordPress media library integration.
* Added integration for Joost de Valk's wonderful WPSEO (SEO title, description, and keywords).
* Tweaked user's "contact method" update on profiles to match that of other plugins, so that we don't all over write each other. 
* Moved data definitions to separate  functions.
* Moved non-standard tags to separate extension plug-ins
* Added transient deletion hook - prepping for 3.0 release

= 2.0 =
* Removal of non-GPLv3 compatible functions.
* Publish to WP.org repository.


== Upgrade Notice ==

= 2.5.1 =
* Major upgrade to allow for extensions (e.g. Twitter Cards)

= 2.0 =
* Initial upgrade to public / GPL compatible version.



== Arbitrary section ==


**Kevinjohn Gallagher:** [Kevinjohn Gallagher](http://kevinjohngallagher.com/ "Kevinjohn Gallagher .com")

**Agency:** [Pure Web Brilliant](http://purewebbrilliant.com/ "Pure Web Brilliant")

Framework release blog post: [Pure Web Brilliant’s plugin framework released](http://kevinjohngallagher.com/2012/05/pure-web-brilliants-plugin-framework-released/ "Pure Web Brilliant’s plugin framework released")

> " I want to go on record thanking my colleagues and many of our current & past clients, who were (mostly) happy to negotiate changes in the licence of our past work so that we could make it open source. "

* Package:						Pure Web Brilliant
* Version:						2.5.1
* Author:						Kevinjohn Gallagher <framework@KevinjohnGallagher.com>
* Copyright:					Copyright (c) 2012, Kevinjohn Gallagher
* Link:							http://KevinjohnGallagher.com
* Licence:						http://www.gnu.org/licenses/gpl-3.0.txt
