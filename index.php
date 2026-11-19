<?php
// 1. МАССИВ С ОБЪЯВЛЕНИЯМИ (он у вас уже есть, оставляем как было)
$ads = [
  ['t' => 'Продам велосипед', 'p' => 12800, 'i' => 'img/img1.jpg'],
  ['t' => 'Сдам квартиру',   'p' => 25000, 'i' => 'img/img2.jpg'],
  ['t' => 'iPhone 13',        'p' => 45000, 'i' => 'img/img3.jpg'],
  ['t' => 'Диван',            'p' => 8000,  'i' => 'img/img4.jpg'],
  ['t' => 'Ноутбук Lenovo',   'p' => 30000, 'i' => 'img/img5.jpg'],
  ['t' => 'Коляска детская',  'p' => 5000,  'i' => 'img/img6.jpg'],
  ['t' => 'Гитара',           'p' => 7000,  'i' => 'img/img7.jpg'],
  ['t' => 'Холодильник',      'p' => 15000, 'i' => 'img/img8.jpg'],
  ['t' => 'Кресло офисное',   'p' => 6000,  'i' => 'img/img9.jpg'],
  ['t' => 'Телевизор LG',     'p' => 20000, 'i' => 'img/img10.jpg'],
];

// 2. SEO-НАСТРОЙКИ 
$category = isset($_GET['cat']) ? $_GET['cat'] : 'main';
$seo = [
    'main' => [
        'title' => 'Доска объявлений — подать объявление бесплатно',
        'desc' => 'Удобная доска объявлений. Купить или продать велосипед, квартиру, технику и мебель быстро и без посредников.',
        'h1' => 'Доска объявлений'
    ],
    'velo' => [
        'title' => 'Купить велосипед — объявления о продаже велосипедов',
        'desc' => 'Продажа велосипедов. Новые и б/у. Доступные цены, отличное состояние.',
        'h1' => 'Продажа велосипедов'
    ],
    'flat' => [
        'title' => 'Снять квартиру — объявления об аренде жилья',
        'desc' => 'Аренда квартир без посредников. Долгосрочная и посуточная аренда.',
        'h1' => 'Аренда квартир'
    ],
    'tech' => [
        'title' => 'Купить технику — смартфоны, ноутбуки, ТВ',
        'desc' => 'Объявления о продаже электроники: iPhone, ноутбуки Lenovo, телевизоры LG.',
        'h1' => 'Электроника и техника'
    ],
    'home' => [
        'title' => 'Купить мебель для дома — диваны, кресла, холодильники',
        'desc' => 'Мебель и бытовая техника для дома. Диваны, офисные кресла, холодильники.',
        'h1' => 'Товары для дома'
    ]
];

if (!array_key_exists($category, $seo)) {
    $category = 'main';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<!-- ЗАМЕНА 1: Меняем Title и добавляем Description -->
<title><?= $seo[$category]['title'] ?></title>
<link rel="canonical" href="http://localhost/board/<?= $category == 'main' ? '' : $category ?>" />
<meta name="description" content="<?= $seo[$category]['desc'] ?>">

<style>
body{font-family:Arial,sans-serif;margin:20px;background:#f5f5f5}
h1{text-align:center}
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:16px}
.card{background:#fff;border-radius:8px;padding:12px;box-shadow:0 1px 4px rgba(0,0,0,.1)}
.card img{width:100%;height:180px;object-fit:cover;border-radius:6px}
.card h3{margin:8px 0 4px;font-size:16px}
.card p{margin:0;color:#c00;font-weight:bold}
</style>
</head>
<body>

<!-- ЗАМЕНА 2: Меняем H1 -->
<h1><?= $seo[$category]['h1'] ?></h1>

<!-- ЗАМЕНА 3: Добавляем меню (перелинковку) -->
<nav style="text-align:center; margin-bottom: 20px; font-size: 18px;">
    <a href="index.php">Главная</a> | 
    <a href="index.php?cat=velo">Велосипеды</a> | 
    <a href="index.php?cat=flat">Квартиры</a> | 
    <a href="index.php?cat=tech">Техника</a> | 
    <a href="index.php?cat=home">Для дома</a>
</nav>

<div class="grid">
<?php foreach ($ads as $a): ?>
  <div class="card">
    <!-- ЗАМЕНА 4: Добавляем alt к картинке -->
    <img src="<?= $a['i'] ?>" alt="<?= htmlspecialchars($a['t']) ?> - фото">
    <h3><?= htmlspecialchars($a['t']) ?></h3>
    <p><?= $a['p'] ?> ₽</p>
  </div>
<?php endforeach; ?>
</div>
</body>
</html>