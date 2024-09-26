<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Yoxlama Dil Sətrləri
    |--------------------------------------------------------------------------
    |
    | Aşağıdakı dil sətrləri, yoxlayıcı sinif tərəfindən istifadə olunan standart səhv xəbərlərini
    | içərir. Bu qaydaların bir neçə versiyası var, ölçü qaydaları kimi. İstədiyiniz zaman
    | bu xəbərləri burada dəyişdirə bilərsiniz.
    |
    */

    'accepted' => ':attribute qəbul edilməlidir.',
    'accepted_if' => ':other :value olduğu zaman :attribute qəbul edilməlidir.',
    'active_url' => ':attribute etibarlı URL deyil.',
    'after' => ':attribute, :date tarixindən sonra bir tarix olmalıdır.',
    'after_or_equal' => ':attribute, :date tarixindən sonra və ya ona bərabər bir tarix olmalıdır.',
    'alpha' => ':attribute yalnız hərfləri içərməlidir.',
    'alpha_dash' => ':attribute yalnız hərflər, rəqəmlər, tirelər və alt xətlər içərməlidir.',
    'alpha_num' => ':attribute yalnız hərflər və rəqəmləri içərməlidir.',
    'array' => ':attribute array olmalıdır.',
    'before' => ':attribute, :date tarixindən əvvəl bir tarix olmalıdır.',
    'before_or_equal' => ':attribute, :date tarixindən əvvəl və ya ona bərabər bir tarix olmalıdır.',
    'between' => [
        'numeric' => ':attribute, :min ilə :max arasında olmalıdır.',
        'file' => ':attribute, :min ilə :max kilobayt arasında olmalıdır.',
        'string' => ':attribute, :min ilə :max simvolları arasında olmalıdır.',
        'array' => ':attribute, :min ilə :max elementləri arasında olmalıdır.',
    ],
    'boolean' => ':attribute sahəsi doğru və ya yanlış olmalıdır.',
    'confirmed' => ':attribute təsdiq etməsi uyğun deyil.',
    'current_password' => 'Şifrə səhvdir.',
    'date' => ':attribute etibarlı bir tarix deyil.',
    'date_equals' => ':attribute, :date tarixinə bərabər bir tarix olmalıdır.',
    'date_format' => ':attribute, :format formatına uyğun deyil.',
    'declined' => ':attribute rədd edilməlidir.',
    'declined_if' => ':other :value olduğu zaman :attribute rədd edilməlidir.',
    'different' => ':attribute və :other fərqli olmalıdır.',
    'digits' => ':attribute, :digits rəqəmli olmalıdır.',
    'digits_between' => ':attribute, :min ilə :max arasında rəqəmlərdən ibarət olmalıdır.',
    'dimensions' => ':attribute etibarsız şəkil ölçülərinə malikdir.',
    'distinct' => ':attribute sahəsinin dublikat dəyəri var.',
    'email' => ':attribute etibarlı email ünvanı olmalıdır.',
    'ends_with' => ':attribute aşağıdakılardan biri ilə bitməlidir: :values.',
    'enum' => 'Seçilmiş :attribute etibarsızdır.',
    'exists' => 'Seçilmiş :attribute etibarsızdır.',
    'file' => ':attribute fayl olmalıdır.',
    'filled' => ':attribute sahəsi dəyərləndirilməlidir.',
    'gt' => [
        'numeric' => ':attribute, :value dəyərindən böyük olmalıdır.',
        'file' => ':attribute, :value kilobaytdan böyük olmalıdır.',
        'string' => ':attribute, :value simvoldan uzun olmalıdır.',
        'array' => ':attribute, :value elementdən çox olmalıdır.',
    ],
    'gte' => [
        'numeric' => ':attribute, :value dəyərindən böyük və ya ona bərabər olmalıdır.',
        'file' => ':attribute, :value kilobaytdan böyük və ya ona bərabər olmalıdır.',
        'string' => ':attribute, :value simvoldan uzun və ya ona bərabər olmalıdır.',
        'array' => ':attribute, :value elementdən çox və ya ona bərabər olmalıdır.',
    ],
    'image' => ':attribute şəkil olmalıdır.',
    'in' => 'Seçilmiş :attribute etibarsızdır.',
    'in_array' => ':attribute sahəsi, :other sahəsində mövcud deyil.',
    'integer' => ':attribute tam ədəd olmalıdır.',
    'ip' => ':attribute etibarlı IP ünvanı olmalıdır.',
    'ipv4' => ':attribute etibarlı IPv4 ünvanı olmalıdır.',
    'ipv6' => ':attribute etibarlı IPv6 ünvanı olmalıdır.',
    'json' => ':attribute etibarlı JSON stringi olmalıdır.',
    'lt' => [
        'numeric' => ':attribute, :value dəyərindən kiçik olmalıdır.',
        'file' => ':attribute, :value kilobaytdan kiçik olmalıdır.',
        'string' => ':attribute, :value simvoldan qısa olmalıdır.',
        'array' => ':attribute, :value elementdən az olmalıdır.',
    ],
    'lte' => [
        'numeric' => ':attribute, :value dəyərindən kiçik və ya ona bərabər olmalıdır.',
        'file' => ':attribute, :value kilobaytdan kiçik və ya ona bərabər olmalıdır.',
        'string' => ':attribute, :value simvoldan qısa və ya ona bərabər olmalıdır.',
        'array' => ':attribute, :value elementdən az və ya ona bərabər olmalıdır.',
    ],
    'mac_address' => ':attribute etibarlı MAC ünvanı olmalıdır.',
    'max' => [
        'numeric' => ':attribute, :max dəyərindən böyük ola bilməz.',
        'file' => ':attribute, :max kilobaytdan böyük ola bilməz.',
        'string' => ':attribute, :max simvoldan uzun ola bilməz.',
        'array' => ':attribute, :max elementdən çox ola bilməz.',
    ],
    'mimes' => ':attribute faylın tipi: :values olmalıdır.',
    'mimetypes' => ':attribute faylın tipi: :values olmalıdır.',
    'min' => [
        'numeric' => ':attribute, ən az :min olmalıdır.',
        'file' => ':attribute, ən az :min kilobayt olmalıdır.',
        'string' => ':attribute, ən az :min simvol olmalıdır.',
        'array' => ':attribute, ən az :min element olmalıdır.',
    ],
    'multiple_of' => ':attribute, :value-in bölünən olmalıdır.',
    'not_in' => 'Seçilmiş :attribute etibarsızdır.',
    'not_regex' => ':attribute formatı etibarsızdır.',
    'numeric' => ':attribute ədəd olmalıdır.',
    'password' => 'Şifrə səhvdir.',
    'present' => ':attribute sahəsi mövcud olmalıdır.',
    'prohibited' => ':attribute sahəsi qadağandır.',
    'prohibited_if' => ':attribute sahəsi, :other :value olduğu zaman qadağandır.',
    'prohibited_unless' => ':attribute sahəsi, :other :values daxilində olmadığı müddətdə qadağandır.',
    'prohibits' => ':attribute sahəsi, :other var olmasını qadağan edir.',
    'regex' => ':attribute formatı etibarsızdır.',
    'required' => ':attribute sahəsi tələb olunur.',
    'required_array_keys' => ':attribute sahəsi, :values daxilindəki qeyidlər üçün daxil olmalıdır.',
    'required_if' => ':other :value olduğu zaman :attribute sahəsi tələb olunur.',
    'required_unless' => ':other :values daxilində olduğu müddətdə :attribute sahəsi tələb olunur.',
    'required_with' => ':values mövcud olduğu zaman :attribute sahəsi tələb olunur.',
    'required_with_all' => ':values mövcud olduğu zaman :attribute sahəsi tələb olunur.',
    'required_without' => ':values mövcud olmadığı zaman :attribute sahəsi tələb olunur.',
    'required_without_all' => ':values heç biri mövcud olmadığı zaman :attribute sahəsi tələb olunur.',
    'same' => ':attribute və :other eyni olmalıdır.',
    'size' => [
        'numeric' => ':attribute, :size olmalıdır.',
        'file' => ':attribute, :size kilobayt olmalıdır.',
        'string' => ':attribute, :size simvol olmalıdır.',
        'array' => ':attribute, :size element olmalıdır.',
    ],
    'starts_with' => ':attribute aşağıdakılardan biri ilə başlamalıdır: :values.',
    'string' => ':attribute simvol olmalıdır.',
    'timezone' => ':attribute etibarlı saat zonası olmalıdır.',
    'unique' => ':attribute artıq götürülmüşdür.',
    'uploaded' => ':attribute yüklənmədi.',
    'url' => ':attribute etibarlı URL olmalıdır.',
    'uuid' => ':attribute etibarlı UUID olmalıdır.',

    /*
    |--------------------------------------------------------------------------
    | Xüsusi Yoxlama Dil Sətrləri
    |--------------------------------------------------------------------------
    |
    | Burada atributlar üçün xüsusi yoxlama xəbərlərini "attribute.rule" konvensiyası
    | istifadə edərək təyin edə bilərsiniz. Bu, müəyyən bir atribut qaydası üçün
    | xüsusi bir dil sətrini tez təyin etməyinizə kömək edir.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'xüsusi-xəbər',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Xüsusi Yoxlama Atributları
    |--------------------------------------------------------------------------
    |
    | Aşağıdakı dil sətrləri, mesajımızı daha açıq ifadə etməyə kömək edərək
    | bir şey daha oxunaqlı olaraq, məsələn, "E-Mail Ünvanı" yerinə "email" kimi
    | placeholder dəyişə biləcəyiniz atributlarımızı dəyişdirmək üçün istifadə olunur.
    |
    */

    'attributes' => [
        'category' => 'Kateqoriya',
        'categories' => 'Kateqoriyalar',
        'image' => 'Şəkil',
        'key' => 'Açar',
        'name' => 'Ad',
        'full_name' => 'Tam ad',
        'lastname' => 'Soyadı',
        'Message' => 'Mesaj',
        'slug' => 'Link adı',
        'subject' => 'Mövzu',
        'surname' => 'Soyadı',
        'text' => 'Mətn',
        'value' => 'Dəyər',
    ],
];
