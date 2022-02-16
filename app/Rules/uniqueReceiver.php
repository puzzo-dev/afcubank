<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\r_account;

class uniqueReceiver implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $id = auth()->user()->accounts[0]->id;
        $rec = r_account::Firstwhere(['r_acc_no' => $value, 'account_id' => $id]);
        if($rec == NULL){
            //dd($rec);
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
        return 'This Beneficiary is already added to your account';
    }
}
