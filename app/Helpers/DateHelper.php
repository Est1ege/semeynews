<?php
// app/Helpers/DateHelper.php
namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class DateHelper
{
    /**
     * Форматирует дату в зависимости от текущего языка
     *
     * @param \Carbon\Carbon|string $date Дата для форматирования
     * @param string $format Желаемый формат (day_month, full, time, etc.)
     * @return string Отформатированная дата
     */
    public static function format($date, $format = 'full')
    {
        if (!$date instanceof Carbon) {
            $date = Carbon::parse($date);
        }
        
        $locale = App::getLocale();
        
        // Формат зависит от языка
        switch ($format) {
            case 'day_month':
                if ($locale === 'ru') {
                    return $date->format('j') . ' ' . self::getMonthName($date->format('n'), $locale);
                } elseif ($locale === 'kk') {
                    return $date->format('j') . ' ' . self::getMonthName($date->format('n'), $locale);
                }
                return $date->format('M j');
                
            case 'full':
                if ($locale === 'ru') {
                    return $date->format('j') . ' ' . self::getMonthName($date->format('n'), $locale) . ' ' . $date->format('Y');
                } elseif ($locale === 'kk') {
                    return $date->format('j') . ' ' . self::getMonthName($date->format('n'), $locale) . ' ' . $date->format('Y');
                }
                return $date->format('M j, Y');
                
            case 'time':
                return $date->format('H:i');
                
            case 'time_ago':
                return $date->diffForHumans();
                
            default:
                return $date->format($format);
        }
    }
    
    /**
     * Возвращает название месяца на нужном языке
     *
     * @param int $month Номер месяца (1-12)
     * @param string $locale Код языка
     * @return string Название месяца
     */
    public static function getMonthName($month, $locale = null)
    {
        if (!$locale) {
            $locale = App::getLocale();
        }
        
        if ($locale === 'ru') {
            $months = [
                1 => 'января',
                2 => 'февраля',
                3 => 'марта',
                4 => 'апреля',
                5 => 'мая',
                6 => 'июня',
                7 => 'июля',
                8 => 'августа',
                9 => 'сентября',
                10 => 'октября',
                11 => 'ноября',
                12 => 'декабря',
            ];
        } elseif ($locale === 'kk') {
            $months = [
                1 => 'қаңтар',
                2 => 'ақпан',
                3 => 'наурыз',
                4 => 'сәуір',
                5 => 'мамыр',
                6 => 'маусым',
                7 => 'шілде',
                8 => 'тамыз',
                9 => 'қыркүйек',
                10 => 'қазан',
                11 => 'қараша',
                12 => 'желтоқсан',
            ];
        } else {
            // Для английского и других языков используем Carbon
            $date = Carbon::createFromDate(null, $month, 1);
            return $date->format('F');
        }
        
        return $months[$month] ?? '';
    }
}