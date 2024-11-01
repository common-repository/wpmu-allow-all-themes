<?php
/*
Plugin Name:  WPMU Allow All Themes
Version:      0.1
Author:       Hassan Derakhshandeh
Description:  Automatically enable all themes available on your network to all websites in the network.

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

function wpmu_allow_all_themes( $themes ) {

	remove_filter( 'allowed_themes', 'wpmu_allow_all_themes' );

	$themes = array();
	$all_themes = wp_get_themes( array(
		'allowed' => null
	) );
	foreach( $all_themes as $theme => $value ) {
		$themes[ $theme ] = 1;
	}

	add_filter( 'allowed_themes', 'wpmu_allow_all_themes' );

	return $themes;
}
add_filter( 'allowed_themes', 'wpmu_allow_all_themes' );