<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

function toCarbon(string $time, string $format = 'Y-m-d H:i:s'): Carbon\Carbon
{
    return Morilog\Jalali\Jalalian::fromFormat($format, $time)->toCarbon();
}

function jFormat(string $time, string $format = '%Y-%m-%d H:i:s'): string
{
    return jdate($time)->format($format);
}

function toMB(int $file_size, $concatWithMB = true): string
{
    $file_size = number_format($file_size / 1048576, 2);

    $file_size .= $concatWithMB
        ? ' MB'
        : '';

    return $file_size;
}

function mimes(string $expected, string $actually): bool
{
    $expected = explode(',', $expected);

    return in_array($actually, $expected);
}

function getDatatableArrayFor(
    string $data,
    bool $orderable,
    bool $searchable,
    ?string $name = null,
    ?string $searchValue = null,
    string $searchRegex = "false"
): array {
    return [
        "data" => $data,
        "name" => $name,
        "searchable" => $searchable,
        "orderable" => $orderable,
        "search" => [
            "value" => $searchValue,
            "regex" => $searchRegex,
        ]
    ];
}

function faTOen(string $string)
{
    return strtr($string, array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9', '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9', '٫' => '.', ',' => '.'));
}

function enToFa(string $string)
{
    return strtr($string, array('0' => '۰', '1' => '۱', '2' => '۲', '3' => '۳', '4' => '۴', '5' => '۵', '6' => '۶', '7' => '۷', '8' => '۸', '9' => '۹', '.' => '٫', ',' => '٫'));
}

/**
 * Converts to persian price style.
 *
 * @param string|int|null $price
 * @return string
 */
function fa_price(string|int|null $price): ?string
{
    return $price ? strtr(enToFa(number_format($price, 0)), ['٫' => ',']) : $price;
}

function is_json(string $string)
{
    json_decode($string);
    return json_last_error() === JSON_ERROR_NONE;
}

/**
 * Set an item on an array or object using dot notation and is compatible with closure.
 *
 * @param  mixed  $target
 * @param  string|array  $key
 * @param  mixed  $value
 * @param  bool  $overwrite
 * @return mixed
 */
function data_set_closure(mixed &$target, string|array $key, mixed $value, bool $overwrite = true): mixed
{
    $segments = is_array($key) ? $key : explode('.', $key);

    if (($segment = array_shift($segments)) === '*') {
        if (!Arr::accessible($target)) {
            $target = [];
        }

        if ($segments) {
            foreach ($target as &$inner) {
                data_set_closure($inner, $segments, $value, $overwrite);
            }
        } elseif ($overwrite) {
            foreach ($target as &$inner) {
                $inner = $value;
            }
        }
    } elseif (Arr::accessible($target)) {
        if ($segments) {
            if (!Arr::exists($target, $segment)) {
                $target[$segment] = [];
            }

            data_set_closure($target[$segment], $segments, $value, $overwrite);
        } elseif ($overwrite || !Arr::exists($target, $segment)) {
            if ($value instanceof \Closure) {
                $target[$segment] = $value($target[$segment]);
            } else {
                $target[$segment] = $value;
            }
        }
    } elseif (is_object($target)) {
        if ($segments) {
            if (!isset($target->{$segment})) {
                $target->{$segment} = [];
            }

            data_set_closure($target->{$segment}, $segments, $value, $overwrite);
        } elseif ($overwrite || !isset($target->{$segment})) {
            if ($value instanceof \Closure) {
                $target->{$segment} = $value($target->{$segment});
            } else {
                $target->{$segment} = $value;
            }
        }
    } else {
        $target = [];

        if ($segments) {
            data_set_closure($target[$segment], $segments, $value, $overwrite);
        } elseif ($overwrite) {
            if ($value instanceof \Closure) {
                $target[$segment] = $value($target[$segment]);
            } else {
                $target[$segment] = $value;
            }
        }
    }

    return $target;
}

/**
 * Limit the number of characters in a string.
 *
 * @param  string  $value
 * @param  int  $limit
 * @param  string  $end
 * @return string
 */
function strlimit(string $value, int $limit = 100, string $end = '...'): string
{
    return Str::limit($value, $limit, $end);
}
