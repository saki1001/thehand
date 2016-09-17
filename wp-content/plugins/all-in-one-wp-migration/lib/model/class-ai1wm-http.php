<?php
/**
 * Copyright (C) 2014-2016 ServMask Inc.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ███████╗███████╗██████╗ ██╗   ██╗███╗   ███╗ █████╗ ███████╗██╗  ██╗
 * ██╔════╝██╔════╝██╔══██╗██║   ██║████╗ ████║██╔══██╗██╔════╝██║ ██╔╝
 * ███████╗█████╗  ██████╔╝██║   ██║██╔████╔██║███████║███████╗█████╔╝
 * ╚════██║██╔══╝  ██╔══██╗╚██╗ ██╔╝██║╚██╔╝██║██╔══██║╚════██║██╔═██╗
 * ███████║███████╗██║  ██║ ╚████╔╝ ██║ ╚═╝ ██║██║  ██║███████║██║  ██╗
 * ╚══════╝╚══════╝╚═╝  ╚═╝  ╚═══╝  ╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝
 */

class Ai1wm_Http {

	public static function get( $url, $params = array() ) {

		// Check the status, maybe we need to stop it
		if ( ! is_file( ai1wm_export_path( $params ) ) && ! is_file( ai1wm_import_path( $params ) ) ) {
			exit;
		}

		// Get IP address
		$ip = get_option( AI1WM_URL_IP );

		// Get adapter
		$adapter = get_option( AI1WM_URL_ADAPTER );

		// HTTP request
		Ai1wm_Http::request( $url, $ip, $adapter, $params );
	}

	public static function resolve( $url ) {

		// Reset IP address and adapter
		delete_option( AI1WM_URL_IP );
		delete_option( AI1WM_URL_ADAPTER );

		// Set secret
		$secret_key = get_option( AI1WM_SECRET_KEY );

		// Set host
		$host = parse_url( $url, PHP_URL_HOST );

		// Set server IP address
		if ( ! empty( $_SERVER['SERVER_ADDR'] ) ) {
			$server = $_SERVER['SERVER_ADDR'];
		} else if ( ! empty( $_SERVER['LOCAL_ADDR'] ) ) {
			$server = $_SERVER['LOCAL_ADDR'];
		} else {
			$server = '127.0.0.1';
		}

		// Set local IP address
		$local = gethostbyname( $host );

		// HTTP resolve
		foreach ( array( 'stream', 'curl' ) as $adapter ) {
			foreach ( array( $server, $local, $host ) as $ip ) {

				// Add IPv6 support
				if ( filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6 ) ) {
					$ip = "[$ip]";
				}

				// HTTP request
				Ai1wm_Http::request( $url, $ip, $adapter, array(
					'secret_key' => $secret_key,
					'url_ip' => $ip,
					'url_adapter' => $adapter,
				) );

				// HTTP response
				for ( $i = 0; $i < 5; $i++, sleep( 1 ) ) {

					// Flush WP cache
					ai1wm_cache_flush();

					// Is valid adapter?
					if ( get_option( AI1WM_URL_IP ) && get_option( AI1WM_URL_ADAPTER ) ) {
						return;
					}
				}
			}
		}

		// No connection
		throw new Ai1wm_Http_Exception( __(
			'There was a problem while reaching your server.<br />' .
			'Contact <a href="mailto:support@servmask.com">support@servmask.com</a> for assistance.',
			AI1WM_PLUGIN_NAME
		) );
	}

	public static function request( $url, $ip, $adapter, $params = array() ) {
		// Set host
		$host = parse_url( $url, PHP_URL_HOST );

		// Set port
		$port = parse_url( $url, PHP_URL_PORT );

		// Set accept header
		$headers = array( "Accept: */*" );

		// Set URL
		if ( ! empty( $ip ) ) {
			$url = str_replace( "//{$host}", "//{$ip}", $url );
		}

		// Set host header
		if ( ! empty( $port ) ) {
			$headers[] = "Host: {$host}:{$port}";
		} else {
			$headers[] = "Host: {$host}";
		}

		// Set user agent header
		if ( ! empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
			$headers[] = "User-Agent: {$_SERVER['HTTP_USER_AGENT']}";
		} else {
			$headers[] = "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko)";
		}

		// Add authorization header
		if ( ( $user = get_option( AI1WM_AUTH_USER ) ) && ( $password = get_option( AI1WM_AUTH_PASSWORD ) ) ) {
			if ( ( $hash = base64_encode( "{$user}:{$password}" ) ) ) {
				$headers[] = "Authorization: Basic {$hash}";
			}
		}

		// HTTP request
		Ai1wm_Http_Factory::create( $adapter )->get( add_query_arg( ai1wm_urlencode( $params ), $url ), $headers );
	}
}
