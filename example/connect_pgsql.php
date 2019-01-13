<?php
/**
 * Created by PhpStorm.
 * User: ouarea
 * Date: 2019/1/7
 * Time: 10:29
 */

$connection_string = "host=db port=5432 dbname=project_dev user=postgres password=123456";

$dbconn = pg_connect($connection_string);

if(!$dbconn) {
    exit("数据库连接失败！\n");
}

echo "数据库连接成功！\n";

pg_close($dbconn);