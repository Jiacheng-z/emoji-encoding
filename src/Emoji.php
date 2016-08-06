<?php

namespace Emoji;

/**
 * Class Emoji
 * @package Emoji
 *
 * Emoji编码过滤类
 * 主要用于对emoji表情的编码和过滤,使其能存储进mysql种设置为utf8而非utf8mb4类型的字段中
 *
 * 注: 只编码utf8长度大于4的字符,由于中文只占3个,所以不会编码中文
 */
Class Emoji
{

    /**
     * @param string $str
     * @param bool $filter 是否需要过滤掉emoji表情
     * @return string
     */
    public static function Encode($str, $filter = false)
    {
        $len = mb_strlen($str);
        $result = "";

        for ($i = 0; $i < $len; $i++) {
            $word = mb_substr($str, $i, 1);
            if (strlen($word) > 3) {
                if ($filter == false) {
                    $word = mb_substr(json_encode($word), 1, -1);
                } else {
                    $word = "";
                }
            }
            $result .= $word;
        }

        return $result;
    }

    /**
     * @param string $str
     * @return mixed
     */
    public static function Decode($str)
    {
        return preg_replace_callback('/(\\\u[0-9a-f]{4})+/', array('self', "decodeEmoji"), $str);
    }

    /**
     * @param string $text
     * @return mixed|string
     */
    private static function decodeEmoji($text)
    {
        if (!$text) {
            return '';
        }
        $text = $text[0];
        $decode = json_decode($text, true);
        if ($decode) {
            return $decode;
        }
        $text = '["' . $text . '"]';
        $decode = json_decode($text);
        if (count($decode) == 1) {
            return $decode[0];
        }
        return $text;
    }
}