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
            'origin' => 'nav_edit',
            'en' => 'Photoshop online',
            'ru' => 'Фотошоп онлайн',
        ]);
        Localization::updateOrCreate([
            'origin' => 'nav_effects',
            'en' => 'Effects',
            'ru' => 'Эффекты',
        ]);
        Localization::updateOrCreate([
            'origin' => 'nav_collage',
            'en' => 'Make a collage',
            'ru' => 'Сделать коллаж',
        ]);
        Localization::updateOrCreate([
            'origin' => 'nav_paint',
            'en' => 'Draw online',
            'ru' => 'Рисовать онлайн',
        ]);
        Localization::updateOrCreate([
            'origin' => 'sub_title',
            'en' => 'Upload photos and edit them online in the browser window!',
            'ru' => 'Загружай фото и редактируй в окне браузера онлайн!',
        ]);
        Localization::updateOrCreate([
            'origin' => 'page_index',
            'en' => 'Main',
            'ru' => 'Главная',
        ]);

        Localization::updateOrCreate([
            'origin' => 'index_title',
            'en' => 'Photoshop online editor for free',
            'ru' => 'Фотошоп онлайн редактор на русском языке бесплатно',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_meta',
            'en' => 'With the help of our online photoshop service, you can edit photos, images and cliparts, as well as make a collage and apply effects on photos.',
            'ru' => 'С помощью нашего сервиса фотошоп онлайн, Вы можете редактировать фотографии, изображения и клипарты, а так же сделать коллаж и наложить эффекты на фото.',
        ]);

        Localization::updateOrCreate([
            'origin' => 'index_header',
            'en' => 'Photoshop online in english',
            'ru' => 'Фотошоп онлайн на русском',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_1',
            'en' => 'Tool',
            'ru' => 'Инструмент',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_2',
            'en' => 'photoshop online',
            'ru' => 'фотошоп онлайн',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_3',
            'en' => 'in english with effects for free, you can
                select and edit pictures, images, photos and cliparts.',
            'ru' => 'на русском с эффектами бесплатно, Вы можете
                выбрать и редактировать картинки, изображения, фотографии и клипарты.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_4',
            'en' => 'Use a collage editor,
                to',
            'ru' => 'Используйте редактор коллажей,
                чтобы ',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_5',
            'en' => 'make a collage',
            'ru' => 'сделать коллаж',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_6',
            'en' => 'or superimpose',
            'ru' => 'или наложить',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_7',
            'en' => 'photo effects',
            'ru' => 'эффекты на фотографию',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_8',
            'en' => 'Upload a photo, edit used all functions
                Photoshop and save it to your computer.',
            'ru' => 'Загрузите фотографию, отредактируйте использовав все функции
                фотошопа и сохраните к себе на компьютер.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_9',
            'en' => 'Select the desired photo editor',
            'ru' => 'Выберите нужный фоторедактор',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_10',
            'en' => 'What do you want to do:',
            'ru' => 'Что вы хотите сделать: ',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_11',
            'en' => 'edit photo',
            'ru' => 'отредактировать фото',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_12',
            'en' => 'via photoshop online, apply effects
                    or make an online collage?',
            'ru' => 'через фотошоп онлайн, наложить эффекты
                    или сделать онлайн коллаж?',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_13',
            'en' => 'Service',
            'ru' => 'Сервис',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_14',
            'en' => 'ONLINE PHOTOSHOP',
            'ru' => 'ФОТОШОП ОНЛАЙН',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_15',
            'en' => 'offered by us, convenient, functional, simple, accessible,
                    intuitive to operate.',
            'ru' => ' предлагаемый нами, удобен, функционален, прост, доступен,
                    интуитивно понятен в управлении.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_16',
            'en' => 'Is a set of tools, quite successfully
                    reproducing the necessary functions of any professional, semi-professional graphic
                    editor.',
            'ru' => 'Представляет собой набор инструментов, довольно успешно
                    воспроизводящих необходимые функции любого профессионального, полупрофессионального графического
                    редактора.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_17',
            'en' => 'To enjoy all the system benefits free of charge, you do not need to have
                    specific knowledge taught to programmers - processing, editing of photographs.',
            'ru' => 'Для безвозмездного наслаждения всеми системными преимуществами необязательно обладать
                    специфическими знаниями, которым обучают программистов – обработка, монтаж фотографий.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_18',
            'en' => 'Use
                    the program is available right now, without downloading, installing, long study, trial, error,
                    disappointment.',
            'ru' => 'Использовать
                    программу можно прямо сейчас, без загрузки, установки, долгого изучения, прохождения проб, ошибок,
                    разочарований.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_19',
            'en' => 'The advantages of the system are in the following features:',
            'ru' => 'Достоинства системы заключаются в следующих особенностях:',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_20',
            'en' => 'Simple, lightweight work.',
            'ru' => 'Простая работа облегченного формата.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_21',
            'en' => 'Online tools are so transparent in their understanding,
                            that understanding their functions is within the power of a person of any age who does not have at least some knowledge
                            in the field of graph programming.',
            'ru' => 'Онлайн-инструменты настолько «прозрачны» в понимании,
                            что понять их функции под силу человеку любого возраста, не имеющему хоть какие-то познания
                            в области графопрограммирования.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_22',
            'en' => 'Diverse tools, a wide selection of auxiliary elements.',
            'ru' => 'Разнообразный инструментарий, широкий выбор вспомогательных элементов.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_23',
            'en' => 'Features of the editor,
                            welcomed by us, are available in basic, advanced versions of photo editors throughout
                            the world.',
            'ru' => 'Возможности редактора,
                            радушно представленного нами, имеются в базовых, расширенных версиях фоторедакторах по всему
                            миру.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_24',
            'en' => 'Stable work at high speed.',
            'ru' => 'Стабильная работа на высокой скорости.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_25',
            'en' => 'Photos are uploaded in real
                            time, no delays, freezes, interruptions.',
            'ru' => 'Закачка фотоснимков происходит в режиме реального
                            времени, без задержек, зависания, прерывания.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_26',
            'en' => 'Soon for business, cliparts.',
            'ru' => 'Скоры на дело, клипарты.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_27',
            'en' => 'The inconvenience of
                            file incompatibility issues are missing.',
            'ru' => 'Неудобства по
                            проблемам несовместимости файлов отсутствуют.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_28',
            'en' => 'The portal works around the clock. Breaks and
                            no days off.',
            'ru' => 'Портал работает круглосуточно. Перерывов и
                            выходных нет',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_29',
            'en' => 'Fiduciary use.',
            'ru' => 'Пользование на доверительной основе.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_30',
            'en' => 'It is important for us that the editing process, being
                            creative activity, brought you only positive, pleasure, and a paid service of such
                            emotion will not deliver.',
            'ru' => 'Нам важно, чтобы процесс редактирования, будучи
                            творческой деятельностью, приносил вам только позитив, удовольствие, а платный сервис таких
                            эмоций доставит не в силе.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_31',
            'en' => 'All the functionality for making edits is completely free.',
            'ru' => 'Весь функционал по внесению правок совершенно бесплатен.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_32',
            'en' => 'Not necessary donate finances, subscribe to the newsletter.',
            'ru' => 'Не нужно жертвовать финансы, подписываться на рассылку.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_33',
            'en' => 'Regarding the last nuance - a large number',
            'ru' => 'Касательно последнего нюанса – большое количество',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_34',
            'en' => 'photo editors online',
            'ru' => 'фоторедакторов онлайн',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_35',
            'en' => 'of our type work only on a prepaid basis.',
            'ru' => 'нашего типа работают только по предоплате.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_36',
            'en' => "We don't want to limit our guests.
    such little things.",
            'ru' => 'Мы же не хотим ограничивать наших гостей
                            подобными мелочами.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_37',
            'en' => 'can be performed by the user in',
            'ru' => 'может совершать пользователь в',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_38',
            'en' => 'photoshop online in Russian',
            'ru' => 'фотошоп онлайн на русском',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_39',
            'en' => ', who decided to contribute to
                    photo edits with us?',
            'ru' => ', решивший вносить в
                    фото правки именно у нас?',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_40',
            'en' => 'First, edit with standard "helpers" -
                    major rework, adjusting sharpness, blur, brightness, red-eye removal,
                    stamping, background filling.',
            'ru' => 'Во-первых, производить редактирование стандартными «помощниками» –
                    серьезная переделка, регулировка резкости, размытости, яркости, удаление эффекта красных глаз,
                    простановка штампа, заливка фона.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_41',
            'en' => 'Secondly, create collages - a combination of several photographs in
                    free form.',
            'ru' => 'Во-вторых, создавать коллажи – сочетание нескольких фотокарточек в
                    произвольной форме.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_42',
            'en' => 'Composing images is a popular service. Helps to visualize,
                    activate the life process - show before / after, teach through a set of pictures with
                    step by step actions.',
            'ru' => 'Компоновка изображений – услуга популярная. Помогает визуализировать,
                    активизировать жизненный процесс – показать до/после, научить через совокупность картинок с
                    пошаговыми действиями.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_43',
            'en' => 'Thirdly, to impose effects, the variety of which is amazing. So any
                    photography becomes unique, without analogues, repetition, plagiarism.',
            'ru' => 'В-третьих, накладывать эффекты, разнообразие которых поражает. Так любая
                    фотография становится уникальной, без аналогов, повтора, плагиата.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'index_44',
            'en' => 'Whatever the person takes from
                    listed above, everything is done in a few clicks.',
            'ru' => 'Что бы человек ни предпринял из
                    перечисленного выше, все совершается в несколько кликов.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_title',
            'en' => 'Create a collage online for free',
            'ru' => 'Cоздать коллаж онлайн на русском языке бесплатно',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_header',
            'en' => 'Make a photo collage online',
            'ru' => 'Сделать коллаж фото онлайн',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_1',
            'en' => 'You can make a photo collage online by choosing one of the two editors and then upload photos to it and create your own collage.',
            'ru' => 'Сделать коллаж фото онлайн можно выбрав один из двух редакторов и, после чего, загрузите в него фотографии и создайте свой коллаж.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_2',
            'en' => 'Each editor has its own collage creation properties.',
            'ru' => 'Каждый редактор обладает своими свойствами создания коллажей.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_3',
            'en' => 'Select the desired photo editor:',
            'ru' => 'Выберите нужный фоторедактор:',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_4',
            'en' => 'Photography is a way to capture an important moment of life, to remember a festive event, the emotions associated with it.',
            'ru' => 'Фотография – способ запечатлеть важный момент жизни, сохранить в памяти праздничное событие, связанные с ним эмоции.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_5',
            'en' => 'It used to be called a photo card, it was issued only on paper.',
            'ru' => 'Раньше она именовалась фотокарточкой, выпускалась только на бумажном носителе.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_6',
            'en' => 'Thanks to technological progress, it is not necessary to stock up on paper today.',
            'ru' => 'Благодаря технологическому прогрессу сегодня бумагой запасаться необязательно.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_7',
            'en' => 'I switched on the phone, took a picture, and reviewed it.',
            'ru' => 'Включил телефон, сфотографировал, пересматриваешь.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_8',
            'en' => 'Connoisseurs of antiquity continue to transfer digital images to photographic paper to perpetuate what is captured in a photo album, looking at it from time to time.',
            'ru' => 'Ценители старины продолжают и сейчас переносить цифровые изображения на фотобумагу, чтобы увековечить запечатленное в фотоальбоме, время от времени просматривая его.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_9',
            'en' => 'But what about those who want to combine several photos on one background?',
            'ru' => 'А что делать тем, кто хочет совместить на одном фоне несколько фото?',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_10',
            'en' => 'About 20 years ago, the answer would have sounded like this - take a Whatman paper, stick the cards in a certain order, admire.',
            'ru' => 'Лет 20 назад ответ прозвучал бы так – взять ватман, приклеить карточки в определенном порядке, любоваться.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_11',
            'en' => 'Today it is enough to open an application that produces such a collage automatically.',
            'ru' => 'Сегодня достаточно открыть приложение, производящее такой коллаж автоматически.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_12',
            'en' => 'Composition manipulations are easy, even a preschooler can master them.',
            'ru' => ' Манипуляции с составлением композиции легки, их осилит даже дошкольник.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_13',
            'en' => 'The goal is to combine several images on one plane.',
            'ru' => 'Цель – соединение нескольких снимков на одной плоскости.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_14',
            'en' => 'Tasks - to combine photographs, create a theme, diversify it with various effects for greater visualization, making the base of saved images memorable.',
            'ru' => 'Задачи – скомбинировать фотокарточки, создать тему, разнообразить его различными эффектами для большей визуализации, сделав запоминающимся базу из сохраненных снимков.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_15',
            'en' => 'The peculiarity consists in the simplest set of functions that a person of any age can understand.',
            'ru' => 'Особенность состоит в простейшем наборе функций, понять которые сможет человек любого возраста.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_16',
            'en' => 'The demand is determined by the simple management of the program, the beauty of the resulting work.',
            'ru' => 'Востребованность определяется простым управлением программы, красотой получившегося произведения.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_17',
            'en' => 'Everyone can collect it on our website.',
            'ru' => 'Собрать его на нашем сайте сможет каждый.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'collage_18',
            'en' => 'Enough Internet access, stock of interesting pictures.',
            'ru' => 'Хватит выхода в интернет, запаса интересных снимков.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'edit_photo_title',
            'en' => 'Photoshop Online | Online Photo Editor',
            'ru' => 'Фотошоп онлайн бесплатно на русском | Photoshop Online | Online Photo Editor',
        ]);
        Localization::updateOrCreate([
            'origin' => 'edit_photo_meta',
            'en' => 'Edit photos online, through online photoshop. Photoshop Online Editor is a tool that lets you modify images, apply effects, and more.',
            'ru' => 'Редактировать фото онлайн, через онлайн фотошоп. Photoshop Online Editor - это инструмент позволяющий изменять изображние, накладывать эффекты и многое другое.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'edit_photo_meta',
            'en' => 'Edit photos online, through online photoshop. Photoshop Online Editor is a tool that lets you modify images, apply effects, and more.',
            'ru' => 'Редактировать фото онлайн, через онлайн фотошоп. Photoshop Online Editor - это инструмент позволяющий изменять изображние, накладывать эффекты и многое другое.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_title',
            'en' => 'Create a collage online in Russian for free',
            'ru' => 'Cоздать коллаж онлайн на русском языке бесплатно',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_header',
            'en' => 'Overlay effects',
            'ru' => 'Наложение эффектов',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_1',
            'en' => 'Create',
            'ru' => 'Создать',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_2',
            'en' => 'online effects for photography',
            'ru' => 'онлайн эффекты для фотографии',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_3',
            'en' => 'very easy with our free service.',
            'ru' => 'очень легко с нашим бесплатным сервисом.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_4',
            'en' => 'Not necessary download programs to your computer, just choose from 4 reactors below, your own to your liking, and proceed To',
            'ru' => 'Не нужно скачивать программы на свой компьютер, просто выберите ниже из 4 реакторов, свой по вкусу, и приступайте к',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_5',
            'en' => 'editing photo online',
            'ru' => 'редактированию фото онлайн',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_6',
            'en' => 'Select the desired photo editor:',
            'ru' => 'Выберите нужный фоторедактор:',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_7',
            'en' => 'Man is a creative person who constantly wants to change, design, add something. Such
                    the aspiration is inherent in him by nature, it must be realized.',
            'ru' => 'Человек – личность творческая, постоянно желающая что-то менять, конструировать, добавлять. Такое
                    стремление заложено в него природой, его необходимо реализовывать.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_8',
            'en' => 'Make eut today initial appearance, become "appetizing".',
            'ru' => 'Сегодня сделать эют первоначальный облик, становятся «аппетитными».',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_9',
            'en' => 'Have professional editing knowledge no images required.',
            'ru' => 'Обладать профессиональными познаниями в области редактирования изображений не требуется.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_10',
            'en' => 'Even a child can master the actions, it' . "'" . 's enough to show with one example
                    his,
                    where to press, what will happen in the end.',
            'ru' => 'Осилить действия сможет даже ребенок, хватит на одном примере показать ему, куда нажимать, что в итоге получится.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_11',
            'en' => 'What can such an action equipped with spectacular effects?',
            'ru' => 'Что может такое действо, оснащенное эффектными воздействиями?',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_12',
            'en' => 'For example, try special filters - aging, neon glow, bruising (unified filters).',
            'ru' => 'Например, попробовать специальные фильтры – состаривание, неоновое свечение, помятость (унифицированные светофильтры).',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_13',
            'en' => 'All functions are not transfer.',
            'ru' => 'Всех функций не перечислить.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'effects_14',
            'en' => 'Graphic solutions such as adding broken abstract lines, fire, water are popular.',
            'ru' => 'Популярны графические решения типа добавления ломаных абстрактных линий, огня, воды.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_title',
            'en' => 'Draw online for free without registration',
            'ru' => 'Рисовать онлайн бесплатно без регистрации',
        ]);

        Localization::updateOrCreate([
            'origin' => 'paint_meta',
            'en' => 'With the help of our online photoshop service, you can edit photos, images and cliparts, as well as make a collage and apply effects on photos.',
            'ru' => 'С помощью нашего сервиса фотошоп онлайн, Вы можете редактировать фотографии, изображения и клипарты, а так же сделать коллаж и наложить эффекты на фото.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_header',
            'en' => 'Draw online',
            'ru' => 'Рисовать онлайн',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_1',
            'en' => 'You can draw online by choosing one of two editors.',
            'ru' => 'Рисовать онлайн можно выбрав один из двух редакторов.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_2',
            'en' => 'Each editor has its own effects, using which you can enjoy your own painting drawing online!',
            'ru' => 'У каждого редактора есть свои эффекты, с помощью которых вы можете насладиться собственным рисованием рисунка онлайн!',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_3',
            'en' => 'Even children can draw online!',
            'ru' => 'Рисовать онлайн смогут даже дети!',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_4',
            'en' => 'Select the desired photo editor:',
            'ru' => 'Выберите нужный фоторедактор:',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_5',
            'en' => 'Thanks to technological progress, today you can draw not only with paper and pencils. For
                    engaging in this type of creative activity is enough for a personal computer, laptop, mouse.',
            'ru' => 'Благодаря технологическому прогрессу рисовать сегодня можно не только с помощью бумаги, карандашей. Для
                    занятия таким видом творческой деятельности достаточно персонального компьютера, ноутбука, мышки.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_6',
            'en' => 'It is not necessary to neglect the traditional way of creating drawings; you can skillfully combine it with
                    virtual creativity.',
            'ru' => 'Пренебрегать традиционным способом создания рисунков необязательно, можно умело совмещать его с
                    виртуальным творчеством.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_7',
            'en' => 'If the first develops fine motor skills of hands, imagination, the second helps to master
                    PC reduces fear of technology, especially for the elderly.',
            'ru' => 'Если первое развивает мелкую моторику рук, воображение, второе помогает освоить
                    ПК, снижает страх перед техникой, что особенно касается пожилых.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_8',
            'en' => 'If the kids are happy to click on everything
                    keyboard buttons, exploring the netbook, for older people every press is given with difficulty.',
            'ru' => 'Если малышам в радость нажимать на все
                    кнопки клавиатуры, исследуя нетбук, людям преклонного возраста каждое нажатие дается с трудом.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_9',
            'en' => 'And not because of physical limitations, but because of the elementary fear of pressing the wrong place.',
            'ru' => 'И не из-за физических ограничений, а из-за элементарной боязни нажать не туда.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_10',
            'en' => 'Drawing online fast
                    eliminates such difficulties, helps to overcome awkwardness.',
            'ru' => 'Рисование онлайн быстро
                    устраняет такие трудности, способствует тому, чтобы побороть неловкость.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_11',
            'en' => 'The goal is to come up with screen pictures using digital elements with the prospect of the development of logical ones,
                    tactile abilities, ingenuity, ingenuity, thinking.',
            'ru' => 'Цель – придумывание экранных картинок посредством цифровых элементов с перспективой развития логических,
                    тактильных способностей, сообразительности, смекалки, мышления.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_12',
            'en' => 'Tasks - to draw, create a project program, understand the basic skills of working with "hardware", conduct
                    leisure with benefit, develop perseverance, patience, restraint, accuracy, endurance, creativity,
                    the ability to bring the work started to the end.',
            'ru' => 'Задачи – нарисовать, создать проектную программу, понять основные навыки работы с «железом», провести
                    досуг с пользой, развить усидчивость, терпение, сдержанность, аккуратность, выносливость, креативность,
                    умение доводить начатое дело до конца.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_13',
            'en' => 'Opportunities - create an image that can be printed, create a project for a school report,
                    visually demonstrating what the speaker is talking about, choose any tool (crayons, felt-tip pen,
                    marker, paint, fill), keep the crumb busy.',
            'ru' => 'Возможности – творить изображение, которое можно распечатать, составить проект для школьного доклада,
                    визуально демонстрирующий то, о чем говорит выступающий, выбрать любой инструмент (мелки, фломастер,
                    маркер, краски, заливка), занять крошку полезным делом.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'paint_14',
            'en' => 'And also instill the experience of using a simple
                    editor, show the child alternative art methods, give the student
                    the beginning',
            'ru' => 'А также привить опыт использования простого
                    редактора, показать ребенку альтернативные методы художественного искусства, дать школьнику
                    первоначало',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_title',
            'en' => 'Photoshop Online | Online Photo Editor',
            'ru' => 'Рисовать онлайн | Photoshop Online | Online Photo Editor',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_1',
            'en' => 'New',
            'ru' => 'Новый',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_2',
            'en' => 'Share',
            'ru' => 'Поделиться',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_3',
            'en' => 'Full screen',
            'ru' => 'Во весь экран',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_4',
            'en' => 'Save',
            'ru' => 'Сохранить',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_5',
            'en' => 'Control',
            'ru' => 'Управление',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_6',
            'en' => 'Cancel',
            'ru' => 'Отменить',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_7',
            'en' => 'Repeat',
            'ru' => 'Повторить',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_8',
            'en' => 'To save, right click on the image and select',
            'ru' => 'Чтобы сохранить, щелкните правой кнопкой мыши на изображении и выберите',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_9',
            'en' => 'Save image as ...',
            'ru' => 'Сохранить изображение как...',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_10',
            'en' => 'Drag and drop colors to blend',
            'ru' => 'Перетаскивайте цвета, чтобы смешать их',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_11',
            'en' => 'Center mirror',
            'ru' => 'Зеркало по центру',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_12',
            'en' => 'Spiral to the center',
            'ru' => 'Спираль к центру',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_13',
            'en' => 'Play music',
            'ru' => 'Включить музыку',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_14',
            'en' => 'Turn off the music',
            'ru' => 'Выключить музыку',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_15',
            'en' => 'Hide thumbnail',
            'ru' => 'Скрыть миниатюру',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_16',
            'en' => 'Draw something ...',
            'ru' => 'Нарисуйте что-нибудь...',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_17',
            'en' => 'Press',
            'ru' => 'Нажмите',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_18',
            'en' => 'Space',
            'ru' => 'Пробел',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_19',
            'en' => 'to start over.',
            'ru' => 'чтобы начать заново.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_20',
            'en' => 'to cancel.',
            'ru' => 'чтобы отменить.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_21',
            'en' => 'Try different colors and symmetries.',
            'ru' => 'Попробуйте различные цвета и симметрии.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_22',
            'en' => 'Switch to full screen mode.',
            'ru' => 'Перейдите в полноэкранный режим.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_paint_23',
            'en' => 'Keep creating ...',
            'ru' => 'Продолжайте творить...',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_collage_title',
            'en' => 'Photoshop Online | Online Photo Editor',
            'ru' => 'Cделать коллаж онлайн | Photoshop Online | Online Photo Editor',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_title',
            'en' => 'Photoshop Online | Online Photo Editor',
            'ru' => 'Фотошоп бесплатно на русском онлайн с эффектами | Photoshop Online | Online Photo Editor',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_descr',
            'en' => 'Photoshop online with effects',
            'ru' => 'Фотошоп онлайн с эффектами',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_meta',
            'en' => 'Photoshop online with effects, Photoshop free with effects',
            'ru' => 'Фотошоп онлайн с эффектами, Фотошоп бесплатно на русском онлайн с эффектами',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_1',
            'en' => 'Layers',
            'ru' => 'Слои',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_2',
            'en' => 'There are no layers yet.',
            'ru' => 'Пока нет слоев.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_3',
            'en' => 'History',
            'ru' => 'История',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_4',
            'en' => 'The story is empty.',
            'ru' => 'История пуста.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_5',
            'en' => 'HOME',
            'ru' => 'ГЛАВНАЯ',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_6',
            'en' => 'TEXT',
            'ru' => 'ТЕКСТ',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_7',
            'en' => 'BRUSHES',
            'ru' => 'КИСТИ',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_8',
            'en' => 'FILTERS',
            'ru' => 'ФИЛЬТРЫ',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_9',
            'en' => 'FIGURES',
            'ru' => 'ФИГУРЫ',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_10',
            'en' => 'STICKERS',
            'ru' => 'СТИКЕРЫ',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_11',
            'en' => 'The main',
            'ru' => 'Главные',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_12',
            'en' => 'Pruning',
            'ru' => 'Обрезка',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_13',
            'en' => 'Width',
            'ru' => 'Ширина',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_14',
            'en' => 'Height',
            'ru' => 'Высота',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_15',
            'en' => 'Cancel',
            'ru' => 'Отменить',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_16',
            'en' => 'Trim',
            'ru' => 'Обрезать',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_17',
            'en' => 'Rotation',
            'ru' => 'Вращение',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_18',
            'en' => 'Cancel',
            'ru' => 'Отменить',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_19',
            'en' => 'Ready',
            'ru' => 'Готово',
        ]);

        Localization::updateOrCreate([
            'origin' => 'redactor_editor_20',
            'en' => 'Size',
            'ru' => 'Размер',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_21',
            'en' => 'The actual',
            'ru' => 'Фоктическое',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_22',
            'en' => 'close',
            'ru' => 'закрыть',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_23',
            'en' => 'resize',
            'ru' => 'изменить размер',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_24',
            'en' => 'Circle',
            'ru' => 'Окружность',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_25',
            'en' => 'Radius',
            'ru' => 'Радиус',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_26',
            'en' => 'Ready',
            'ru' => 'Готово',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_27',
            'en' => 'Colour',
            'ru' => 'Цвет',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_28',
            'en' => 'Background color',
            'ru' => 'Цвет фона',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_29',
            'en' => 'To combine',
            'ru' => 'Объеденить',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_30',
            'en' => 'Choose a font',
            'ru' => 'Выбрать шрифт',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_31',
            'en' => 'Text',
            'ru' => 'Текст',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_32',
            'en' => 'Transparency',
            'ru' => 'Прозрачность',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_33',
            'en' => 'Font size',
            'ru' => 'Размер шрифта',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_34',
            'en' => 'Colour',
            'ru' => 'Цвет',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_35',
            'en' => 'Background',
            'ru' => 'Фон',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_36',
            'en' => 'No lines',
            'ru' => 'Без линий',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_37',
            'en' => 'String height',
            'ru' => 'Высота строки',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_38',
            'en' => 'Line height',
            'ru' => 'Высота по линии',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_39',
            'en' => 'Select brush',
            'ru' => 'Выбрать кисть',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_40',
            'en' => 'Brush',
            'ru' => 'Кисть',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_41',
            'en' => 'Thickness',
            'ru' => 'Толщина',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_42',
            'en' => 'Saturation',
            'ru' => 'Насыщенность',
        ]);

        Localization::updateOrCreate([
            'origin' => 'redactor_editor_45',
            'en' => 'Select filter',
            'ru' => 'Выбать фильтр',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_46',
            'en' => 'Picture',
            'ru' => 'Картинка',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_47',
            'en' => 'Gradient',
            'ru' => 'Градиент',
        ]);

        Localization::updateOrCreate([
            'origin' => 'redactor_editor_49',
            'en' => 'Icons',
            'ru' => 'Иконки',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_50',
            'en' => 'Transparency',
            'ru' => 'Прозрачность',
        ]);

        Localization::updateOrCreate([
            'origin' => 'redactor_editor_52',
            'en' => 'Open',
            'ru' => 'Открыть',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_53',
            'en' => 'In full screen',
            'ru' => 'На весь экран',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_54',
            'en' => 'Original size',
            'ru' => 'Оригинальный размер',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_55',
            'en' => 'Download',
            'ru' => 'Загрузить',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_56',
            'en' => 'Image URL',
            'ru' => 'URL Картинки',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_57',
            'en' => 'Download from computer or gadget',
            'ru' => 'Загрузить с компьютера или гаджета',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_58',
            'en' => 'File name',
            'ru' => 'Имя файла',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_59',
            'en' => 'Quality',
            'ru' => 'Качество',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_60',
            'en' => 'or',
            'ru' => 'или',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_43',
            'en' => 'Save',
            'ru' => 'Сохранить',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_61',
            'en' => '',
            'ru' => '',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_62',
            'en' => 'Create',
            'ru' => 'Создать',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_63',
            'en' => 'Example',
            'ru' => 'Пример',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_64',
            'en' => 'Open',
            'ru' => 'Открыть',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_65',
            'en' => 'Close',
            'ru' => 'Закрыть',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_66',
            'en' => 'Width',
            'ru' => 'Ширина',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_67',
            'en' => 'Height',
            'ru' => 'Высота',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_68',
            'en' => 'Create',
            'ru' => 'Создать',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_69',
            'en' => 'Instructions',
            'ru' => 'Инструкции',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_70',
            'en' => 'Click on the canvas where you want to start the edge of the polygon.',
            'ru' => 'Нажмите на холст, где вы хотите запустить край многоугольника.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_71',
            'en' => 'Drag the mouse pointer.',
            'ru' => 'Перетащите указатель мыши.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_72',
            'en' => 'Click again where you want to end the edge.',
            'ru' => 'Нажмите еще раз, где вы хотите закончить край.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_73',
            'en' => 'Repeat to add more edges.',
            'ru' => 'Повторите, чтобы добавить больше ребер.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_74',
            'en' => 'Click anywhere outside of the canvas to finish.',
            'ru' => 'Щелкните где-нибудь за пределами холста, чтобы закончить.',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_75',
            'en' => 'Download from computer or gadget',
            'ru' => 'Загрузить с компьютера или гаджета',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_76',
            'en' => 'Angle',
            'ru' => 'Градус',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_77',
            'en' => 'Search',
            'ru' => 'Поиск',
        ]);
        Localization::updateOrCreate([
            'origin' => 'redactor_editor_78',
            'en' => 'In percents',
            'ru' => 'В процентах',
        ]);

    }
}
