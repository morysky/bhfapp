<?php
/***************************************************************************
 * 
 * Copyright (c) 2016 Baidu.com, Inc. All Rights Reserved
 * 
 **************************************************************************/



/**
 * @file index.php
 * @author yaokun(com@baidu.com)
 * @date 2016/10/11 15:09:07
 * @brief 
 *  
 **/


class Index {

    const TPL = "index";

    public function execute() {

        $arrUserInfo = lib_user::getUserInfo();

        //lib_user::get
        $arrPageData[] = array(
            "data1" => "test",
            "data2" => "mycode",
        );
        Page::assign("pagedata", $arrPageData);

        Page::setTpl(self::TPL);

    }
}

/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
?>
