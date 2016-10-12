<?php
/***************************************************************************
 * 
 * Copyright (c) 2016 Baidu.com, Inc. All Rights Reserved
 * 
 **************************************************************************/



/**
 * @file logout.php
 * @author yaokun(com@baidu.com)
 * @date 2016/10/11 16:48:44
 * @brief 
 *  
 **/


class logout {
    public function execute() {
        try {
            if(!lib_user::getUserInfo()) {
                Page::jsonRet(0, "user do not login yet");
                return true;
            }
            session_destroy();
            Page::jsonRet(0, "logout success");
        } catch (Exception $e) {
        }
    }

}



/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
?>
