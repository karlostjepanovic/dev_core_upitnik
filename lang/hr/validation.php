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

    'accepted'             => 'Polje :attribute mora biti prihvaćeno.',
    'accepted_if'          => 'The :attribute must be accepted when :other is :value.',
    'active_url'           => 'Polje :attribute nije ispravan URL.',
    'after'                => 'Polje :attribute mora biti datum nakon :date.',
    'after_or_equal'       => 'Polje :attribute mora biti datum veći ili jednak :date.',
    'alpha'                => 'Polje :attribute smije sadržavati samo slova.',
    'alpha_dash'           => 'Polje :attribute smije sadržavati samo slova, brojeve i crtice.',
    'alpha_num'            => 'Polje :attribute smije sadržavati samo slova i brojeve.',
    'array'                => 'Polje :attribute mora biti niz.',
    'attached'             => 'Ovaj :attribute je već priključen.',
    'before'               => 'Polje :attribute mora biti datum prije :date.',
    'before_or_equal'      => 'Polje :attribute mora biti datum manji ili jednak :date.',
    'between'              => [
        'array'   => 'Polje :attribute mora imati između :min - :max stavki.',
        'file'    => 'Polje :attribute mora biti između :min - :max kilobajta.',
        'numeric' => 'Polje :attribute mora biti između :min - :max.',
        'string'  => 'Polje :attribute mora biti između :min - :max znakova.',
    ],
    'boolean'              => 'Polje :attribute mora biti false ili true.',
    'confirmed'            => 'Potvrda polja :attribute se ne podudara.',
    'current_password'     => 'Trenutna lozinka je netočna.',
    'date'                 => 'Polje :attribute nije ispravan datum.',
    'date_equals'          => 'Stavka :attribute mora biti jednaka :date.',
    'date_format'          => 'Polje :attribute ne podudara s formatom :format.',
    'different'            => 'Polja :attribute i :other moraju biti različita.',
    'digits'               => 'Polje :attribute mora sadržavati :digits znamenki.',
    'digits_between'       => 'Polje :attribute mora imati između :min i :max znamenki.',
    'dimensions'           => 'Polje :attribute ima neispravne dimenzije slike.',
    'distinct'             => 'Polje :attribute ima dupliciranu vrijednost.',
    'email'                => 'Polje :attribute mora biti ispravna e-mail adresa.',
    'ends_with'            => ':attribute bi trebao završiti s jednim od sljedećih: :values.',
    'exists'               => 'Odabrano polje :attribute nije ispravno.',
    'file'                 => 'Polje :attribute mora biti datoteka.',
    'filled'               => 'Polje :attribute je obavezno.',
    'gt'                   => [
        'array'   => 'Polje :attribute mora biti veće od :value stavki.',
        'file'    => 'Polje :attribute mora biti veće od :value kilobajta.',
        'numeric' => 'Polje :attribute mora biti veće od :value.',
        'string'  => 'Polje :attribute mora biti veće od :value karaktera.',
    ],
    'gte'                  => [
        'array'   => 'Polje :attribute mora imati :value stavki ili više.',
        'file'    => 'Polje :attribute mora biti veće ili jednako :value kilobajta.',
        'numeric' => 'Polje :attribute mora biti veće ili jednako :value.',
        'string'  => 'Polje :attribute mora biti veće ili jednako :value znakova.',
    ],
    'image'                => 'Polje :attribute mora biti slika.',
    'in'                   => 'Odabrano polje :attribute nije ispravno.',
    'in_array'             => 'Polje :attribute ne postoji u :other.',
    'integer'              => 'Polje :attribute mora biti broj.',
    'ip'                   => 'Polje :attribute mora biti ispravna IP adresa.',
    'ipv4'                 => 'Polje :attribute mora biti ispravna IPv4 adresa.',
    'ipv6'                 => 'Polje :attribute mora biti ispravna IPv6 adresa.',
    'json'                 => 'Polje :attribute mora biti ispravan JSON string.',
    'lt'                   => [
        'array'   => 'Polje :attribute mora biti manje od :value stavki.',
        'file'    => 'Polje :attribute mora biti manje od :value kilobajta.',
        'numeric' => 'Polje :attribute mora biti manje od :value.',
        'string'  => 'Polje :attribute mora biti manje od :value znakova.',
    ],
    'lte'                  => [
        'array'   => 'Polje :attribute ne smije imati više od :value stavki.',
        'file'    => 'Polje :attribute mora biti manje ili jednako :value kilobajta.',
        'numeric' => 'Polje :attribute mora biti manje ili jednako :value.',
        'string'  => 'Polje :attribute mora biti manje ili jednako :value znakova.',
    ],
    'max'                  => [
        'array'   => 'Polje :attribute ne smije imati više od :max stavki.',
        'file'    => 'Polje :attribute mora biti manje od :max kilobajta.',
        'numeric' => 'Polje :attribute mora biti manje od :max.',
        'string'  => 'Polje :attribute mora sadržavati manje od :max znakova.',
    ],
    'mimes'                => 'Polje :attribute mora biti datoteka tipa: :values.',
    'mimetypes'            => 'Polje :attribute mora biti datoteka tipa: :values.',
    'min'                  => [
        'array'   => 'Polje :attribute mora sadržavati najmanje :min stavki.',
        'file'    => 'Polje :attribute mora biti najmanje :min kilobajta.',
        'numeric' => 'Polje :attribute mora biti najmanje :min.',
        'string'  => 'Polje :attribute mora sadržavati najmanje :min znakova.',
    ],
    'multiple_of'          => 'Broj :attribute mora biti višekratnik :value',
    'not_in'               => 'Odabrano polje :attribute nije ispravno.',
    'not_regex'            => 'Format polja :attribute je neispravan.',
    'numeric'              => 'Polje :attribute mora biti broj.',
    'password'             => 'Lozinka je pogrešna.',
    'present'              => 'Polje :attribute mora biti prisutno.',
    'prohibited'           => 'Polje :attribute je zabranjeno.',
    'prohibited_if'        => 'Polje :attribute zabranjeno je kada je :other :value.',
    'prohibited_unless'    => 'Polje :attribute zabranjeno je, osim ako :other nije u :values.',
    'prohibits'            => 'The :attribute field prohibits :other from being present.',
    'regex'                => 'Polje :attribute se ne podudara s formatom.',
    'relatable'            => 'Ovaj :attribute možda nije povezan s ovim resursom.',
    'required'             => 'Polje :attribute je obavezno.',
    'required_if'          => 'Polje :attribute je obavezno kada polje :other sadrži :value.',
    'required_unless'      => 'Polje :attribute je obavezno osim :other je u :values.',
    'required_with'        => 'Polje :attribute je obavezno kada postoji polje :values.',
    'required_with_all'    => 'Polje :attribute je obavezno kada postje polja :values.',
    'required_without'     => 'Polje :attribute je obavezno kada ne postoji polje :values.',
    'required_without_all' => 'Polje :attribute je obavezno kada nijedno od polja :values ne postoji.',
    'same'                 => 'Polja :attribute i :other se moraju podudarati.',
    'size'                 => [
        'array'   => 'Polje :attribute mora sadržavati :size stavki.',
        'file'    => 'Polje :attribute mora biti :size kilobajta.',
        'numeric' => 'Polje :attribute mora biti duljine :size.',
        'string'  => 'Polje :attribute mora imati :size znakova.',
    ],
    'starts_with'          => 'Stavka :attribute mora započinjati jednom od narednih stavki: :values',
    'string'               => 'Polje :attribute mora biti string.',
    'timezone'             => 'Polje :attribute mora biti ispravna vremenska zona.',
    'unique'               => 'Polje :attribute već postoji.',
    'uploaded'             => 'Polje :attribute nije uspešno učitano.',
    'url'                  => 'Polje :attribute nije ispravnog formata.',
    'uuid'                 => 'Stavka :attribute mora biti valjani UUID.',

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

    'attributes' => [
        'answers.*.value'       => 'odgovor',
        'ascending_order'       => 'redoslijed',
        'current_password'      => 'trenutna lozinka',
        'dimension'             => 'dimenzija',
        'email'                 => 'adresa e-pošte',
        'firstname'             => 'ime',
        'lastname'              => 'prezime',
        'name'                  => 'naziv',
        'new_password'          => 'nova lozinka',
        'oib'                   => 'OIB',
        'password'              => 'lozinka',
        'place'                 => 'mjesto',
        'supervisor'            => 'odgovorna osoba',
        'question'              => 'pitanje',
        'questionnaire'         => 'upitnik',
        'repeat_password'       => 'ponovljena lozinka',
        'target_group'          => 'ciljana skupina',
        'type'                  => 'vrsta',
        'username'              => 'korisničko ime',
    ],

];
