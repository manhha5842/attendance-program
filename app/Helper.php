<?php
if (!function_exists('checkAdmin')) {
    function checkAdmin(): bool
    {
        return session()->get('level') === 2;
    }
}
if (!function_exists('checkStudent')) {
    function checkStudent(): bool
    {
        return session()->get('level') === 0;
    }
}
if (!function_exists('checkLecturer')) {
    function checkLecturer(): bool
    {
        return session()->get('level') === 1;
    }
}

