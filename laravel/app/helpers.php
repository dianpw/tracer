<?php
    /**
 * Transform a date value into a Carbon object.
 *
 * @return \Carbon\Carbon|null
 */
function transformDate($value, $format = 'yyyy-my-dd')
{
    try {
        return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    } catch (\ErrorException $e) {
        return \Carbon\Carbon::createFromFormat($format, $value);
    } 
}