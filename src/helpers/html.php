<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Collection;

if (!function_exists('map')) {

    /**
     * map a collection of models or a single one and return an array|json
     *
     * @param Collection $collection
     * @param string $from
     * @param string $to
     * @param bool $json
     * @return array|string
     */
    function map($collection, $from = 'id', $to = 'name', $json = true)
    {
        $results = [];
        // single object. ensure that we can loop over it, by pushing it into a collection
        if (is_object($collection) && !$collection instanceof Collection) {
            $object = $collection;
            $collection = new Collection($collection);
            foreach ($collection as $item => $value) {
                $results[$object->{$from}] = $object->{$to};
            }
        } else {
            // collection
            foreach ($collection as $item) {
                $results[$item->{$from}] = $item->{$to};
            }
        }

        return !$json ? $results : json_encode($results, JSON_FORCE_OBJECT);
    }
}

if (!function_exists('bool_options')) {

    /**
     * Boolean options
     *
     * @param string $true
     * @param string $false
     * @return array
     */
    function bool_options($true = 'Yes', $false = 'No')
    {
        return [
            0 => $false,
            1 => $true
        ];
    }
}

if (!function_exists('bool_to_str')) {

    /**
     * Return a string representation of the bool value
     *
     * @param $value
     * @param array $return_text
     * @return mixed
     */
    function bool_to_str($value, $return_text = ['Yes', 'No'])
    {
        if (!is_array($return_text)) {
            return false;
        }
        if ($value) {
            return $return_text[0];
        }
        return $return_text[1];
    }
}

if (!function_exists('valid_instance')) {

    /**
     * Check if an object is an instance of another. An error
     * will be thrown if the instance is invalid
     *
     * @param $object
     * @param $instance
     * @return mixed
     */
    function valid_instance($object, $instance)
    {
        $status = $object instanceof $instance;
        if (!$status) {
            throw new InvalidArgumentException(sprintf('Invalid object passed. Required instance of %ss, found %s',
                $instance, $object));
        }
        return $object;
    }
}

if (!function_exists('curr')) {
    /**
     * Format currency
     *
     * @param $amount
     * @param null $curr
     * @return string
     */
    function curr($amount, $curr = null)
    {
        // default to KSH
        $currency = $curr === null ? 'KSH' : $curr;
        // use this one, instead of the NumberFormatter
        // the extension is always missing in most systems
        return $currency . ' ' . number_format($amount, 2);
    }
}

if (!function_exists('secure_request')) {

    /**
     * Check if request is secure, by only checking the x-forwarded-proto header
     *
     * @param \Illuminate\Http\Request $request
     * @return boolean
     */
    function secure_request($request)
    {
        return $request->header('x-forwarded-proto') == 'https';
    }
}

if (!function_exists('like')) {

    /**
     * Surround keyword with '%', for a like query
     *
     * @param $q
     * @param $pattern
     * @return string
     */
    function like($q, $pattern = "%q%")
    {
        return str_replace("q", $q, $pattern);
    }
}

if (!function_exists('a')) {

    /**
     * Load an asset file
     *
     * @param $asset
     * @return string
     */
    function a($asset)
    {
        $request = app('request');
        if ($request->isSecure() || secure_request($request)) {
            return secure_asset($asset);
        }
        return asset($asset);
    }
}

if (!function_exists('bower')) {

    /**
     * Load a bower asset file
     *
     * @param $file_path
     * @return string
     */
    function bower($file_path)
    {
        return a('vendor/bower/' . $file_path);
    }
}

if (!function_exists('active')) {

    /**
     * Return 'active' as a class for an element based on routename/query string
     *
     * @param $route
     * @param bool $checkQueryString
     * @return null|string
     */
    function active($route, $checkQueryString = false)
    {
        if ($checkQueryString) {
            $queryString = Request::getQueryString();
            if ($queryString !== null) {
                return str_contains($queryString, $route) ? 'active' : null;
            }
            return null;
        }
        return Route::currentRouteName() === $route ? 'active' : null;
    }
}