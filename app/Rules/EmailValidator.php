<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;

class EmailValidator implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->status = "";
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
        if(!empty($value)){
            if(User::where('email', $value)->first()){
                if(User::where('email', $value)->where('evc', true)->first()){
                    return true;
                }else{
                    $this->status = 1;
                    return false;
                }
            }else{
                $this->status = 0;
                return false;
            }
        }else{
            $this->status = 0;
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if($this->status == 0){
            return 'Email and password not Found';
        }else{
            return "You haven't verified your email";
        }
        
    }
}
