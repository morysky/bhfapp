<?php
/***************************************************************************
 * 
 * Copyright (c) 2016 Baidu.com, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
 
/**
 * @file Def.php
 * @author yaokun(com@baidu.com)
 * @date 2016/10/11 18:58:57
 * @brief 
 *  
 **/


class lib_def {
    const PASS_NAME = "hello";

    const DB_USER_INFO = "user_info";

    public static $dbConfig = array(
        "localhost:3308",
        "root",
        "",
        "fan",
    );

    const ERR_PASS_WRONG_PASSWD = 1;

    const ERR_MYSQL_DUP = 1062;
}



/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
?>
