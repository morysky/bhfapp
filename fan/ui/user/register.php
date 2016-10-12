<?php
/***************************************************************************
 * 
 * Copyright (c) 2016 Baidu.com, Inc. All Rights Reserved
 * 
 **************************************************************************/



/**
 * @file login.php
 * @author yaokun(com@baidu.com)
 * @date 2016/10/11 16:48:44
 * @brief 
 *  
 **/


class register {
    public function execute() {
        $user_name = Http_Request::get("user_name");
        $passwd = Http_Request::get("passwd");
        $res = lib_user::addUser($user_name, $passwd);

        if($res[0] == lib_def::ERR_MYSQL_DUP) {
            Page::jsonRet(lib_def::ERR_MYSQL_DUP, "user_name has been used");
            return true;
        } else {
            Page::jsonRet(0, "success");
            return true;
        }
    }

}



/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
?>
