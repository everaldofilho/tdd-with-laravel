<?php

namespace App\Support;

class Alies
{
    /**
     * @param null|string $full_name
     * @return null|string
     */
    public static function transforme(?string $full_name): ?string
    {
        return ucwords(self::getCompoundName($full_name));
    }

    /**
     * @param null|string $full_name
     * @return null|string
     */
    public static function firstName(?string  $full_name): ?string
    {
        $first_name = ucwords(trim($full_name));
        if (stristr($first_name, ' ')) {
            return stristr($first_name, ' ', true);
        }
        return $first_name;
    }

    /**
     * @param null|string $full_name
     * @return null|string
     */
    public static function getCompoundName(?string  $full_name): ?string
    {
        $full_name = trim($full_name);
        $first_name = self::firstName($full_name);
        $start_langth = strlen($first_name);
        $compound_name = ucwords(self::firstName(substr($full_name, $start_langth)));
        if (!in_array($compound_name, self::compoundNames())) {
            return $first_name;
        }
        return trim("{$first_name} {$compound_name}");
    }
    /**
     * @return array
     */
    private static function compoundNames(): array
    {
        $names = [
            'eduarda',
            'hugo',
            'clara',
            'gabriel',
            'vitoria',
        ];
        return self::ucwords($names);
    }

    /**
     * @return array
     */
    private static function ucwords(array $array): array
    {
        foreach ($array as $key => $value) {
            $array[$key] = ucwords($value);
        }
        return $array;
    }
}
