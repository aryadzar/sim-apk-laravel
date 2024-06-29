<?php

namespace App\Rules;

use Closure;
use App\Models\JadwalPerbaikan;
use Illuminate\Contracts\Validation\ValidationRule;

class StatusPesawat implements ValidationRule
{
    /**
     * Indicates whether the rule should be implicit.
     *
     * @var bool
     */
    public $implicit = true;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    protected $currentId;

    public function __construct($currentId = null)
    {
        $this->currentId = $currentId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $query = JadwalPerbaikan::where('id_pesawat', $value)
            ->whereIn('status', ['Belum Diperbaiki', 'Sedang Diperbaiki']);

        // Kecualikan pesawat yang sedang diedit
        if ($this->currentId) {
            $query->where('id', '!=', $this->currentId);
        }

        if ($query->exists()) {
            $fail("Pesawat tersebut sedang atau belum diperbaiki.");
        }
    }
}
