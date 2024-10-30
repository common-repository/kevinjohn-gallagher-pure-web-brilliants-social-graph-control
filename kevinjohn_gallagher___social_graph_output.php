<?php
/*
	Plugin Name: 			Kevinjohn Gallagher: Pure Web Brilliant's Social Graph Control
	Description: 			Adds essential Open Graph information to your WordPress header.
	Version: 				2.8
	Author: 				Kevinjohn Gallagher
	Author URI: 			http://kevinjohngallagher.com/
	
	Contributors:			kevinjohngallagher, purewebbrilliant, pure-web-brilliant 
	Donate link:			http://kevinjohngallagher.com/
	Tags: 					kevinjohn gallagher, pure web brilliant, framework, cms, facebook, opengraph, open graph, social, social media, twitter, twitter cards, google+
	Requires at least:		3.0
	Tested up to: 			3.4
	Stable tag: 			2.8
*/
/**
 *
 *	Kevinjohn Gallagher: Pure Web Brilliant's Social Graph Control
 * ==========================================================
 *
 *	Adds essential Open Graph information to your WordPress header.
 *
 *
 *	This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 *	General Public License as published by the Free Software Foundation; either version 3 of the License, 
 *	or (at your option) any later version.
 *
 * 	This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
 *	without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 *	See the GNU General Public License (http://www.gnu.org/licenses/gpl-3.0.txt) for more details.
 *
 *	You should have received a copy of the GNU General Public License along with this program.  
 * 	If not, see http://www.gnu.org/licenses/ or http://www.gnu.org/licenses/gpl-3.0.txt
 *
 *
 *	Copyright (C) 2008-2012 Kevinjohn Gallagher / http://www.kevinjohngallagher.com
 *
 *
 *	@package				Pure Web Brilliant
 *	@version 				2.8
 *	@author 				Kevinjohn Gallagher <wordpress@kevinjohngallagher.com>
 *	@copyright 				Copyright (c) 2012, Kevinjohn Gallagher
 *	@link 					http://kevinjohngallagher.com
 *	@license 				http://www.gnu.org/licenses/gpl-3.0.txt
 *
 *
 */



 	if ( ! defined( 'ABSPATH' ) )
 	{ 
 			die( 'Direct access not permitted.' ); 
 	}
 	
 	
 	

	define( '_KEVINJOHN_GALLAGHER___social_graph_control', '2.8' );



	if (class_exists('kevinjohn_gallagher')) 
	{
		
		
		class	kevinjohn_gallagher___social_graph_control 
		extends kevinjohn_gallagher
		{
		
				/*
				**
				**		VARIABLES
				**
				*/
				const PM		=	'_kevinjohn_gallagher___social_graph_control';
				
				var					$instance;
				var 				$plugin_name;
				var					$uniqueID;
				var					$plugin_dir;
				var					$plugin_url;
				var					$plugin_page_title; 
				var					$plugin_menu_title; 					
				var 				$plugin_slug;
				var 				$http_or_https;
				var 				$plugin_options;
				
				var 				$meta_array;
				var 				$post_type;

				

		
				/*
				**
				**		CONSTRUCT
				**
				*/
				public	function	__construct() 
				{
						$this->instance 					=&	$this;
						$this->uniqueID 					=	self::PM;
						$this->plugin_dir					=	plugin_dir_path(__FILE__);	
						$this->plugin_url					=	plugin_dir_url(__FILE__);							
						$this->plugin_name					=	"Kevinjohn Gallagher: Pure Web Brilliant's Social Graph Control";
						$this->plugin_page_title			=	"social graph control"; 
						$this->plugin_menu_title			=	"social graph"; 					
						$this->plugin_slug					=	"social-graph-control";
						
						
						
						/*
						$this->child_settings_sections 							=	array();
						$this->child_settings_array 							=	array();						
						*/
						
						add_action( 'init',				array( $this, 'init' ) );
						add_action( 'init',				array( $this, 'init_child' ) );
						add_action(	'admin_init',		array( $this, 'admin_init_register_settings'), 100);
						add_action( 'admin_menu',		array( $this, 'add_plugin_to_menu'));
						
												
				}
				
				
				
				
				
				/*
				**
				**		INIT_CHILD
				**
				*/
			
				public function init_child() 
				{
			
				
					//	$this->child_settings_sections 							=	array();
					//	$this->child_settings_array 							=	array();
						
					//	$this->define_child_settings_sections();
					//	$this->define_child_settings_array();
					
						$this->meta_array										=	array();
						
						add_filter( 'wp_head',									array( 	&$this, 	'open_graph_control' ), 			100 );
						add_filter(	'language_attributes',						array( 	&$this, 	'open_graph_namespace'), 			100 );
						add_filter(	'user_contactmethods',						array( 	&$this, 	'modernise_contacts'), 				100, 	1);
						add_action( 'save_post', 								array( 	&$this, 	'delete_social_graph_transient'),	10,		2 );
				}
				
				
				
				
				public 	function 	define_child_settings_sections()
				{
						$this->child_settings_sections['section_all']					= ' All: ';
					//	$this->child_settings_sections['section_gp']					= ' Google+: ';
					
					
				}
				
				
				
				public 	function 	define_child_settings_array()
				{				
						
						$this->child_settings_array['open_graph_default'] = array(
																				'id'      		=> 	'open_graph_default',
																				'title'   		=> 	'Default image',
																				'description'	=>	'<br />This is "a fall back" image that will be shown if/when no other image is availbile.',
																				'type'    		=>	'wp_image_upload',
																				'section' 		=>	'section_all',
																				'choices' 		=> 	array(
																										'image-id'		=>	'',
																										'cpt'			=>	'',
																										'post-name'		=>	'',
																										'size'			=>	''
																									),
																				'class'   		=> 	''
																			);					

																																						
																			


						$this->child_settings_array['google_plus_link'] 	= array(
																				'id'      		=> 'google_plus_link',
																				'title'   		=> 'Google Plus page',
																				'description'	=> ' ',
																				'type'    		=> 'text',
																				'section' 		=> 'section_gp',
																				'choices' 		=> array(																	
																									),
																				'class'   		=> ''
																			);
																			

				}		
				
				
				
				
						
				

				/*
				**
				**		ADD_PLUGIN0_TO_MENU
				**
				*/				
				public 	function 	add_plugin_to_menu()
				{
						$this->framework_admin_menu_child(	$this->plugin_page_title, 
															$this->plugin_menu_title, 
															$this->plugin_slug, 
															array($this, 	'child_admin_page')
														);
				}
				
				
				
				

				/*
				**
				**		CHILD ADMIN PAGE
				**
				*/				
				public 	function 	child_admin_page()
				{
						$this->framework_admin_page_header('Social Graph Control', 'icon_class');
					 
						$this->framework_admin_page_footer();				
				}
				
				
				

				
				
				/**
				 *		Adds the Open Graph Schema to the Language attributes.
				 *		 
				 * 		@param  	string $language_attributes
				 * 		@return		string
				 */
				public 	function 	open_graph_namespace($language_attributes)
				{
						return	$language_attributes . ' xmlns:og="http://opengraphprotocol.org/schema/"';
				}
				
				
				
				
				

				
				/**
				 *		Adds the Open Graph Schema to the Language attributes.
				 *		 
				 * 		@args  		array 		passed args by WP function
				 * 		@return		array
				 */
				public 	function 	modernise_contacts($contact_option)
				{


						//
						//	Changed to match other plugins - no point in asking people twice
						//
						if ( !isset( $contact_option['googleplus'] ) )
						{
									$contact_option['googleplus']		=	'Google+:';
						}
				


						// Remove AIM
						if ( isset( $contact_option['aim'] ) )
						{
								unset( $contact_option['aim'] );
						}
						
						// Remove Yahoo IM
						if ( isset( $contact_option['yim'] ) )
						{
								unset( $contact_option['yim'] );
						}

						// Remove JABBER
						if ( isset( $contact_option['jabber'] ) )
						{
								unset( $contact_option['jabber'] );
						}		
						
					
						return 		$contact_option;
				}




				/**
				 *		Adds social graph data to the plugin array.
				 *		 
				 * 		@key  		string 	meta key
				 * 		@value		string	meta value
				 */
				public function 	add_meta_data_full($key, $value, $key_name='property', $value_name='content', $meta='meta')
				{
				
						if( !empty( $key ) && !empty( $value )  )
						{

								$this->meta_array[$key][] 		= 		array(
																					'meta'			=>	$meta,
																					'key_name'		=>	$key_name,
																					'key'			=>	$key,
																					'value_name'	=>	$value_name,
																					'value'			=>	$value,							
																				);
						}
					
				}




				/**
				 *		
				 *		 
				 * 		
				 * 		
				 */
				 
				public		function 	order_meta_array_by_child_value($a, $b) 
				{
						return $a['value'] > $b['value'] ? 1 : -1;
				}
				
				
				
				
				/**
				 *		Adds social graph data to the plugin array.
				 *		 
				 * 		@args  		array 	I have no idea why, but I'll probably need it in the future
				 * 		@value		string	meta value
				 */
				public 	function 	output_meta_data_full($args = array())
				{
						ksort( $this->meta_array );
						
						echo 	"\n";
				
						foreach($this->meta_array as $meta_type => $child_array)
						{
								usort(	$child_array, 	array( $this, "order_meta_array_by_child_value") );								
								
								foreach( $child_array as $order => $meta_tag	)
								{
										echo 	"\n";
										echo 	'<'. $meta_tag['meta'] .' '. $meta_tag['key_name'] .'="'. $meta_tag['key'] .'" '. $meta_tag['value_name'] .'="'. $meta_tag['value'] .'" />';										
								}								
																		
						}
						
						echo 	"\n";
						echo 	"\n";						
					
				}
				
				
				
				
				


				/**
				 *		Defines post type for Open Graph
				 *		 
				 * 		@object  	$post
				 * 		@return		string
				 */
				public	function	define_og_type( $post )
				{
				
						global 	$post;
						
						
						if ( is_single() ) 
						{
								if( $post->post_type == "image" 	|| 	$post->post_type == "gallery"  )
								{
										$this->og_type 		= 	'image';
									
									
								} 	elseif( $post->post_type == "video" ) 	{
		
										$this->og_type 		= 	'video';
										
										
								} 	elseif( $post->post_type == "audio" ) 	{
								
										$this->og_type 		= 	'audio';
																			
								}	else {
									
										$this->og_type 		= 	'article';
								}
																
								
						} else {
						
								$this->og_type 		= 	'website';
						}
						
						
						$this->og_type 			= 	esc_attr( $this->og_type ) ;
						
						return		$this->og_type;					
				}

				
				



				/**
				 *		
				 *		 
				 * 		
				 * 		
				 */
				 				
				public 		function  	define_page_basics( $post )
				{
					
						$this->og_site 		=		esc_attr( get_bloginfo('name') );
				}
				
								
				
				



				/**
				 *		
				 *		 
				 * 		
				 * 		
				 */
				 				
				public 		function  	define_page_image( $post )
				{
				
				
						$sorted_for_Es_and_whizz		=	false;
				

						if ( function_exists('has_post_thumbnail') )
						{
								if( has_post_thumbnail( $post->ID ) ) 
								{
										$this->page_featured_image 				=	wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
										$sorted_for_Es_and_whizz				=	true;
								}
						}


						if( $sorted_for_Es_and_whizz )
						{
								if ( isset( $this->plugin_options['open_graph_default'] ) )
								{
									
										$this->page_featured_image			=		$this->plugin_options['open_graph_default'] ;
										$sorted_for_Es_and_whizz			=		true;
		
								} else {
		
										if( class_exists('kevinjohn_gallagher___meta_controls') )
										{
												$this->meta_control_options			=		get_option( kevinjohn_gallagher___meta_controls::PM . '___options');
												$this->page_featured_image			=		$this->meta_control_options[open_graph_default];
												
												$sorted_for_Es_and_whizz			=		true;
										}
								}
						}


						return 		$sorted_for_Es_and_whizz;				
					
				}				
				
								
				
				



				/**
				 *		
				 *		 
				 * 		
				 * 		
				 */
				 				
				public 		function  	define_page_images( $post )
				{
					

						$sorted_for_Es_and_whizz		=	false;
				

						if ( preg_match_all( '/<img [^>]+>/', $post->post_content, $images ) ) 
						{						
								foreach ( $images[0] as $image )
								{
										if ( preg_match( '/src=("|\')([^"|\']+)("|\')/', $image, $image_attributes ) ) 
										{
											//	$image_src		=	$image_attributes[2];
												
												$this->page_content_images[]			=		$image_attributes[2];
										}
										
										$sorted_for_Es_and_whizz		=	true;
								}						
						}
						
						if( $post->post_type == "image" )
						{
								$this->page_featured_image 			=		$this->page_content_images[0];
							
						}

						
						return 		$sorted_for_Es_and_whizz;
					
				}
				
								
				
				



				/**
				 *		
				 *		 
				 * 		
				 * 		
				 */
				 				
				public 		function  	define_page_title( $post )
				{
						$this->og_title 		=		esc_attr( get_the_title() );
				}				
				
								
				
				



				/**
				 *		
				 *		 
				 * 		
				 * 		
				 */
				 				
				public 		function  	define_page_url( $post )
				{
						$this->og_url	 		=		esc_url( get_permalink() );			//	Still mental that there is no "get_the_permalink"
					
				}				
				
				
								
				
				



				/**
				 *		
				 *		 
				 * 		
				 * 		
				 */
				 				
				public 		function  	define_page_description( $post )
				{
						
						if(class_exists('WPSEO_Frontend'))
						{							 
								 if ( function_exists('wpseo_get_value'))
								 {
									
										$this->og_description				=	$this->post_custom_fields['_yoast_wpseo_metadesc'][0];
	
								 }	 
						}
						

						if ( empty( $this->og_description ) )
						{
						
								if ( has_excerpt($post->ID) ) 
								{
										$this->og_description		=	esc_attr(strip_tags(get_the_excerpt($post->ID)));
								} else {
										$this->og_description		=	esc_attr(str_replace("\r\n",' ',substr(strip_tags(strip_shortcodes($post->post_content)), 0, 160)));
								}
						}
						
						$this->og_description 			=	esc_attr( $this->og_description );
					
					
				}				
				
								
				
				



				/**
				 *		
				 *		 
				 * 		
				 * 		
				 */
				 				
				public 		function  	define_page_language( $post )
				{
						$this->og_language	 		=		esc_attr(  strtolower( get_locale() ) );
					
				}				
				

				
				



				/**
				 *		
				 *		 
				 * 		
				 * 		
				 */
				 				
				public 		function 	define_page_article( $post )
				{
						$this->og_article_author 					= 		esc_attr( get_the_author($post) );
						$this->og_article_published_time 			= 		esc_attr( $post->post_date );
						$this->og_article_modified_time 			= 		esc_attr( $post->post_modified );
						
				}
				
				
												





				/**
				 *		
				 *		 
				 * 		
				 * 		
				 */
				 
				public 		function 	define_page_article_multiples( $post )
				{
						$categories = get_the_terms( $post->ID, 'category' );					
						
						
						if($categories)
						{
								foreach( $categories as $key => $value )
								{						
										if ($categories[$key]->slug != 'uncategorized')
										{
												$this->add_meta_data_full('og:article:section', 			$categories[$key]->slug);
										}							
								}
						}


						$tags	= get_the_tags( $post->ID );					
						
						
						if($tags)
						{
								foreach( $tags as $key => $value )
								{						
										if ($tags[$key]->name != 'uncategorized')
										{
												$this->add_meta_data_full('og:article:tag', 			$tags[$key]->name);
										}							
								}
						}




						$this->post_custom_fields 			= get_post_custom($post->ID);
						
						
						if( !empty( $this->post_custom_fields['_yoast_wpseo_metakeywords'] ))
						{
								$this->add_meta_data_full('og:article:tag', 			$this->post_custom_fields['_yoast_wpseo_metakeywords'][0]);
						}
						

						if( !empty( $this->post_custom_fields['_yoast_wpseo_focuskw'] ))
						{
								foreach( $this->post_custom_fields['_yoast_wpseo_focuskw'] as $key => $value )
								{						
											$this->add_meta_data_full('og:article:tag', 			$value);
								}

						}

				}








				/**
				 *		
				 *		 
				 * 		
				 * 		
				 */
				 
				public 		function 	set_image_tags()
				{
						
						if( $this->page_featured_image )
						{
					
								
								$this->add_meta_data_full('og:image',	 						$this->page_featured_image );
								$this->add_meta_data_full('og:image:url',	 					$this->page_featured_image );
								
								if (is_ssl()) 
								{
										$this->add_meta_data_full('og:image:secure_url',	 					$this->page_featured_image );
								}	
						}
						
									
						if( !empty( $this->page_content_images ) )
						{						
								foreach( $this->page_content_images as $value )
								{

										$this->add_meta_data_full('og:image',	 						$value );
										$this->add_meta_data_full('og:image:url',	 					$value );
										
										if (is_ssl()) 
										{
												$this->add_meta_data_full('og:image:secure_url',	 				$value );
										}										
									
								}
						}	
					
				}


				



				
				
				
				/**
				 *		Adds Open graph data to the HEAD.
				 *		 
				 * 		@param  	string $image_html
				 * 		@return		string
				 */
				public	function	open_graph_control( $post )
				{

						wp_reset_query();
						
						global $post;	
											

						$this->define_og_type( $post );
						
						$this->define_page_basics( $post );
						$this->define_page_image( $post );
						$this->define_page_images( $post );
						$this->define_page_title( $post );
						$this->define_page_url( $post );
						$this->define_page_description( $post );
						$this->define_page_language( $post );
						$this->define_page_article( $post );
						$this->define_page_article_multiples( $post );
						
						
						
						do_action( 'kjg_pwb_hook_social_graph_data_get__'. $this->uniqueID , $this, $post);
						

						
					
						
						$this->add_meta_data_full('og:type',		 					$this->og_type );
						$this->add_meta_data_full('og:title',	 						$this->og_title );
						$this->add_meta_data_full('og:url', 							$this->og_url  );
						$this->add_meta_data_full('og:description', 					$this->og_description );
						$this->add_meta_data_full('og:site_name', 						$this->og_site );
						$this->add_meta_data_full('og:article:author', 					$this->og_article_author  );
						$this->add_meta_data_full('og:article:published_time', 			$this->og_article_published_time );
						$this->add_meta_data_full('og:article:modified_time', 			$this->og_article_modified_time );
						$this->add_meta_data_full('og:locale',				 			$this->og_language );
				
						$this->set_image_tags();



						do_action( 'kjg_pwb_hook_social_graph_data_set__'. $this->uniqueID , $this, $post);
						
						
						
						$this->output_meta_data_full();
						
				}
				
				
				
				
				
				
				
				
				
				
				
				/**
				 *		
				 *		 
				 * 		
				 * 		
				 */
				 				
				public 		function 	delete_social_graph_transient( $post_ID, $post )
				{
						
						delete_transient( 'kjg_pwb_social_graph_post_' . $post_ID );
												
				}
				
		
		
		}	//	class
		
	
		$kevinjohn_gallagher___social_graph_control			=	new kevinjohn_gallagher___social_graph_control();
		
	
	} else {
	

			function kevinjohn_gallagher___social_graph_control___parent_needed()
			{
					echo	"<div id='message' class='error'>";
					
					echo	"<p>";
					echo	"<strong>Kevinjohn Gallagher: Social Graph Control</strong> ";	
					echo	"requires the parent framework to be installed and activated";
					echo	"</p>";
			} 

			add_action('admin_footer', 'kevinjohn_gallagher___social_graph_control___parent_needed');	
	
	}

