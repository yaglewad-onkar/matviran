<?php

class OhioOptionsCache {

    /**
     * Cache items storage
     *
     * @var null|array
     */
    protected static $options = null;

    /**
     * Storage object options key
     *
     * @var string
     */
    protected static $db_cache_option_key = 'ohio_global_cache';

    /**
     * Init first call and parse cache storage from database
     *
     * @return void
     */
    protected static function init() {
        if ( !is_null( self::$options ) ) return;

        $cached_options = get_option( self::$db_cache_option_key );

        if ( $cached_options ) {
            self::$options = json_decode( $cached_options, true );
        }

        if ( !self::$options || !is_array( self::$options ) ) {
            self::$options = [];
        }
    }

    /**
     * Get cache value
     *
     * @param string $key
     * @return mixed
     */
    public static function get( $key ) {
        self::init();

        if ( !self::has( $key ) ) return null;

        return self::$options[$key];
    }

    /**
     * Check cache item existance in storage
     *
     * @param string $key
     * @return boolean
     */
    public static function has( $key ) {
        self::init();

        return array_key_exists( $key, self::$options );
    }

    /**
     * Set cache value
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set( $key, $value ) {
        self::init();

        self::$options[$key] = $value;
    }

    /**
     * Remove cache item from storage
     *
     * @param string $key
     * @return void
     */
    public static function remove( $key ) {
        self::init();

        if ( !self::has( $key ) ) return;

        unset( self::$options[$key] );
    }

    /**
     * Save cache storage to database
     *
     * @return void
     */
    public static function save() {
        if ( is_null( self::$options ) ) return;

        update_option( self::$db_cache_option_key, json_encode( self::$options ) );
    }

    public static function flush() {
        self::$options = [];
        self::save();
    }
}