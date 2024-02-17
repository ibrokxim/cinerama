<?php

namespace App\Kernel\Validator;

class Validator implements ValidatorInterface
{
    // validate(['name' => 'test'], ["name"=>'required'])
    private array $errors = [];
    private array $data;

    public function validate(array $data, array $rules): bool
    {
        $this->errors = [];
        $this->data = $data;

        foreach ($rules as $key => $rule) {
            $rules = $rule;
            $rules = is_array($rules) ? $rules : array($rules);
            foreach ($rules as $rule) {
                // min:3
                $rule = explode(':', $rule);

                $ruleName = $rule[0];
                $ruleValue = $rule[1] ?? null;

                $error = $this->validateRule($key, $ruleName, $ruleValue);

                if ($error) {
                    $this->errors[$key][] = $error;
                }
            }
        }
        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }


    public function validateRule(string $key, string $ruleName, string $ruleValue = null): string|false
    {
        $value = $this->data[$key];

        switch ($ruleName) {
            case 'required':
                if (empty($value)) {
                    return "Поле $key обязательное!";
                }
                break;
            case 'min':
                if (strlen($value) < $ruleValue) {
                     return "Поле $key должно быть не меньше $ruleValue символов";
                }
                break;
            case 'max':
                if (strlen($value) > $ruleValue) {
                     return "Поле $key должно быть не больше $ruleValue символов";
                }
                break;
            case 'email':
                if (! filter_var($value, FILTER_VALIDATE_EMAIL)){
                    return "Поле $key должно быть типа email";
                }
                break;
            case 'confirmed':
                if (! $value !== $this->data["{$key}_confirmation"]){
                    return "Поле $key должно быть подтверждено";
                }
                break;
        }
        return false;
    }
}