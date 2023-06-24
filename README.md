# cot_pagecount
Simple plugin used to selectively count pages on website

## Использование:

```html
{PHP|cot_pagecount($condition = '', $mode = '', $cats = '', $subs = true, $decl = 'pages')}
```

Назначение параметров (в скобках значение по умолчанию -- если не указано пользователем):
* $condition -- условие в формате SQL;
* $mode -- режим выбора раздела для подсчета;
* $cats -- собственно, перечень разделов
* $subs (TRUE) -- параметр учета вложенных подразделов;
* $decl (pages) -- имя lang-переменной для использования функции cot_declension

Установка плагина стандартная, для работы требуется наличие установленного модуля Page и плагина Pagelist
