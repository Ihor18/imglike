<?php

namespace Database\Seeders;

use App\Models\Localization;
use Illuminate\Database\Seeder;

class LocalizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Localization::updateOrCreate([
            'origin' => 'game_chat',
            'en' => 'Game chat',
            'ru' => 'Игровой чат',
        ]);
        Localization::updateOrCreate([
            'origin' => 'or',
            'en' => 'or',
            'ru' => 'или',
        ]);

        Localization::updateOrCreate([
            'origin' => 'share',
            'en' => 'Share',
            'ru' => 'Поделиться',
        ]);

        Localization::updateOrCreate([
            'origin' => 'delete',
            'en' => 'Delete',
            'ru' => 'Удалить',
        ]);

        Localization::updateOrCreate([
            'origin' => 'rotate',
            'en' => 'Rotate',
            'ru' => 'Повернуть',
        ]);
        Localization::updateOrCreate([
            'origin' => 'image',
            'en' => 'image',
            'ru' => 'изображение',
        ]);
        Localization::updateOrCreate([
            'origin' => 'convert',
            'en' => 'Convert',
            'ru' => 'Конвертировать',
        ]);
        Localization::updateOrCreate([
            'origin' => 'remove',
            'en' => 'Remove',
            'ru' => 'Убрать',
        ]);

        Localization::updateOrCreate([
            'origin' => 'watermark',
            'en' => 'watermark',
            'ru' => 'водяной знак',
        ]);

        Localization::updateOrCreate([
            'origin' => 'compress',
            'en' => 'Compress',
            'ru' => 'Сжать',
        ]);
        Localization::updateOrCreate([
            'origin' => 'thanks',
            'en' => 'How can I thank you?',
            'ru' => 'Как я могу вас отблагодарить?',
        ]);

        Localization::updateOrCreate([
            'origin' => 'img_helpful',
            'en' => 'If IMGLike was helpful to you, you can also help us.',
            'ru' => 'Если IMGLike был вам полезен, вы также можете нам помочь',
        ]);

        Localization::updateOrCreate([
            'origin' => 'free_online_editor',
            'en' => 'Your free online editor',
            'ru' => 'Ваш бесплатный онлайн-редактор',
        ]);

        Localization::updateOrCreate([
            'origin' => 'always_image',
            'en' => 'images and always will be!',
            'ru' => 'изображений и так будет всегда!',
        ]);
        Localization::updateOrCreate([
            'origin' => 'impose',
            'en' => 'Impose',
            'ru' => 'Наложить',
        ]);

        Localization::updateOrCreate([
            'origin' => 'redactor',
            'en' => 'Redactor',
            'ru' => 'Редактор',
        ]);

        Localization::updateOrCreate([
            'origin' => 'from',
            'en' => 'from',
            'ru' => 'из',
        ]);

        Localization::updateOrCreate([
            'origin' => 'change',
            'en' => 'Change',
            'ru' => 'Изменить',
        ]);
        Localization::updateOrCreate([
            'origin' => 'size',
            'en' => 'size',
            'ru' => 'размер',
        ]);
        Localization::updateOrCreate([
            'origin' => 'in',
            'en' => 'in',
            'ru' => 'в',
        ]);
        Localization::updateOrCreate([
            'origin' => 'cut',
            'en' => 'Cut',
            'ru' => 'Обрезать',
        ]);
        Localization::updateOrCreate([
            'origin' => 'meme_generator',
            'en' => 'Meme generator',
            'ru' => 'Генератор мемов',
        ]);
        Localization::updateOrCreate([
            'origin' => 'privacy_policy',
            'en' => 'Privacy policy',
            'ru' => 'Политика конфиденциальности',
        ]);
        Localization::updateOrCreate([
            'origin' => 'terms',
            'en' => 'Terms of use',
            'ru' => 'Правила использования',
        ]);
        Localization::updateOrCreate([
            'origin' => 'all',
            'en' => 'All',
            'ru' => 'Все',
        ]);
        Localization::updateOrCreate([
            'origin' => 'instruments',
            'en' => 'instruments',
            'ru' => 'инструменты',
        ]);
        Localization::updateOrCreate([
            'origin' => 'safe_transfer',
            'en' => 'Secure file and data transfer',
            'ru' => 'Безопасная передача файлов и данных',
        ]);
        Localization::updateOrCreate([
            'origin' => 'compress_capt',
            'en' => 'Compress JPG, PNG, SVG or GIF with the best quality and compression. Reduce the file size of your images at the same time.',
            'ru' => ' Сжать JPG, PNG, SVG или GIF с самым лучшим качеством и сжатием. Уменьшить размер файла с вашими изображениями одновременно.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'upload',
            'en' => 'upload',
            'ru' => 'загрузите',
        ]);
        Localization::updateOrCreate([
            'origin' => 'upload_text',
            'en' => 'them from your computer',
            'ru' => 'их с вашего компьютера',
        ]);
        Localization::updateOrCreate([
            'origin' => 'upload_images',
            'en' => 'Upload images',
            'ru' => 'Загрузить изображения',
        ]);
        Localization::updateOrCreate([
            'origin' => 'download_compressed',
            'en' => 'Download compressed images',
            'ru' => 'Скачать сжатые изображения',
        ]);
        Localization::updateOrCreate([
            'origin' => 'drag',
            'en' => 'Drag your',
            'ru' => 'Перетащите в это поле ваши',
        ]);
        Localization::updateOrCreate([
            'origin' => 'convert_from_capt',
            'en' => 'All images will be resized with the specified parameters.',
            'ru' => 'Все изображения будут изменены с заданными параметрами.',
        ]);

        Localization::updateOrCreate([
            'origin' => 'all_images_will_convert',
            'en' => 'All images will be converted to',
            'ru' => 'Все изображения будут преобразованы в формат',
        ]);
        Localization::updateOrCreate([
            'origin' => 'static',
            'en' => 'Static',
            'ru' => 'Статичный',
        ]);
        Localization::updateOrCreate([
            'origin' => 'animated',
            'en' => 'Animated',
            'ru' => 'Анимированный',
        ]);
        Localization::updateOrCreate([
            'origin' => 'interval',
            'en' => 'Frame interval, sec',
            'ru' => 'Интервал кадров, сек',
        ]);
        Localization::updateOrCreate([
            'origin' => 'keep_proportions',
            'en' => 'Keep proportions',
            'ru' => 'Сохранять пропорции',
        ]);
        Localization::updateOrCreate([
            'origin' => 'convert_formats',
            'en' => 'Convert  PNG, GIF, TIF, SVG, WEBP, PSD formats to JPG. Convert immediately
        several images in JPG online.',
            'ru' => 'Преобразовывайте форматы PNG, GIF, TIF, SVG, WEBP, PSD  в JPG. Конвертируйте сразу
        несколько изображений в JPG онлайн.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'download_images',
            'en' => 'Download images',
            'ru' => 'Скачать изображения',
        ]);
        Localization::updateOrCreate([
            'origin' => 'convert_web_pages',
            'en' => 'Convert web pages to JPG or SVG and keep the visual aspect.',
            'ru' => 'Преобразовывайте веб-страницы в JPG или SVG и сохраняйте визуальный аспект.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'add',
            'en' => 'Add',
            'ru' => 'Добавить',
        ]);
        Localization::updateOrCreate([
            'origin' => 'enter_address',
            'en' => 'Enter address',
            'ru' => 'Введите адрес',
        ]);
        Localization::updateOrCreate([
            'origin' => 'screen_size',
            'en' => 'Screen size',
            'ru' => 'Размер экрана',
        ]);
        Localization::updateOrCreate([
            'origin' => 'select_size',
            'en' => 'Select size',
            'ru' => 'Выберите размер',
        ]);
        Localization::updateOrCreate([
            'origin' => 'select_format',
            'en' => 'Select format',
            'ru' => 'Выберите формат',
        ]);
        Localization::updateOrCreate([
            'origin' => 'settings',
            'en' => 'Settings',
            'ru' => 'Настройки',
        ]);
        Localization::updateOrCreate([
            'origin' => 'block_ads',
            'en' => 'Block ads',
            'ru' => 'Заблокировать рекламу',
        ]);
        Localization::updateOrCreate([
            'origin' => 'full_screen',
            'en' => 'Full page screenshot',
            'ru' => 'Скриншот всей страницы',
        ]);
        Localization::updateOrCreate([
            'origin' => 'remove_pop_ups',
            'en' => 'Remove pop-ups',
            'ru' => 'Удалить всплывающие окна',
        ]);
        Localization::updateOrCreate([
            'origin' => 'crop_desk',
            'en' => 'All images will be resized with the specified parameters.',
            'ru' => 'Все изображения будут изменены с заданными параметрами.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'width',
            'en' => 'Width',
            'ru' => 'Ширина',
        ]);
        Localization::updateOrCreate([
            'origin' => 'height',
            'en' => 'Height',
            'ru' => 'Высота',
        ]);
        Localization::updateOrCreate([
            'origin' => 'position',
            'en' => 'Position',
            'ru' => 'Положение',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_header_title',
            'en' => 'Free Online Image Editors',
            'ru' => 'Безплатные онлайн редакторы изображений',
        ]);

        Localization::updateOrCreate([
            'origin' => 'index_caption',
            'en' => 'Try now without registration',
            'ru' => 'Попробуйте сейчас без регистрации',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_capt',
            'en' => "We keep your images. It's safe and private",
            'ru' => 'Ваши изображения мы сохраняем у себя. Это безопасно и конфиденциально',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_compress_capt',
            'en' => 'Specify percentage or pixel dimensions and resize JPG, PNG, SVG and GIF images.',
            'ru' => 'Задайте размеры в процентах или пикселях и измените размер изображений JPG, PNG, SVG и GIF.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'photoshop_online',
            'en' => 'Photoshop online',
            'ru' => 'Фотошоп онлайн',
        ]);
        Localization::updateOrCreate([
            'origin' => 'more_features',
            'en' => 'Even more features',
            'ru' => 'Еще больше возможностей',
        ]);
        Localization::updateOrCreate([
            'origin' => 'batch_photo',
            'en' => 'Batch photo editing',
            'ru' => 'Пакетное редактирование фотографий',
        ]);
        Localization::updateOrCreate([
            'origin' => 'batch_desk1',
            'en' => 'With batch file processing, you can convert multiple photos simultaneously.',
            'ru' => 'С помощью пакетной обработки файлов вы можете конвертировать несколько фотографий одновременно.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'batch_desk2',
            'en' => 'The IMGLike service allows you to convert PNG, JPG, GIF, WEBP, HEIC, RAW and many more. Bulk conversion of files up to 1 GB per task in the Premium package.',
            'ru' => 'Сервис IMGLike позволяет преобразовывать файлы форматов PNG, JPG, GIF,  WEBP, HEIC, RAW и многие другие. Групповое преобразование файлов размером до 1 ГБ за задачу в пакете Premium.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'meme_capt',
            'en' => 'Create a meme from JPG, GIF or PNG images. Edit your image and create a meme.',
            'ru' => 'Создайте мем из изображений JPG, GIF или PNG. Отредактируйте свое изображение и создайте мем.',
        ]);

        Localization::updateOrCreate([
            'origin' => 'meme_template',
            'en' => 'Select meme template',
            'ru' => 'Выбрать шаблон мема',
        ]);
        Localization::updateOrCreate([
            'origin' => 'generator_parameters',
            'en' => 'Generator parameters',
            'ru' => 'Параметры генератора',
        ]);
        Localization::updateOrCreate([
            'origin' => 'text',
            'en' => 'Text',
            'ru' => 'Текст',
        ]);
        Localization::updateOrCreate([
            'origin' => 'inside',
            'en' => 'inside',
            'ru' => 'внутри',
        ]);
        Localization::updateOrCreate([
            'origin' => 'outside',
            'en' => 'outside',
            'ru' => 'снаружи',
        ]);
        Localization::updateOrCreate([
            'origin' => 'stext',
            'en' => 'text',
            'ru' => 'текст',
        ]);
        Localization::updateOrCreate([
            'origin' => 'generate_meme',
            'en' => 'Generate meme',
            'ru' => 'Сгенерировать мем',
        ]);
        Localization::updateOrCreate([
            'origin' => 'use',
            'en' => 'Use',
            'ru' => 'Использовать',
        ]);
        Localization::updateOrCreate([
            'origin' => 'in_percents',
            'en' => 'In percents',
            'ru' => 'В процентах',
        ]);
        Localization::updateOrCreate([
            'origin' => 'dont_increase',
            'en' => 'Do not increase if less',
            'ru' => 'Не увеличивать если меньше',
        ]);
        Localization::updateOrCreate([
            'origin' => 'reduce_by',
            'en' => 'Reduce by',
            'ru' => 'Уменьшить на',
        ]);
        Localization::updateOrCreate([
            'origin' => 'rotation_options',
            'en' => 'Rotation options',
            'ru' => 'Параметры поворота',
        ]);
        Localization::updateOrCreate([
            'origin' => 'portrait',
            'en' => 'Portrait',
            'ru' => 'Портрет',
        ]);
        Localization::updateOrCreate([
            'origin' => 'album',
            'en' => 'Album',
            'ru' => 'Альбом',
        ]);
        Localization::updateOrCreate([
            'origin' => 'right',
            'en' => 'Right',
            'ru' => 'Вправо',
        ]);
        Localization::updateOrCreate([
            'origin' => 'left',
            'en' => 'Left',
            'ru' => 'Влево',
        ]);
        Localization::updateOrCreate([
            'origin' => 'reset_all',
            'en' => 'Reset all',
            'ru' => 'Сбросить всё',
        ]);
        Localization::updateOrCreate([
            'origin' => 'download_rotated',
            'en' => 'Download rotated images',
            'ru' => 'Скачать повернутые изображения',
        ]);
        Localization::updateOrCreate([
            'origin' => 'put_up_sign',
            'en' => 'Put up a sign',
            'ru' => 'Поставить знак',
        ]);
        Localization::updateOrCreate([
            'origin' => 'watermark_option',
            'en' => 'Watermark option',
            'ru' => 'Вариант водяного знака',
        ]);
        Localization::updateOrCreate([
            'origin' => 'enter_text',
            'en' => 'Enter text',
            'ru' => 'Введите текст',
        ]);
        Localization::updateOrCreate([
            'origin' => 'top_left',
            'en' => 'Top left',
            'ru' => 'Сверху слева',
        ]);
        Localization::updateOrCreate([
            'origin' => 'top_center',
            'en' => 'Top center',
            'ru' => 'Сверху по центру',
        ]);
        Localization::updateOrCreate([
            'origin' => 'top_right',
            'en' => 'Top right',
            'ru' => 'Сверху справа',
        ]);
        Localization::updateOrCreate([
            'origin' => 'left_center',
            'en' => 'Left center',
            'ru' => 'Слева по центру',
        ]);
        Localization::updateOrCreate([
            'origin' => 'centered',
            'en' => 'Centered',
            'ru' => 'По центру',
        ]);
        Localization::updateOrCreate([
            'origin' => 'right_center',
            'en' => 'Right center',
            'ru' => 'Справа по центру',
        ]);
        Localization::updateOrCreate([
            'origin' => 'bottom_left',
            'en' => 'Bottom left',
            'ru' => 'Снизу слева',
        ]);
        Localization::updateOrCreate([
            'origin' => 'bottom_center',
            'en' => 'Bottom center',
            'ru' => 'Снизу по центру',
        ]);
        Localization::updateOrCreate([
            'origin' => 'bottom_right',
            'en' => 'Bottom right',
            'ru' => 'Снизу справа',
        ]);
        Localization::updateOrCreate([
            'origin' => 'font_size',
            'en' => 'Font size',
            'ru' => 'Размер шрифта',
        ]);
        Localization::updateOrCreate([
            'origin' => 'turn',
            'en' => 'Turn',
            'ru' => 'Поворот',
        ]);
        Localization::updateOrCreate([
            'origin' => 'color',
            'en' => 'Color',
            'ru' => 'Цвет',
        ]);

        Localization::updateOrCreate([
            'origin' => 'in_pixels',
            'en' => 'In pixels',
            'ru' => 'В пикселях',
        ]);
        Localization::updateOrCreate([
            'origin' => 'indentation',
            'en' => 'Indentation from the edge',
            'ru' => ' Отступ от края',
        ]);
        Localization::updateOrCreate([
            'origin' => 'by_pos',
            'en' => 'By position',
            'ru' => 'По положению',
        ]);
        Localization::updateOrCreate([
            'origin' => 'by_coordinates',
            'en' => 'By coordinates',
            'ru' => ' По координатах',
        ]);
        Localization::updateOrCreate([
            'origin' => 'opacity',
            'en' => 'Opacity',
            'ru' => 'Прозрачность',
        ]);
        Localization::updateOrCreate([
            'origin' => 'download_cropped',
            'en' => 'Download cropped image',
            'ru' => 'Скачать обрезаное изображение',
        ]);

        Localization::updateOrCreate([
            'origin' => 'choose_watermark_image',
            'en' => 'Choose watermark image',
            'ru' => 'Выберите изображение водяного знака',
        ]);

        Localization::updateOrCreate([
            'origin' => 'error_hint',
            'en' => ' your Images just press button.  If you find a problem or an error, please contact us. We are working on improving the tool.',
            'ru' => ' изображения, просто нажмите кнопку. Если вы обнаружите проблему или ошибку, пожалуйста, свяжитесь с нами. Мы работаем над улучшением инструмента.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'to_compress',
            'en' => 'To compress',
            'ru' => 'Чтобы сжать ',
        ]);
        Localization::updateOrCreate([
            'origin' => 'to_convert',
            'en' => 'To convert',
            'ru' => 'Чтобы конвертировать',
        ]);
        Localization::updateOrCreate([
            'origin' => 'html_to_image_hint',
            'en' => 'Enabling this option may cause conversion issues. We suggest you to disable it if you see a bad page preview',
            'ru' => 'Включение этой опции может вызвать проблемы с преобразованием. Мы предлагаем вам отключить его, если вы видите плохой предварительный просмотр страницы.',
        ]);
        Localization::updateOrCreate([
            'origin' => '',
            'en' => '',
            'ru' => '',
        ]);
        Localization::updateOrCreate([
            'origin' => '',
            'en' => '',
            'ru' => '',
        ]);
        Localization::updateOrCreate([
            'origin' => '',
            'en' => '',
            'ru' => '',
        ]);

        Localization::updateOrCreate([
            'origin' => '',
            'en' => '',
            'ru' => '',
        ]);
        Localization::updateOrCreate([
            'origin' => '',
            'en' => '',
            'ru' => '',
        ]);
        Localization::updateOrCreate([
            'origin' => '',
            'en' => '',
            'ru' => '',
        ]);
        Localization::updateOrCreate([
            'origin' => '',
            'en' => '',
            'ru' => '',
        ]);


    }
}
