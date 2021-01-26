<?php
include 'rii/init.php';

use Rii\Core\Application;
use Rii\Core\Page;

$app = Application::getInstance();
Application::header();
Page::getInstance()->setProperty('Title', "ELCAR24"); ?>

<?php $app->includeComponent("rii:element.list", "services", ['data_file' => '/rii/db/services.json']); ?>

<?php $app->includeComponent("rii:element.list", "advantages", ['data_file' => '/rii/db/advantages.json']); ?>

    <section class="s-section section-gradient">
        <div class="container">
            <div class="block--form block-mini">
                <h2>Получить бесплатную консультацию</h2>
                <? $app->includeComponent("rii:interfaceform", "default", [
                    'additional_class' => 'form--wrapp', //классы на контейнер формы
                    'attr' => [  //доп атрибуты
                        'id' => 'section-gradient-form',
                    ],
                    'elements' => [
                        [
                            'type' => 'text',
                            'name' => 'customerName',
                            'attr' => [ //доп атрибуты
                                'id' => 'customerName',
                            ],
                            'default' => 'Ваше имя',
                        ], [
                            'type' => 'text',
                            'name' => 'customerNumber',
                            'attr' => [
                                'id' => 'customerNumber'
                            ],
                            'default' => 'Ваш номер',
                        ], [
                            'type' => 'submit',
                            'attr' => [
                                'class' => 'submit'
                            ],
                            'value' => 'Заказать звонок'
                        ]
                    ]
                ]); ?>
                <div class="description">*Нажимая на кнопку «Заказать звонок», я даю согласие на обработку персональных
                    данных
                </div>
            </div>
        </div>
    </section>

<?php $app->includeComponent("rii:element.list", "service_cost", ['data_file' => '/rii/db/service_cost.json']); ?>

<?php $app->includeComponent("rii:element.list", "know", ['data_file' => '/rii/db/know.json']); ?>

<?php $app->includeComponent("rii:element.list", "reviews", ['data_file' => '/rii/db/reviews.json']); ?>

<?php $app->includeComponent("rii:element.list", "brands", ['data_file' => '/rii/db/brands.json']); ?>

    <section class="s-section section-orange">
        <div class="container">
            <div class="block--form">
                <h2>Остались вопросы?</h2>
                <? $app->includeComponent("rii:interfaceform", "default", [
                    'additional_class' => 'form--wrapp', //классы на контейнер формы
                    'attr' => [  //доп атрибуты
                        'id' => 'section-orange-form',
                    ],
                    'elements' => [
                        [
                            'type' => 'text',
                            'name' => 'customerName',
                            'attr' => [ //доп атрибуты
                                'id' => 'customerName',
                            ],
                            'default' => 'Ваше имя',
                        ], [
                            'type' => 'text',
                            'name' => 'customerNumber',
                            'attr' => [
                                'id' => 'customerNumber'
                            ],
                            'default' => 'Ваш номер',
                        ], [
                            'type' => 'submit',
                            'attr' => [
                                'class' => 'submit'
                            ],
                            'value' => 'Заказать звонок'
                        ]
                    ]
                ]); ?>
                <div class="description">*Нажимая на кнопку «Заказать звонок», я даю согласие на обработку персональных
                    данных
                </div>
            </div>
        </div>
    </section>

    <div class="pop-up--list">
        <div class="modal"></div>

        <div class="pop-up--item" data-block="call-back">
            <button class="pop-up--close js-popup-close"></button>
            <div class="content">
                <h2>Заказать звонок</h2>
                <? $app->includeComponent("rii:interfaceform", "default", [
                    'additional_class' => 'form--wrapp',
                    'attr' => [
                        'id' => 'pop-up-form',
                    ],
                    'elements' => [
                        [
                            'title' => 'Ваше имя',
                            'type' => 'text',
                            'name' => 'customerName',
                            'attr' => [ //доп атрибуты
                                'id' => 'customerName',
                            ],
                            'wrap' => ['additional_class' => 'block--input'],
                            'default' => 'Введите имя',
                        ], [
                            'title' => 'Ваш телефон',
                            'type' => 'text',
                            'name' => 'customerNumber',
                            'attr' => [
                                'id' => 'customerNumber'
                            ],
                            'wrap' => ['additional_class' => 'block--input'],
                            'default' => 'Введите телефон',
                        ], [
                            'type' => 'submit',
                            'attr' => [
                                'class' => 'submit pop-up--button'
                            ],
                            'value' => 'Заказать звонок'
                        ]
                    ]
                ]); ?>
            </div>
        </div>

        <div class="pop-up--item pop-up--accepted" data-block="accepted">
            <button class="pop-up--close js-popup-close"></button>
            <div class="content">
                <h2>Заявка принята</h2>
                <div id="messagePlace"></div>
                <button class="pop-up--button js-popup-close">Понятно</button>
            </div>
        </div>

        <div class="pop-up--item pop-up--error" data-block="error">
            <button class="pop-up--close js-popup-close"></button>
            <div class="content">
                <h2>Ошибка</h2>
                <div id="nameError"></div>
                <div id="numberError"></div>
                <button class="pop-up--button js-popup-close">Повторить</button>
            </div>
        </div>

    </div>

<? Application::footer(); ?>