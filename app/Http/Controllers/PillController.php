<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pill;

class PillController extends Controller
{
    // Get all Pills
    public function get(): array {
        $pills = Pill::all()->toArray();
        return $pills;
    }

    public function patients($pillId) {        
        $patients = Pill::find($pillId)->patients()->get();
        return $patients;
    }
}
