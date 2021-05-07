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

    'accepted'        => 'El campo :attribute debe ser aceptado.',
    'active_url'      => 'El campo :attribute no es una URL válida.',
    'after'           => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal'  => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha'           => 'El campo :attribute debe contener solamente letras.',
    'alpha_dash'      => 'El campo :attribute debe contener solamente letras, números, guiones y guiones bajos.',
    'alpha_num'       => 'El campo :attribute debe contener solamente letras y números.',
    'array'           => 'El campo :attribute debe ser un arreglo.',
    'before'          => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'numeric' => 'El valor de :attribute debe estar entre :min y :max.',
        'file'    => 'El valor de :attribute debe estar entre :min y :max kilobytes.',
        'string'  => 'El valor de :attribute debe estar entre :min y :max caracteres.',
        'array'   => 'El valor de :attribute debe tener entre :min y :max elementos.',
    ],
    'boolean'        => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'      => 'El campo de confimación :attribute no coincide.',
    'date'           => 'El campo :attribute no es una fecha válida.',
    'date_equals'    => 'El campo :attribute debeser una fecha igual a :date.',
    'date_format'    => 'El campo :attribute no cumple con el formato :format.',
    'different'      => 'Los campos :attribute y :other deben ser diferentes.',
    'digits'         => 'El campo :attribute debe contener :digits números.',
    'digits_between' => 'El campo :attribute debe estar entre :min y :max números.',
    'dimensions'     => 'El tamaño de la imagen en el campo :attribute es inválido.',
    'distinct'       => 'El campo :attribute contiene un valor duplicado.',
    'email'          => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
    'ends_with'      => 'El campo :attribute debe terminar con uno de los siguientes valores: :values.',
    'exists'         => 'El campo seleccionado :attribute es inválido.',
    'file'           => 'El campo :attribute debe ser un archivo.',
    'filled'         => 'El campo :attribute debe tener algún valor.',
    'gt' => [
        'numeric' => 'El valor del campo :attribute debe ser mayor a :value.',
        'file'    => 'El tamaño del archivo del campo :attribute debe ser mayor a :value kilobytes.',
        'string'  => 'El texto del campo :attribute debe contener más de :value caracteres.',
        'array'   => 'El arreglo del campo :attribute debe contener más de :value elementos.',
    ],
    'gte' => [
        'numeric' => 'El valor del campo :attribute debe ser mayor o igual a :value.',
        'file'    => 'El tamaño del archivo del campo :attribute debe ser mayor o igual a :value kilobytes.',
        'string'  => 'El texto del campo :attribute debe contener :value o más caracteres.',
        'array'   => 'El arreglo del campo :attribute debe contener :value o más elementos.',
    ],
    'image'    => 'El campo :attribute debe ser una imagen.',
    'in'       => 'El campo seleccionado :attribute es inválido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer'  => 'El campo :attribute debe ser un número entero.',
    'ip'       => 'El campo :attribute debe ser una dirección IP válida.',
    'ipv4'     => 'El campo :attribute debe ser una dirección IPv4 válida.',
    'ipv6'     => 'El campo :attribute debe ser una dirección IPv6 válida.',
    'json'     => 'El campo :attribute debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El valor del campo :attribute debe ser menor a :value.',
        'file'    => 'El tamaño del archivo del campo :attribute debe ser menor a :value kilobytes.',
        'string'  => 'El texto del campo :attribute debe contener menos de :value caracteres.',
        'array'   => 'El arreglo del campo :attribute debe contener menos de :value elementos.',
    ],
    'lte' => [
        'numeric' => 'El valor del campo :attribute debe ser menor o igual a :value.',
        'file'    => 'El tamaño del archivo del campo :attribute debe ser menor o igual a :value kilobytes.',
        'string'  => 'El texto del campo :attribute debe contener una cantidad menor o igual a :value caracteres.',
        'array'   => 'El arreglo del campo :attribute no debe tener más de :value elementos.',
    ],
    'max' => [
        'numeric' => 'El valor del campo :attribute no debe ser mayor a :max.',
        'file'    => 'El tamaño del archivo del campo :attribute no debe ser mayor a :max kilobytes.',
        'string'  => 'El texto del campo :attribute no debe contener más de :max characters.',
        'array'   => 'El arreglo del campo :attribute no debe contener más de :max elementos.',
    ],
    'mimes'     => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El valor del campo :attribute debe ser como mínimo :min.',
        'file'    => 'El tamaño del archivo del campo :attribute debe ser como mínimo :min kilobytes.',
        'string'  => 'El texto del campo :attribute debe contener como mínimo :min characters.',
        'array'   => 'El arreglo del campo :attribute debe contener como mínimo :min elementos.',
    ],
    'multiple_of'          => 'El valor del campo :attribute debe ser un múltiplo de :value.',
    'not_in'               => 'El campo seleccionado :attribute es inválido.',
    'not_regex'            => 'El fomato del campo :attribute es inválido.',
    'numeric'              => 'El valor del campo :attribute debe ser un número.',
    'password'             => 'La contraseña es incorrecta.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato del campo :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values están presentes.',
    'prohibited'           => 'El campo :attribute está prohibido.',
    'prohibited_if'        => 'El campo :attribute está prohibido cuando :other es :value.',
    'prohibited_unless'    => 'El campo :attribute está prohibido a menos que :other esté en :values.',
    'same'                 => 'Los campos :attribute and :other deben coincidir.',
    'size' => [
        'numeric' => 'El valor del campo :attribute debe ser :size.',
        'file'    => 'El tamaño del archivo del campo :attribute debe ser de :size kilobytes.',
        'string'  => 'El texto del campo :attribute debe ser de :size characters.',
        'array'   => 'El arreglo del campo :attribute debe contener :size elementos.',
    ],
    'starts_with' => 'El valor del campo :attribute debe comenzar con uno de los siguientes: :values.',
    'string'      => 'El valor del campo :attribute debe ser texto.',
    'timezone'    => 'El valor del campo :attribute debe ser una zona horaria válida.',
    'unique'      => 'El valor del campo :attribute ya existe.',
    'uploaded'    => 'Falló la subida en el campo :attribute.',
    'url'         => 'El formato del campo :attribute es inválido.',
    'uuid'        => 'El valor del campo :attribute debe ser un UUID válido.',

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
