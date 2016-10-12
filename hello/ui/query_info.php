<?php

class query_info {
    const TPL = "order_submit";

    private static $_arrDbConfig = array(
        "localhost:3308",
        "root",
        "", // passwd
        "tpoint_stat",
    );

    public function execute() {
        $intQueryId = (int)Http_Request::get("query_id", 0);

        $arrCond = array(
            sprintf("query_id=%d", $intQueryId),
        );
        $sql = sprintf("select * from show_money where %s", implode(",", $arrCond));
        $arrDbRes = Storage_Db::query($sql, self::$_arrDbConfig);

        $res = array();
        foreach($arrDbRes as $v) {
            $arrInfo = unserialize($v["info"]);
            $res["order_list"] [] = array(
                "order_id" => $v["order_id"],
                "order_name" => $arrInfo["order_name"],
                "start" => $arrInfo["start"],
                "end" => $arrInfo["end"],
                "money" => $arrInfo["money"],
            );
        }
        $res["query"] = array(
            "query_id" => $intQueryId,
        );
        Page::assign('pagedata', $res);
        Page::setTpl(self::TPL);
    }
}
