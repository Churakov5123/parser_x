<?php

namespace App\Controller;

use App\Helpers\Helpers;


/**
 * Class Home
 * @package App\Controller
 */
class Home
{
    /**
     * 2.1 Возращаем  список наших обьектов ввиде json и прокидываем по view,
     * там мы передадим уже в компонент вью  где распспарсим и сформируем вид  меню категорий
     * 2.2 обрезаем  до первого уровня вложенности  делаем и прокидавыем  во вью откуда поелтит в компонент
     */
    public function getIndex()
    {

        Helpers::test(); // тестовый запрос на получение и  масссива данных их страниц !!! но у меня вылетает ошибка

  //      Helpers::getDatetimeFromFarpostStr();   - не понял для чего нужна вообще
        // то что ниже лучше  использовать  на конечной команде  пример  файл cli.php  -> Command папка там есть команда оформленая

        //$exec_time = number_format(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 3);
       //echo "<hr>Время выполнения скрипта: $exec_time sec";


        return render('test');
    }


}
