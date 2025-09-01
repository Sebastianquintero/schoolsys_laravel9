<?php

use Carbon\Carbon;

if (! function_exists('school_year')) {
    function school_year(string|Carbon|null $date = null, ?int $startMonth = null): string
    {
        $date = $date ? Carbon::parse($date) : now();
        $startMonth = $startMonth ?? config('school.start_month', 1);

        $startYear = $date->month >= $startMonth ? $date->year : $date->year - 1;

        return sprintf('%d-%d', $startYear, $startYear + 1);
    }
}

if (! function_exists('school_year_next')) {
    function school_year_next(string $year): string
    {
        [$a, $b] = explode('-', $year);
        return ($a + 1) . '-' . ($b + 1);
    }
}

if (! function_exists('school_year_prev')) {
    function school_year_prev(string $year): string
    {
        [$a, $b] = explode('-', $year);
        return ($a - 1) . '-' . ($b - 1);
    }
}

if (! function_exists('school_year_bounds')) {
    function school_year_bounds(string $year, ?int $startMonth = null): array
    {
        $startMonth = $startMonth ?? config('school.start_month', 1);
        [$a, $b] = explode('-', $year);

        $inicio = Carbon::create((int)$a, $startMonth, 1)->startOfDay();
        $fin    = Carbon::create((int)$a + 1, $startMonth, 1)->subDay()->endOfDay();

        return [$inicio, $fin];
    }
}

if (! function_exists('school_year_contains')) {
    function school_year_contains(string|Carbon $date, string $year): bool
    {
        $date = $date instanceof Carbon ? $date : Carbon::parse($date);
        [$inicio, $fin] = school_year_bounds($year);
        return $date->betweenIncluded($inicio, $fin);
    }
}