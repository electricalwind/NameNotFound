<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * URL helper additions
 */

if ( ! function_exists('css_url'))
{
	function css_url($name)
	{
		return base_url() . 'static/css/' . $name . '.css';
	}
}

if ( ! function_exists('js_url'))
{
	function js_url($name)
	{
		return base_url() . 'static/js/' . $name . '.js';
	}
}

if ( ! function_exists('img_url'))
{
	function img_url($name)
	{
		return base_url() . 'static/images/' . $name;
	}
}

if ( ! function_exists('img'))
{
	function img($name, $title = '')
	{
		return '<img src="' . img_url($name) . '" title="' . $title . '" alt="' . $title . '" />';
	}
}

if ( ! function_exists('url'))
{
	function url($text, $uri = '')
	{	
		return '<a href="' . site_url($uri) . '">' . $text . '</a>';
	}
}
