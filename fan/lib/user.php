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


class lib_user {
    const DB_USER_INFO = "user_info";

    public static function encrypt_passwd($passwd) {
        return md5($passwd);
    }

    public static function getUserInfo() {
        session_start();
        if(empty($_SESSION)) {
            return false;
        }
        return $_SESSION;
    }

    public static function checkPass($user_name, $passwd) {
        $sql = sprintf("select * from %s where user_name = '%s'", lib_def::DB_USER_INFO, $user_name);
        $res = Storage_Db::query($sql, lib_def::$dbConfig);
        if(false === $res || empty($res)) {
            // not exist
            return false;
        } else {
            $real_passwd = $res[0]["passwd"];
            if($real_passwd === lib_user::encrypt_passwd($passwd)) {
                return $res[0];
            } else {
                return false;
            }
        }
    }

    public static function addUser($user_name, $passwd) {
        $arrField = array(
            "user_name",
            "passwd",
            "create_time",
            "op_time",
        );
        $arrData = array(
            sprintf("'%s'", $user_name),
            sprintf("'%s'", self::encrypt_passwd($passwd)),
            time(),
            time(),
        );
        $sql = sprintf("insert into %s (%s) values (%s)", lib_def::DB_USER_INFO, implode(",", $arrField), implode(",", $arrData));
        $res = Storage_Db::query($sql, lib_def::$dbConfig);
        if(false === $res) {
            $arrError = Storage_Db::getError(lib_def::$dbConfig);
            return $arrError;
        } else {
            return array(0, "success");
        }
    }


}



/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
?>
