<?php
/***************************************************************************
 * 
 * Copyright (c) 2016 Baidu.com, Inc. All Rights Reserved
 * 
 **************************************************************************/



/**
 * @file index.php
 * @author yaokun(com@baidu.com)
 * @date 2016/08/12 16:35:29
 * @brief 
 *  
 **/

class index {

    private static $_arrDbConfig = array(
        "localhost:3308",
        "root",
        "", // passwd
        "tpoint_stat",
    );

    public function execute() {
        echo "test";
        exit;
        $arrData = array();
        Storage_File::read2array("/home/users/yaokun/netdisk/web/app/hello/ui/total_data_neibu.log", $arrData);
        $arrInsert = array();
        foreach($arrData as $data) {
            $data = explode("\t", $data);
            $insert_str = sprintf("('%s', '%s', '%s', '%s', %d, %d)", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
            $arrInsert [] = $insert_str;
        }
        $sql = sprintf("insert into temp_excel (date, client, page, loc, qingqiu, baoguang) VALUES%s", implode(",", $arrInsert));
        $arrDbRes = Storage_Db::query($sql, self::$_arrDbConfig);
        return true;
    }
}




/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
?>
