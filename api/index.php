<?php
/**
 * WordPress bootstrap for Vercel serverless using vercel-php runtime.
 * All requests route through here.
 */

// Load WordPress
require_once __DIR__ . '/../wordpress/wp-load.php';

// Handle the request via WordPress
$wp->init();
$wp->parse_request();
$wp->query_posts();
$wp->register_globals();
$wp->send_headers();

// Serve the page
require_once ABSPATH . WPINC . '/template-loader.php';
