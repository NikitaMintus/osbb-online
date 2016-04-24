<?php
$userID = Yii::$app->user->getId();
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
//                    ['label' => 'Меню администратора', 'options' => ['class' => 'header']],
//                    ['label' => 'Квартиры', 'icon' => 'fa fa-file-code-o', 'url' => ['/flat']],
//                    ['label' => 'Владельцы', 'icon' => 'fa fa-file-code-o', 'url' => ['/owner']],
                        ['label' => 'Главная', 'icon' => 'fa fa-file-code-o', 'url' => ['site/index']],
                        ['label' => 'Расчетные книжки', 'icon' => 'fa fa-file-code-o', 'url' => ['/paybook'],
                        'items' => [
                            ['label' => 'Газ', 'icon' => 'fa fa-file-code-o', 'url' => ['/gas-book']],
                            ['label' => 'Холодная вода и стоки', 'icon' => 'fa fa-file-code-o', 'url' => ['/water-book']],
                            ['label' => 'Отопление и гарячая вода', 'icon' => 'fa fa-file-code-o', 'url' => ['/heating-book']],
                            ['label' => 'Электроэнергия', 'icon' => 'fa fa-file-code-o', 'url' => ['/electricity-book/' ],
                                'items' => [
                                    ['label' => 'Квитанции', 'url' => ['/electricity-book/invoices']],
                                    ['label' => 'Оплата', 'url' => ['/electricity-book/payment' ] ],
                                    ['label' => 'Диаграммы', 'url' => ['/electricity-book/charts' ] ],
                                ],
                            ],
                            ['label' => 'Коммунальные платежи', 'icon' => 'fa fa-file-code-o', 'url' => ['/utilities-book'],
                                'items' => [
                                    ['label' => 'Квитанции', 'url' => ['/utilities-book/invoices']],
                                    ['label' => 'Оплата', 'url' => ['/utilities-book/payment']],
                                ],
                            ],
                        ],
                    ],
//                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
//                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
//                    [
//                        'label' => 'Same tools',
//                        'icon' => 'fa fa-share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'fa fa-circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'fa fa-circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
