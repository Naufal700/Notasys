<?php

if (!function_exists('format_number')) {
    /**
     * Format angka dengan pemisah ribuan
     * 
     * @param mixed $number
     * @param int $decimals
     * @param string $decimalSeparator
     * @param string $thousandsSeparator
     * @param string $emptyPlaceholder
     * @return string
     */
    function format_number($number, $decimals = 0, $decimalSeparator = ',', $thousandsSeparator = '.', $emptyPlaceholder = '..........')
    {
        if (!isset($number)) {
            return $emptyPlaceholder;
        }

        if (!is_numeric($number)) {
            return $number;
        }

        return number_format((float)$number, $decimals, $decimalSeparator, $thousandsSeparator);
    }
}

if (!function_exists('format_currency')) {
    /**
     * Format mata uang Rupiah (IDR)
     * 
     * @param mixed $amount
     * @param bool $withSymbol
     * @param string $emptyPlaceholder
     * @return string
     */
    function format_currency($amount, $withSymbol = true, $emptyPlaceholder = '..........')
    {
        $formatted = format_number($amount, 0, ',', '.', $emptyPlaceholder);

        if ($formatted === $emptyPlaceholder) {
            return $emptyPlaceholder;
        }

        return $withSymbol ? 'Rp ' . $formatted : $formatted;
    }
}

if (!function_exists('format_roman')) {
    /**
     * Konversi angka ke angka Romawi
     * 
     * @param int $number
     * @return string
     */
    function format_roman($number)
    {
        if (!is_numeric($number) || $number < 1 || $number > 3999) {
            return (string)$number;
        }

        $map = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        ];

        $result = '';
        foreach ($map as $roman => $arabic) {
            while ($number >= $arabic) {
                $result .= $roman;
                $number -= $arabic;
            }
        }

        return $result;
    }
}

if (!function_exists('format_decimal')) {
    /**
     * Format angka desimal khusus untuk dokumen hukum
     * 
     * @param mixed $number
     * @param int $decimals
     * @param string $emptyPlaceholder
     * @return string
     */
    function format_decimal($number, $decimals = 2, $emptyPlaceholder = '..........')
    {
        if (!isset($number)) {
            return $emptyPlaceholder;
        }

        if (!is_numeric($number)) {
            return $number;
        }

        // Format khusus untuk dokumen hukum (gunakan koma sebagai desimal)
        return str_replace('.', ',', number_format((float)$number, $decimals, '.', ''));
    }
}

if (!function_exists('format_legal_number')) {
    /**
     * Format nomor dokumen hukum (contoh: 001/PPAT/2023)
     * 
     * @param mixed $number
     * @param string $prefix
     * @param string $suffix
     * @param int $digits
     * @param string $separator
     * @param string $emptyPlaceholder
     * @return string
     */
    function format_legal_number($number, $prefix = '', $suffix = '', $digits = 3, $separator = '/', $emptyPlaceholder = '..........')
    {
        if (!isset($number)) {
            return $emptyPlaceholder;
        }

        $numberPart = str_pad($number, $digits, '0', STR_PAD_LEFT);

        $parts = [];
        if (!empty($prefix)) $parts[] = $prefix;
        $parts[] = $numberPart;
        if (!empty($suffix)) $parts[] = $suffix;

        return implode($separator, $parts);
    }
}

if (!function_exists('parse_number')) {
    /**
     * Parse string angka ke format numerik
     * 
     * @param string $numberString
     * @return float|null
     */
    function parse_number($numberString)
    {
        if (empty($numberString)) {
            return null;
        }

        // Bersihkan karakter non-numerik kecuali desimal
        $cleaned = preg_replace('/[^0-9,-]/', '', $numberString);
        // Ganti koma dengan titik untuk float
        $cleaned = str_replace(',', '.', $cleaned);

        return is_numeric($cleaned) ? (float)$cleaned : null;
    }
}
