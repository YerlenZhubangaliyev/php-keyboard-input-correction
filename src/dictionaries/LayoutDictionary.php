<?php
/**
 * Created by IntelliJ IDEA.
 * User: Алексей
 * Date: 03.12.2018
 * Time: 19:20
 */

namespace KeyboardInputCorrection\dictionaries;

/**
 * Class Dictionary
 * All languages matrixes should be written here
 * @package KeyboardInputCorrection\dictionaries
 */
class LayoutDictionary
{

    /**
     * @return string[]
     */
    public static function en_ru(): array {
        return [
            'q' => 'й',
            'w' => 'ц',
            'e' => 'у',
            'r' => 'к',
            't' => 'е',
            'y' => 'н',
            'u' => 'г',
            'i' => 'ш',
            'o' => 'щ',
            'p' => 'з',
            '[' => 'х',
            ']' => 'ъ',
            'a' => 'ф',
            's' => 'ы',
            'd' => 'в',
            'f' => 'а',
            'g' => 'п',
            'h' => 'р',
            'j' => 'о',
            'k' => 'л',
            'l' => 'д',
            ';' => 'ж',
            '\'' => 'э',
            'z' => 'я',
            'x' => 'ч',
            'c' => 'с',
            'v' => 'м',
            'b' => 'и',
            'n' => 'т',
            'm' => 'ь',
            ',' => 'б',
            '.' => 'ю',
            '/' => '.',
            '`' => 'ё',
            '~' => 'Ё',
            '@' => '"',
            '#' => '№',
            '$' => ';',
            '^' => ':',
            '&' => '?',
            '|' => '/',
            ':' => 'Ж',
            '"' => 'Э',
            '<' => 'Б',
            '>' => 'Ю',
            '?' => ',',
        ];
    }

    /**
     * @return string[]
     */
    public static function en_kk(): array {
        return [
            'q' => 'й',
            'w' => 'ц',
            'e' => 'у',
            'r' => 'к',
            't' => 'е',
            'y' => 'н',
            'u' => 'г',
            'i' => 'ш',
            'o' => 'щ',
            'p' => 'з',
            '[' => 'х',
            ']' => 'ъ',
            'a' => 'ф',
            's' => 'ы',
            'd' => 'в',
            'f' => 'а',
            'g' => 'п',
            'h' => 'р',
            'j' => 'о',
            'k' => 'л',
            'l' => 'д',
            ';' => 'ж',
            '\'' => 'э',
            'z' => 'я',
            'x' => 'ч',
            'c' => 'с',
            'v' => 'м',
            'b' => 'и',
            'n' => 'т',
            'm' => 'ь',
            ',' => 'б',
            '.' => 'ю',
            '/' => '№',
            '`' => 'ё',
            '~' => 'Ё',
            '@' => 'Ә',
            '#' => 'І',
            '$' => 'Ң',
            '%' => 'Ғ',
            '*' => 'Ү',
            '(' => 'Ұ',
            ')' => 'Қ',
            '_' => 'Ө',
            '+' => 'Һ',
            '^' => ':',
            '&' => '?',
            '|' => '/',
            ':' => 'Ж',
            '"' => 'Э',
            '<' => 'Б',
            '>' => 'Ю',
            '?' => ',',
            '2' => 'ә',
            '3' => 'і',
            '4' => 'ң',
            '5' => 'ғ',
            '8' => 'ү',
            '9' => 'ұ',
            '0' => 'қ',
            '-' => 'ө',
            '=' => 'һ',
        ];
    }

    /**
     * @return array
     */
    public static function ru_en(): array
    {
        return array_flip(self::ru_en());
    }
}
