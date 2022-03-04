<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pill;
use Illuminate\Support\Collection;

class PillController extends Controller
{
    // Get all Pills
    public function get(): Collection
    {
        $pills = Pill::all();
        return $pills;
    }

    public function patients($pillId)
    {
        $patients = Pill::find($pillId)->patients()->get();
        return $patients;
    }
}
