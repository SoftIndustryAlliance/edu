<?php

namespace Algo\PatternSearch;

interface PatternSearchInterface
{
    public static function search(string $text, string $pattern): array;
}
