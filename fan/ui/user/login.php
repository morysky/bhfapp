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


class login {
    public function execute() {
        try {
            session_start(); 
            // check session first
            if (0 < strlen($_SESSION["user_name"])) {
                Page::jsonRet(0, "already login");
                return true;
            }
            $user_name = Http_Request::get("user_name");
            $passwd = Http_Request::get("passwd");


            $res = lib_user::checkPass($user_name, $passwd);
            if(false === $res) {
                // wrong passwd
                throw new Exception("wrong passwd or user_name not exist", lib_def::ERR_PASS_WRONG_PASSWD);
            }

            session_name(lib_def::PASS_NAME);
            $_SESSION["user_name"] = $res["user_name"];
            $_SESSION["user_id"] = $res["user_id"];
            $_SESSION["create_time"] = $res["create_time"];
            Page::jsonRet(0, "success", $_SESSION);
        } catch (Exception $e) {
            Page::jsonRet($e->getCode(), $e->getMessage());
        }
    }

}


/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
?>
