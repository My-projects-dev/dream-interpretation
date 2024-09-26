<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('setting_translations')->delete();

        \DB::table('setting_translations')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'setting_id' => 1,
                    'value' => 'لغة الأحلام',
                    'locale' => 'ar',
                ),
            1 =>
                array(
                    'id' => 2,
                    'setting_id' => 1,
                    'value' => 'Yuxuların dili',
                    'locale' => 'az',
                ),
            2 =>
                array(
                    'id' => 3,
                    'setting_id' => 1,
                    'value' => 'The language of dreams',
                    'locale' => 'en',
                ),
            3 =>
                array(
                    'id' => 4,
                    'setting_id' => 1,
                    'value' => 'सपनों की भाषा',
                    'locale' => 'hi',
                ),
            4 =>
                array(
                    'id' => 5,
                    'setting_id' => 1,
                    'value' => 'Язык снов',
                    'locale' => 'ru',
                ),
            5 =>
                array(
                    'id' => 6,
                    'setting_id' => 1,
                    'value' => 'Rüyaların dili',
                    'locale' => 'tr',
                ),
            6 =>
                array(
                    'id' => 7,
                    'setting_id' => 2,
                    'value' => 'اكتشف أسرار أحلامك. اكتشف المعنى الأعمق لأحلامك كل ليلة.',
                    'locale' => 'ar',
                ),
            7 =>
                array(
                    'id' => 8,
                    'setting_id' => 2,
                    'value' => 'Yuxularınızın sirlərini açın. Hər gecə gördüyünüz yuxuların dərin mənasını kəşf edin.',
                    'locale' => 'az',
                ),
            8 =>
                array(
                    'id' => 9,
                    'setting_id' => 2,
                    'value' => 'Unlock the secrets of your dreams. Discover the deeper meaning of your dreams every night.',
                    'locale' => 'en',
                ),
            9 =>
                array(
                    'id' => 10,
                    'setting_id' => 2,
                    'value' => 'अपने सपनों के रहस्य उजागर करें. हर रात आपके द्वारा देखे जाने वाले सपनों का गहरा अर्थ जानें।',
                    'locale' => 'hi',
                ),
            10 =>
                array(
                    'id' => 11,
                    'setting_id' => 2,
                    'value' => 'Разгадайте тайны своей мечты. Откройте для себя глубокий смысл снов, которые вы видите каждую ночь.',
                    'locale' => 'ru',
                ),
            11 =>
                array(
                    'id' => 12,
                    'setting_id' => 2,
                    'value' => 'Rüyalarınızın sırlarını çözün. Her gece gördüğünüz rüyaların derin anlamlarını keşfedin.',
                    'locale' => 'tr',
                ),
        ));
    }
}
