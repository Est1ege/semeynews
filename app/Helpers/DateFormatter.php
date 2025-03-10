<?php
// app/Helpers/DateFormatter.php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class DateFormatter
{
    /**
     * Русские названия месяцев
     */
    protected static $russianMonths = [
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

    /**
     * Русские короткие названия месяцев
     */
    protected static $russianMonthsShort = [
        1 => 'янв',
        2 => 'фев',
        3 => 'мар',
        4 => 'апр',
        5 => 'мая',
        6 => 'июн',
        7 => 'июл',
        8 => 'авг',
        9 => 'сен',
        10 => 'окт',
        11 => 'ноя',
        12 => 'дек',
    ];

    /**
     * Казахские названия месяцев
     */
    protected static $kazakhMonths = [
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

    /**
     * Казахские короткие названия месяцев
     */
    protected static $kazakhMonthsShort = [
        1 => 'қаң',
        2 => 'ақп',
        3 => 'нау',
        4 => 'сәу',
        5 => 'мам',
        6 => 'мау',
        7 => 'шіл',
        8 => 'там',
        9 => 'қыр',
        10 => 'қаз',
        11 => 'қар',
        12 => 'жел',
    ];

    /**
     * Форматирует дату с учетом текущей локали
     * 
     * @param mixed $date Дата для форматирования (Carbon или строка)
     * @param string $format Формат для вывода (full, short, time)
     * @return string Отформатированная дата
     */
    public static function format($date, $format = 'full')
    {
        if (!$date instanceof Carbon) {
            $date = Carbon::parse($date);
        }

        $locale = App::getLocale();
        
        if ($format === 'time') {
            return $date->format('H:i');
        }
        
        if ($format === 'time_ago') {
            return self::timeAgo($date);
        }

        // Форматирование в зависимости от локали
        $day = $date->format('j');
        $month = $date->format('n');
        $year = $date->format('Y');

        // Выбор месяца на нужном языке
        if ($locale === 'ru') {
            $monthName = self::$russianMonths[$month];
        } elseif ($locale === 'kk') {
            $monthName = self::$kazakhMonths[$month];
        } else {
            // Английский или другие языки
            $monthName = $date->format('F');
        }

        // Собираем строку в зависимости от запрошенного формата
        if ($format === 'short') {
            return "$day $monthName";
        }
        
        return "$day $monthName $year";
    }

    /**
     * Возвращает строку "сколько времени назад"
     * 
     * @param Carbon $date Дата
     * @return string Локализованная строка 
     */
    public static function timeAgo($date)
    {
        if (!$date instanceof Carbon) {
            $date = Carbon::parse($date);
        }
        
        $locale = App::getLocale();
        $now = Carbon::now();
        $diff = $date->diff($now);
        
        // Определение времени
        if ($diff->y > 0) {
            $value = $diff->y;
            if ($locale === 'ru') {
                $unit = self::getRussianUnit($value, 'год', 'года', 'лет');
            } elseif ($locale === 'kk') {
                $unit = 'жыл бұрын';
            } else {
                $unit = $value === 1 ? 'year ago' : 'years ago';
            }
        } elseif ($diff->m > 0) {
            $value = $diff->m;
            if ($locale === 'ru') {
                $unit = self::getRussianUnit($value, 'месяц', 'месяца', 'месяцев');
            } elseif ($locale === 'kk') {
                $unit = 'ай бұрын';
            } else {
                $unit = $value === 1 ? 'month ago' : 'months ago';
            }
        } elseif ($diff->d > 0) {
            $value = $diff->d;
            if ($locale === 'ru') {
                $unit = self::getRussianUnit($value, 'день', 'дня', 'дней');
            } elseif ($locale === 'kk') {
                $unit = 'күн бұрын';
            } else {
                $unit = $value === 1 ? 'day ago' : 'days ago';
            }
        } elseif ($diff->h > 0) {
            $value = $diff->h;
            if ($locale === 'ru') {
                $unit = self::getRussianUnit($value, 'час', 'часа', 'часов');
            } elseif ($locale === 'kk') {
                $unit = 'сағат бұрын';
            } else {
                $unit = $value === 1 ? 'hour ago' : 'hours ago';
            }
        } elseif ($diff->i > 0) {
            $value = $diff->i;
            if ($locale === 'ru') {
                $unit = self::getRussianUnit($value, 'минуту', 'минуты', 'минут');
            } elseif ($locale === 'kk') {
                $unit = 'минут бұрын';
            } else {
                $unit = $value === 1 ? 'minute ago' : 'minutes ago';
            }
        } else {
            if ($locale === 'ru') {
                return 'только что';
            } elseif ($locale === 'kk') {
                return 'жаңа ғана';
            } else {
                return 'just now';
            }
        }
        
        return "$value $unit";
    }
    
    /**
     * Получить правильную форму слова в зависимости от числа
     */
    private static function getRussianUnit($number, $one, $few, $many)
    {
        if ($number % 10 == 1 && $number % 100 != 11) {
            return $one . ' назад';
        } elseif ($number % 10 >= 2 && $number % 10 <= 4 && ($number % 100 < 10 || $number % 100 >= 20)) {
            return $few . ' назад';
        } else {
            return $many . ' назад';
        }
    }
}