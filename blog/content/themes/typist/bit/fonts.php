<?php
/*
This file adds Google Fonts to your website. It is included into functions.php. Font Settings are set through Customizer.
*/
		
		//Headings only fonts
		switch (get_theme_mod('typist_headings_font', "Fjalla One")) {
			case "Fjalla One":
				wp_enqueue_style('typist-fjalla', 'https://fonts.googleapis.com/css?family=Fjalla+One' );
				break;
			case "Yanone Kaffeesatz":
				wp_enqueue_style('typist-yanone', 'https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700,400' );
				break;
			case "Passion One":
				wp_enqueue_style('typist-passion', 'https://fonts.googleapis.com/css?family=Passion+One' );
				break;
			case "Francois One":
				wp_enqueue_style('typist-francois', 'https://fonts.googleapis.com/css?family=Francois+One' );
				break;
			case "BenchNine":
				wp_enqueue_style('typist-benchnine', 'https://fonts.googleapis.com/css?family=BenchNine:400,700' );
				break;
			case "Oswald":
				wp_enqueue_style('typist-oswald', 'https://fonts.googleapis.com/css?family=Oswald' );
				break;
		}

		//Fonts that can be either headings or body fonts
		if (get_theme_mod('typist_headings_font') == 'Roboto Slab'|get_theme_mod('typist_body_font') == 'Roboto Slab') {
				wp_enqueue_style('typist-robotoslab', 'https://fonts.googleapis.com/css?family=Roboto+Slab&subset=latin,cyrillic' );} 

		if (get_theme_mod('typist_headings_font') == 'PT Sans'|get_theme_mod('typist_body_font') == 'PT Sans') {
				wp_enqueue_style('typist-ptsans', 'https://fonts.googleapis.com/css?family=PT+Sans&subset=latin,cyrillic' );} 
		
		if (get_theme_mod('typist_headings_font') == 'Noto Serif'|get_theme_mod('typist_body_font') == 'Noto Serif') {
				wp_enqueue_style('typist-noto_serif', 'https://fonts.googleapis.com/css?family=Noto+Serif&subset=latin,cyrillic' );} 	
		
		if (get_theme_mod('typist_headings_font') == 'Noto Sans'|get_theme_mod('typist_body_font') == 'Noto Sans') {
				wp_enqueue_style('typist-noto_sans', 'https://fonts.googleapis.com/css?family=Noto+Sans&subset=cyrillic,latin' );} 
				
		if (get_theme_mod('typist_headings_font') == 'Open Sans'|get_theme_mod('typist_body_font') == 'Open Sans') {
				wp_enqueue_style('typist-open_sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700' );} 

		if (get_theme_mod('typist_headings_font') == 'Fira Sans'|get_theme_mod('typist_body_font') == 'Fira Sans') {
				wp_enqueue_style('typist-firasans', 'https://fonts.googleapis.com/css?family=Fira+Sans' );} 
		
?>