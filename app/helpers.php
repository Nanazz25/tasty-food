<?php

use Illuminate\Support\Facades\Auth;

function allowedRoles($fitur)
{
    $user = Auth::user(); // ambil user yang sedang login

    if (!$user) return false; // kalau belum login, tidak boleh akses

    if ($user->is_superadmin) return true; // kalau dia superadmin, boleh akses semua fitur

    return $user->role && $user->role->$fitur; // jika user punya role, dan role itu mengizinkan fitur (true), maka boleh
}
