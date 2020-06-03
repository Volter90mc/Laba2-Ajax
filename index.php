<?php
require "connection.php";
require "inc/projects.php";
require "inc/workers.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Второй Вариант</title>


    <script src="assets/vendors/jquery-3.5.0.min.js"></script>
    <!-- With jQuery -->
    <script src="assets/js/common.js"></script>
    <!-- Without jQuery -->
    <!-- <script src="assets/js/without-jquery.js"></script> -->
</head>
<body>
    <section class="container">
        
        <!-- Первое задание -->
        <h5>Информация о выполненных задачах по выбранному проекту на указанную дату</h5>
        <form id="form1" action="forms/projects.php" class="form-group">
            <select name="project">
                <?php
                    foreach ($projects as $project) {
                        echo "<option value=\"". $project['id'] ."\">". $project['name'] ."</option>";
                    }
                ?>
            </select>
            <input type="date" name="targetDate">
            <input type="button" value="Отправить" onclick="getRes1(this);">
        </form>
        <!--   -->
        <table id="result1" class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Выполненная работа</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>


        <!--  Второе задание  -->
        <h5>Общее время работы над выбранным проектом.</h5>
        <form id="form2" action="forms/project-time.php" class="form-group">
            <select name="project">
                <?php
                foreach ($projects as $project) {
                    echo "<option value=\"". $project['id'] ."\">". $project['name'] ."</option>";
                }
                ?>
            </select>
            <input type="button" value="Отправить" onclick="getRes2(this)">
        </form>
        <table id="result2" class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Общее время</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <!--    -->

        <!--  Третье задание  -->
        <h5>Число сотрудников отдела выбранного руководителя.</h5>
        <form id="form3" action="forms/workers.php" class="form-group">
            <select name="chief">
                <?php
                foreach ($workers as $worker) {
                    echo "<option value=\"". $worker['id'] ."\">". $worker['name'] ."</option>";
                }
                ?>
            </select>
            <input type="button" value="Отправить" onclick="getRes3(this)">
        </form>
        <table id="result3" class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Количество сотрудников</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <!--  -->
    </section>
</body>
</html>