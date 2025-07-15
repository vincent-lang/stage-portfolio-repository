<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use App\Models\Batch;

// defines the class
class calculateCodes {

    protected $result;

    function __construct(int $amount) {
        $calculation = (Auth::user()->userSubscription->maximum_codes - Auth::user()->userSubscription->codes_generated) - (Batch::sum('total_codes_to_generate') - Batch::sum('generated_codes_amount'));
        if($amount <= $calculation) {
            $this->result = $calculation;
        } else {
            $this->result = false;
        }
    }

    function getResult() {
        return $this->result;
    }

}