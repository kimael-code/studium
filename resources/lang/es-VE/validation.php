<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El campo :attribute debe ser aceptado.',
    'active_url' => 'El campo :attribute no es una URL válida.',
    'after' => 'El campo :attribute must be a date after :date.',
    'after_or_equal' => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El campo :attribute must only contain letters.',
    'alpha_dash' => 'El campo :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'El campo :attribute must only contain letters and numbers.',
    'array' => 'El campo :attribute must be an array.',
    'before' => 'El campo :attribute must be a date before :date.',
    'before_or_equal' => 'El campo :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'El campo :attribute must be between :min and :max.',
        'file' => 'El campo :attribute must be between :min and :max kilobytes.',
        'string' => 'El campo :attribute must be between :min and :max characters.',
        'array' => 'El campo :attribute must have between :min and :max items.',
    ],
    'boolean' => 'El campo :attribute field must be true or false.',
    'confirmed' => 'El campo :attribute confirmation does not match.',
    'date' => 'El campo :attribute is not a valid date.',
    'date_equals' => 'El campo :attribute must be a date equal to :date.',
    'date_format' => 'El campo :attribute does not match the format :format.',
    'different' => 'El campo :attribute and :other must be different.',
    'digits' => 'El campo :attribute must be :digits digits.',
    'digits_between' => 'El campo :attribute must be between :min and :max digits.',
    'dimensions' => 'El campo :attribute has invalid image dimensions.',
    'distinct' => 'El campo :attribute field has a duplicate value.',
    'email' => 'El campo :attribute must be a valid email address.',
    'ends_with' => 'El campo :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'El campo :attribute must be a file.',
    'filled' => 'El campo :attribute field must have a value.',
    'gt' => [
        'numeric' => 'El campo :attribute must be greater than :value.',
        'file' => 'El campo :attribute must be greater than :value kilobytes.',
        'string' => 'El campo :attribute must be greater than :value characters.',
        'array' => 'El campo :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'El campo :attribute must be greater than or equal :value.',
        'file' => 'El campo :attribute must be greater than or equal :value kilobytes.',
        'string' => 'El campo :attribute must be greater than or equal :value characters.',
        'array' => 'El campo :attribute must have :value items or more.',
    ],
    'image' => 'El campo :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'El campo :attribute field does not exist in :other.',
    'integer' => 'El campo :attribute must be an integer.',
    'ip' => 'El campo :attribute must be a valid IP address.',
    'ipv4' => 'El campo :attribute must be a valid IPv4 address.',
    'ipv6' => 'El campo :attribute must be a valid IPv6 address.',
    'json' => 'El campo :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'El campo :attribute must be less than :value.',
        'file' => 'El campo :attribute must be less than :value kilobytes.',
        'string' => 'El campo :attribute must be less than :value characters.',
        'array' => 'El campo :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'El campo :attribute must be less than or equal :value.',
        'file' => 'El campo :attribute must be less than or equal :value kilobytes.',
        'string' => 'El campo :attribute must be less than or equal :value characters.',
        'array' => 'El campo :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'El campo :attribute must not be greater than :max.',
        'file' => 'El campo :attribute must not be greater than :max kilobytes.',
        'string' => 'El campo :attribute must not be greater than :max characters.',
        'array' => 'El campo :attribute must not have more than :max items.',
    ],
    'mimes' => 'El campo :attribute must be a file of type: :values.',
    'mimetypes' => 'El campo :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'El campo :attribute must be at least :min.',
        'file' => 'El campo :attribute must be at least :min kilobytes.',
        'string' => 'El campo :attribute must be at least :min characters.',
        'array' => 'El campo :attribute must have at least :min items.',
    ],
    'multiple_of' => 'El campo :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'El campo :attribute format is invalid.',
    'numeric' => 'El campo :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'El campo :attribute field must be present.',
    'regex' => 'El campo :attribute format is invalid.',
    'required' => 'El campo :attribute field is required.',
    'required_if' => 'El campo :attribute field is required when :other is :value.',
    'required_unless' => 'El campo :attribute field is required unless :other is in :values.',
    'required_with' => 'El campo :attribute field is required when :values is present.',
    'required_with_all' => 'El campo :attribute field is required when :values are present.',
    'required_without' => 'El campo :attribute field is required when :values is not present.',
    'required_without_all' => 'El campo :attribute field is required when none of :values are present.',
    'prohibited' => 'El campo :attribute field is prohibited.',
    'prohibited_if' => 'El campo :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'El campo :attribute field is prohibited unless :other is in :values.',
    'same' => 'El campo :attribute and :other must match.',
    'size' => [
        'numeric' => 'El campo :attribute must be :size.',
        'file' => 'El campo :attribute must be :size kilobytes.',
        'string' => 'El campo :attribute must be :size characters.',
        'array' => 'El campo :attribute must contain :size items.',
    ],
    'starts_with' => 'El campo :attribute must start with one of the following: :values.',
    'string' => 'El campo :attribute must be a string.',
    'timezone' => 'El campo :attribute must be a valid zone.',
    'unique' => 'El campo :attribute has already been taken.',
    'uploaded' => 'El campo :attribute failed to upload.',
    'url' => 'El campo :attribute format is invalid.',
    'uuid' => 'El campo :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
