<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Aşağıdaki dil satırları, doğrulayıcı sınıf tarafından kullanılan varsayılan hata iletilerini içerir.
    | Bazı kuralların birden fazla versiyonu vardır, örneğin boyut kuralları gibi.
    | Her birini istediğiniz gibi ayarlayabilirsiniz.
    |
    */

    'accepted' => ':attribute kabul edilmelidir.',
    'accepted_if' => ':other :value olduğunda :attribute kabul edilmelidir.',
    'active_url' => ':attribute geçerli bir URL değil.',
    'after' => ':attribute, :date tarihinden sonra bir tarih olmalıdır.',
    'after_or_equal' => ':attribute, :date tarihinden sonra veya eşit bir tarih olmalıdır.',
    'alpha' => ':attribute sadece harf içerebilir.',
    'alpha_dash' => ':attribute sadece harf, rakam, tire ve alt çizgi içerebilir.',
    'alpha_num' => ':attribute sadece harf ve rakam içerebilir.',
    'array' => ':attribute bir dizi olmalıdır.',
    'before' => ':attribute, :date tarihinden önce bir tarih olmalıdır.',
    'before_or_equal' => ':attribute, :date tarihinden önce veya eşit bir tarih olmalıdır.',
    'between' => [
        'numeric' => ':attribute, :min ile :max arasında olmalıdır.',
        'file' => ':attribute, :min ile :max kilobayt arasında olmalıdır.',
        'string' => ':attribute, :min ile :max karakter arasında olmalıdır.',
        'array' => ':attribute, :min ile :max öğe arasında olmalıdır.',
    ],
    'boolean' => ':attribute alanı doğru veya yanlış olmalıdır.',
    'confirmed' => ':attribute doğrulaması eşleşmiyor.',
    'current_password' => 'Şifre yanlış.',
    'date' => ':attribute geçerli bir tarih değil.',
    'date_equals' => ':attribute, :date tarihine eşit bir tarih olmalıdır.',
    'date_format' => ':attribute, :format biçimiyle eşleşmiyor.',
    'declined' => ':attribute reddedilmelidir.',
    'declined_if' => ':other :value olduğunda :attribute reddedilmelidir.',
    'different' => ':attribute ve :other farklı olmalıdır.',
    'digits' => ':attribute, :digits basamağa sahip olmalıdır.',
    'digits_between' => ':attribute, :min ile :max basamak arasında olmalıdır.',
    'dimensions' => ':attribute geçersiz resim boyutlarına sahip.',
    'distinct' => ':attribute alanı tekrarlanan bir değere sahiptir.',
    'email' => ':attribute geçerli bir e-posta adresi olmalıdır.',
    'ends_with' => ':attribute, aşağıdakilerden biriyle bitmelidir: :values.',
    'enum' => 'Seçilen :attribute geçersizdir.',
    'exists' => 'Seçilen :attribute geçersizdir.',
    'file' => ':attribute bir dosya olmalıdır.',
    'filled' => ':attribute alanı bir değere sahip olmalıdır.',
    'gt' => [
        'numeric' => ':attribute, :value değerinden büyük olmalıdır.',
        'file' => ':attribute, :value kilobayttan büyük olmalıdır.',
        'string' => ':attribute, :value karakterden büyük olmalıdır.',
        'array' => ':attribute, :value öğeden daha fazla olmalıdır.',
    ],
    'gte' => [
        'numeric' => ':attribute, :value değerine eşit veya daha büyük olmalıdır.',
        'file' => ':attribute, :value kilobayt veya daha büyük olmalıdır.',
        'string' => ':attribute, :value karaktere eşit veya daha büyük olmalıdır.',
        'array' => ':attribute, :value öğeye veya daha fazlasına sahip olmalıdır.',
    ],
    'image' => ':attribute bir resim olmalıdır.',
    'in' => 'Seçilen :attribute geçersizdir.',
    'in_array' => ':attribute alanı :other içinde mevcut değil.',
    'integer' => ':attribute bir tam sayı olmalıdır.',
    'ip' => ':attribute geçerli bir IP adresi olmalıdır.',
    'ipv4' => ':attribute geçerli bir IPv4 adresi olmalıdır.',
    'ipv6' => ':attribute geçerli bir IPv6 adresi olmalıdır.',
    'json' => ':attribute geçerli bir JSON dizesi olmalıdır.',
    'lt' => [
        'numeric' => ':attribute, :value değerinden küçük olmalıdır.',
        'file' => ':attribute, :value kilobayttan küçük olmalıdır.',
        'string' => ':attribute, :value karakterden küçük olmalıdır.',
        'array' => ':attribute, :value öğeden az olmalıdır.',
    ],
    'lte' => [
        'numeric' => ':attribute, :value değerine eşit veya daha küçük olmalıdır.',
        'file' => ':attribute, :value kilobayt veya daha küçük olmalıdır.',
        'string' => ':attribute, :value karaktere eşit veya daha küçük olmalıdır.',
        'array' => ':attribute, :value öğeden fazla olmamalıdır.',
    ],
    'mac_address' => ':attribute geçerli bir MAC adresi olmalıdır.',
    'max' => [
        'numeric' => ':attribute, :max değerinden büyük olmamalıdır.',
        'file' => ':attribute, :max kilobayttan büyük olmamalıdır.',
        'string' => ':attribute, :max karakterden büyük olmamalıdır.',
        'array' => ':attribute, :max öğeden fazla olmamalıdır.',
    ],
    'mimes' => ':attribute, :values türünde bir dosya olmalıdır.',
    'mimetypes' => ':attribute, :values türünde bir dosya olmalıdır.',
    'min' => [
        'numeric' => ':attribute, en az :min olmalıdır.',
        'file' => ':attribute, en az :min kilobayt olmalıdır.',
        'string' => ':attribute, en az :min karakter olmalıdır.',
        'array' => ':attribute, en az :min öğe içermelidir.',
    ],
    'multiple_of' => ':attribute, :value\'nin katı olmalıdır.',
    'not_in' => 'Seçilen :attribute geçersizdir.',
    'not_regex' => ':attribute formatı geçersizdir.',
    'numeric' => ':attribute bir sayı olmalıdır.',
    'password' => 'Şifre yanlış.',
    'present' => ':attribute alanı mevcut olmalıdır.',
    'prohibited' => ':attribute alanı yasaktır.',
    'prohibited_if' => ':other :value olduğunda :attribute yasaktır.',
    'prohibited_unless' => ':other :values içinde olmadığında :attribute yasaktır.',
    'prohibits' => ':attribute alanı :other\'ın varlığını yasaklar.',
    'regex' => ':attribute formatı geçersizdir.',
    'required' => ':attribute alanı gereklidir.',
    'required_array_keys' => ':attribute alanı için :values girişleri olmalıdır.',
    'required_if' => ':other :value olduğunda :attribute alanı gereklidir.',
    'required_unless' => ':other :values içinde olmadığında :attribute alanı gereklidir.',
    'required_with' => ':values mevcut olduğunda :attribute alanı gereklidir.',
    'required_with_all' => ':values mevcut olduğunda :attribute alanı gereklidir.',
    'required_without' => ':values mevcut olmadığında :attribute alanı gereklidir.',
    'required_without_all' => ':values\'den hiçbiri mevcut olmadığında :attribute alanı gereklidir.',
    'same' => ':attribute ve :other eşleşmelidir.',
    'size' => [
        'numeric' => ':attribute, :size olmalıdır.',
        'file' => ':attribute, :size kilobayt olmalıdır.',
        'string' => ':attribute, :size karakter olmalıdır.',
        'array' => ':attribute, :size öğe içermelidir.',
    ],
    'starts_with' => ':attribute, aşağıdakilerden biriyle başlamalıdır: :values.',
    'string' => ':attribute bir dize olmalıdır.',
    'timezone' => ':attribute geçerli bir saat dilimi olmalıdır.',
    'unique' => ':attribute zaten alınmış.',
    'uploaded' => ':attribute yüklenemedi.',
    'url' => ':attribute geçerli bir URL olmalıdır.',
    'uuid' => ':attribute geçerli bir UUID olmalıdır.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Burada, özellikler için "attribute.rule" adını kullanarak özellik kuralları için özel doğrulama iletileri belirtebilirsiniz.
    | Bu, bir öznitelik kuralı için belirli bir özel dil satırını hızlıca belirtmemize yardımcı olur.
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
    | Aşağıdaki dil satırları, öznitelik yer tutucumuzu daha anlaşılır hale getirmek için "e-posta adresi" yerine "E-Posta Adresi" gibi
    | daha okunabilir bir şeyle değiştirmek için kullanılır. Bu sadece mesajımızı daha anlamlı hale getirmemize yardımcı olur.
    |
    */

    'attributes' => [
        'category' => 'Kategori',
        'categories' => 'Kategoriler',
        'image' => 'Resim',
        'key' => 'Anahtar',
        'name' => 'Ad',
        'full_name' => 'Tam Ad',
        'lastname' => 'Soyadı',
        'Message' => 'Mesaj',
        'slug' => 'Kısa URL',
        'subject' => 'Konu',
        'surname' => 'Soyad',
        'text' => 'Metin',
        'value' => 'Değer',
    ],
];
