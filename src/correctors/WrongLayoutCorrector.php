<?php
/**
 * Created by IntelliJ IDEA.
 * User: Алексей
 * Date: 03.12.2018
 * Time: 15:02
 */

namespace KeyboardInputCorrection\correctors;

use KeyboardInputCorrection\Corrector;
use KeyboardInputCorrection\dictionaries\Dictionary;
use KeyboardInputCorrection\dictionaries\LayoutDictionary;
use KeyboardInputCorrection\exceptions\CorrectorException;

class WrongLayoutCorrector extends Corrector
{

    /**
     * @param string $input
     * @param int $targetLanguage
     * @param string $encode
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function validate(
        string $input,
        int $targetLanguage = self::LANGUAGE_RU,
        string $encode = self::DEFAULT_ENCODE
    ): bool {
        if ($encode !== self::DEFAULT_ENCODE && !$this->isEncodeSupported($encode)) {
            throw new \InvalidArgumentException($encode . ' unknown');
        }

        mb_regex_encoding($encode);

        switch ($targetLanguage) {
            case self::LANGUAGE_RU:
                return mb_ereg_match(
                    '([а-яА-Я@.$+\-*!#%\^&()=<>\?]+)',
                    $this->prepare($input, $encode)
                );
            case self::LANGUAGE_KK:
                return mb_ereg_match(
                    '([а-яА-ЯәӘғҒқҚңҢөӨұҰүҮһҺіІ@.$+_\-*!#%\^&()=<>\?]+)',
                    $this->prepare($input, $encode)
                );
            case self::LANGUAGE_EN:
                return mb_ereg_match(
                    '([a-zA-Z@.$+\-*!#%\^&()=<>\?]+)',
                    $this->prepare($input, $encode)
                );
        }

        return false;
    }

    /**
     * @param string $input
     * @param int $targetLanguage
     * @param string $encode
     * @return string
     * @throws \KeyboardInputCorrection\exceptions\UnsupportedSymbolException
     * @throws \InvalidArgumentException
     * @throws CorrectorException
     */
    public function correct(
        string $input,
        int $fromLanguage = self::LANGUAGE_EN,
        int $targetLanguage = self::LANGUAGE_RU,
        string $encode = self::DEFAULT_ENCODE
    ): string {
        if ($encode !== self::DEFAULT_ENCODE && !$this->isEncodeSupported($encode)) {
            throw new \InvalidArgumentException($encode . ' unknown');
        }

        if (!$this->validate($input, $targetLanguage)) {
            $table = $this->getConversionTable($fromLanguage, $targetLanguage);
            $input = $this->prepare($input, $encode);
            $size = mb_strlen($input, $encode);
            $result = '';

            for ($i = 0; $i < $size; $i++) {
                $char = mb_convert_case(
                    mb_substr($input, $i, 1, $encode),
                    MB_CASE_LOWER,
                    $encode
                );

                if (strlen($char) > 0) {
                    $result .= $this->processChar($table, $char);
                }
            }

            return $this->finish($result, $encode, $encode);
        }

        return $input;
    }

    /**
     * @param int $fromLanguage
     * @param int $toLanguage
     * @return array
     */
    protected function getConversionTable(int $fromLanguage, int $toLanguage): array
    {
        switch ($fromLanguage) {
            case self::LANGUAGE_EN:
                switch ($toLanguage) {
                    case self::LANGUAGE_RU:
                        return LayoutDictionary::en_ru();
                    case self::LANGUAGE_KK:
                        return LayoutDictionary::en_kk();
                }
                break;
            case self::LANGUAGE_RU:
                switch ($toLanguage) {
                    case self::LANGUAGE_EN:
                        return LayoutDictionary::ru_en();
                }
                break;
        }

        return [];
    }
}
