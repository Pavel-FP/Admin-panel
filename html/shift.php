<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
    rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bondage Gay Website - Смена</title>
    <link rel="stylesheet" href="../css/shift.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../img/logo.png">
                    <h2 class="text-muted">TOR<span class="danger">TOTORO</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons">close</span>
                </div>
            </div>

            <div class="sidebar">
                <a href="../html/test.php">
                    <span class="material-icons-outlined">dashboard</span>
                    <h3>Главная</h3>
                </a>
                <?php
                $_SESSION['role'] = $_COOKIE['role'];
                if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'waiter')
                {
                    echo '<a href="../html/shift.php" class="active">
                    <span class="material-icons-outlined">add</span>
                    <h3>Текущая смена</h3>
                    </a>';
                }
                else { echo '';}
                ?>
                
                <?php 
                if ($_SESSION['role'] == 'admin')
                {
                    echo '<a href="../html/users.php">
                    <span class="material-icons-outlined">person_add</span>
                    <h3>Пользователи</h3>
                    </a>';
                }
                else { echo '';}
                ?>
                <a href="../html/shopping_cart.php">
                    <span class="material-icons-outlined">shopping_cart</span>
                    <h3>Заказы</h3>
                </a>
                <a href="../html/options.php">
                    <span class="material-icons-outlined">settings</span>
                    <h3>Настройки</h3>
                </a>
                <a href="#">
                    <span class="material-icons-outlined">logout</span>
                    <h3>Выйти</h3>
                </a>
            </div>
        </aside>
        
        <main>
            <h1>Текущая смена</h1>
            <div class="current-shift">
                <div class="shift">
                    <div class="open">
                        <h2 class="information-center">Информация</h2>
                        <div class="double_open">
                            <span class="text-muted">Открыта</span>
                            <p id="lastTime">00:00</p>
                            <span class="material-icons-outlined">schedule</span>
                            <div id="time">
                                <span class="digit" id="hr">
                                    00</span>
                                <span class="txt">:</span>
                                <span class="digit" id="min">
                                    00</span>
                                <span class="txt">:</span>
                                <span class="digit" id="sec">
                                    00</span>
                            </div>
                        </div>
                        <div class="cashier">
                            <span class="text-muted">Кассир</span>
                            <p>Мария Петрова</p>
                        </div>
                        <div class="cash-in">
                            <span class="cash">В кассе</span>
                            <p>12 341,72 руб.</p>
                        </div>
                        <div class="sales-shift">
                            <div class="sales-num">
                                <p>Продажи</p><p>18 910,63</p>
                            </div>
                            <div class="profit">
                                <p>Выручка</p><p>18 910,63</p>
                            </div>
                            <div class="additional">
                                <p>Изъятия</p><p>130,00</p>
                            </div>
                        </div>
                    </div>
                    <div class="shift-btn-main">
                        <button id="start" class="shift-button" onclick="change()">Открыть смену</button>
                        <a href="#">
                            <span class="material-icons-outlined">refresh</span>
                            <h3>Возврат товара</h3>
                        <a href="#">
                            <span class="material-icons-outlined">add</span>
                            <h3>Внесение</h3>
                        <a href="#">
                            <span class="material-icons-outlined">remove</span>
                            <h3>Изъятие</h3>
                        <a href="#">
                            <span class="material-icons-outlined">calculate</span>
                            <h3>Корректировка</h3>
                        <a href="#">
                            <span class="material-icons-outlined">description</span>
                            <h3>Отчеты</h3>
                    </div>
                </div>
            </div>

        </main>
        <?php
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli = new mysqli('localhost', 'root', '', 'reg_user');
        $usercookie = $_COOKIE['user'];
        $query = "SELECT `id`,`login`,`email`, `phone`, `img`, `role` FROM `polzovateli` WHERE `login`= '$usercookie'";
        $result = $mysqli->query($query);
        $num_results = $result->fetch_assoc();
        ?>
        <div id="loading" style="display: none">Идёт загрузка...</div>
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-outlined">menu</span>
                </button>
                <div class="profile">
                    <div class="info">
                        <p>Йупи йо, <b><?php echo $num_results['login']?></b></p>
                        <small class="text-muted"><?php echo $num_results['role']?></small>
                    </div>
                    <div class="profile-photo">
                        <img src="<?php echo $num_results['img']?>">
                    </div>
                </div>
            </div>
            

            <div class="recent-updates">
                <h2>Recent Updates</h2>
                <div class="updates">
                <?php
  date_default_timezone_set('Asia/Novosibirsk');
  $date = date("Y-m-d H:i:s");
  $mysqli = new mysqli('localhost', 'root', '', 'reg_user');
	$result = $mysqli -> query("SELECT COUNT(*) as count FROM `log`");
  $result = $result->fetch_assoc();
	$numms = $result['count'];
  $loguser = $result['id'];

	for ($i=1; $i < 4; $i++) {
		$result_comment = $mysqli -> query("SELECT `login`, img, textLog, TIMESTAMPDIFF(MINUTE, `date`, '$date') AS date_diff FROM `log` INNER JOIN polzovateli ON polzovateli.id=log.user_id WHERE log.id = '$numms'");
		$numms = $numms - 1;

		foreach ($result_comment as $key) {
		echo
		'
			<div class="update">
            	<div class="profile-photo">
                	<img src="'.$key['img'].'" alt="" />
            	</div>
            	<div class="message">
                	<p><b>'. $key['login'] .'</b> '.$key['textLog'].'</p>
                	<small class="text-muted">'. $key['date_diff']." Minutes Ago" .'</small>
            	</div>
           	</div>
		';
		}
	}
?>
                </div>
            </div>

            <div class="sales-analytics">
                <h2>Sales Analytics</h2>
                <div class="item online">
                    <div class="icon">
                        <span class="material-icons-outlined">shopping_cart</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>ОНЛАЙН ЗАКАЗЫ</h3>
                            <small class="text-muted">за последние 24 часа</small>
                        </div>
                        <h5 class="success">+39%</h5>
                        <h3>3849</h3>
                    </div>
                </div>
                <div class="item offline">
                    <div class="icon">
                        <span class="material-icons-outlined">shopping_cart</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>ОФФЛАЙН ЗАКАЗЫ</h3>
                            <small class="text-muted">за последние 24 часа</small>
                        </div>
                        <h5 class="danger">-17%</h5>
                        <h3>1100</h3>
                    </div>
                </div>
                <div class="item customers">
                    <div class="icon">
                        <span class="material-icons-outlined">person</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>НОВЫЕ ПОКУПАТЕЛИ</h3>
                            <small class="text-muted">за последние 24 часа</small>
                        </div>
                        <h5 class="success">+25%</h5>
                        <h3>849</h3>
                    </div>
                </div>
                <div class="item add-product">
                    <div>
                        <span class="material-icons-outlined">add</span>
                        <h3>Add Product</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/index.js"></script>
</body>
<script type="text/javascript" src="../js/shift.js"></script>
</html>