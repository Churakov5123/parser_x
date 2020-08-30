<?php


namespace App\Helpers;



//use SimpleHtmlDom\simple_html_dom;
use function SimpleHtmlDom\file_get_html;


/**
 * Class helpers
 * @package App\Helpers
 */

class Helpers
{

    //
// Корректная обработка ссылок за 31.12.XXXX возможна,
// если шаблон вывода метки даты/времени на 01.01.ХХХХ имеет вид: (о чем будет известно в день 01.01.2021)
// - сегодня	(HH:MM, сегодня)
// - вчера		(HH:MM, вчера)
// - дата		(30 декабря YYYY)
//
    public static function test()
    {
        $page_num = 1;
        $rolls_on_page = 50;
        $profile_name = 'Dizzer';

        $keys_RU = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
        $keys_EN = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
//        simple_html_dom::class;
        do {
            $url = "https://www.farpost.ru/user/$profile_name/feedbacks?role=participant&page=$page_num";
            $html =file_get_html($url);


            // Находим все теги <TR>, соответсвующие отзывам от покупателей
            $date_arr = $html->find('tr.row td.date');
            $links_arr = $html->find('tr.row a.bulletinLink');
            $element_num = count($links_arr);
            //echo $links[1];
            foreach ($links_arr as $element) {
                $link_href = $element->href;
                $link_text = $element->plaintext;
                echo '<hr>' . $date_arr[0] . '<br><small><a href="' . $link_href . '" target="_blank">' . $link_text . '</a></small>';
            }
            $page_num++;
        } while ($element_num == $rolls_on_page);

    }


   public static function getDatetimeFromFarpostStr($farpostFormatStr)
    { // ex. '15:15, сегодня', '13:11, вчера', '22 декабря 2019'
        global $keys_RU;
        global $keys_EN;
        $farpostFormatStr = str_replace($keys_RU, $keys_EN, $farpostFormatStr);
        switch (mb_substr($farpostFormatStr, -1)) {
            case 'я':
                $timestamp = substr($farpostFormatStr, 0, 5);
                break;
            case 'а':
                $timestamp = substr($farpostFormatStr, 0, 5) . '-1 day';
                break;
            default:
                $timestamp = $farpostFormatStr;
                break;
        }
        return date('Y-m-d H:i:s', strtotime($timestamp));
    }



}