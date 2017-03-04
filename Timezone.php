<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Its a PHP class to convert date-time into particular timezone wise
 * @package   PHP
 * @author    Sorav Garg
 */

class Timezone
{
    function __construct()
    {
        $this->deafult_timezone  = 'America/New_York';
        $this->deafult_idetifire = '-05:00';
    }
    
    /**
     * [To get all timezones]
     */
    public function timezones()
    {
        $zones_array = array();
        $timestamp   = time();
        foreach (timezone_identifiers_list() as $key => $zone) {
            date_default_timezone_set($zone);
            $row['timezone']   = $zone;
            $row['identifire'] = date('P', $timestamp);
            array_push($zones_array, $row);
        }
        return $zones_array;
    }
    
    /**
     * [To Get Identifires Using Timezone]
     * @param string $tz
     */
    public function get_timezone_identifire($tz)
    {
        if (!empty($tz)) {
            $timezone_list = array();
            $timestamp     = time();
            foreach (timezone_identifiers_list() as $key => $zone) {
                date_default_timezone_set($zone);
                $timezone_list[$zone] = date('P', $timestamp);
            }
            if (isset($timezone_list[$tz]) && !empty($timezone_list[$tz])) {
                return $timezone_list[$tz];
            } else {
                return $this->deafult_idetifire;
            }
        } else {
            return $this->deafult_idetifire;
        }
    }
    
    /**
     * [To Convert Using Timezone]
     * @param string $tz
     * @param string $utc
     * @param string $format
     */
    public function convert_timezone($tz, $utc, $format = "d F Y, h:i A")
    {
        /* To check datetime format is valid or not */
        if (!preg_match('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/', $utc)) {
            die('Invalid datetime format should be Y-m-d H:i:s');
        }
        $datetime      = '';
        /* Get Identifire to convert datetime */
        $identifire    = $this->get_timezone_identifire($tz);
        $identifireArr = explode(":", $identifire);
        $pos           = strpos($identifireArr[0], '+');
        if ($pos === false) {
            /* To subtract identifire value into datetime */
            $datetime = date($format, strtotime($identifireArr[0] . ' hour -' . $identifireArr[1] . ' minutes', strtotime($utc)));
        } else {
            /* To add identifire value into datetime */
            $datetime = date($format, strtotime($identifireArr[0] . ' hour +' . $identifireArr[1] . ' minutes', strtotime($utc)));
        }
        /* Return converted datetime */
        return $datetime;
    }
    
    
    
}


?>