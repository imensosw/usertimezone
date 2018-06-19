<?php

namespace Imenso\Timezones;

use DateTime;
use DateTimeZone;

class Timezones
{
    /**
     * convert the given DateTime into user timezone
     * @param string $dateTime
     * @param string $formatForm
     * @return string
     */
    public function toUTC($dateTime, $formatForm )
    {
        $timeZone = 'UTC';
        if( isset(\Auth::user()->time_zone ))
        {
            $timeZone = \Auth::user()->time_zone['timeZone'] ;
        }
        return \DateTime::createFromFormat($formatForm,$dateTime,new \DateTimeZone($timeZone))->setTimezone(new \DateTimeZone('UTC'))->format('Y-m-d H:i:s');
    }

    /**
     * convert the given DateTime from UTC into user timezone
     * @param string $dateTime
     * @param string $formatTo 
     * @return string
     */
    public function toLocal($dateTime,  $formatTo = 'Y-m-d H:i:s')
    {
        $timeZone = 'UTC';
        if( isset(\Auth::user()->time_zone ))
        {
            $timeZone = \Auth::user()->time_zone['timeZone'] ;
        }
        return \DateTime::createFromFormat("Y-m-d H:i:s",$dateTime,new \DateTimeZone('UTC'))->setTimezone(new \DateTimeZone($timeZone))->format($formatTo);
    }
}
