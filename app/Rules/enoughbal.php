<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;


class enoughbal implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $id = auth()->user()->id;
        $bal = User::find($id)->accounts[0]['bal'];
        if ($value < $bal)
        {
        return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Your Balance is not sufficient for this transaction.';
    }
}
