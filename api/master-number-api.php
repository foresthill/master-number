<?php 
/**
 * 名前（ローマ字）からマスターナンバーを取得するAPI
 */
class MasterNumberApi {
    /**
     *  変換表（アルファベット→数値）
     * */
    protected $alphaNum = array(
        'a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6, 'g' => 7, 'h' => 8, 'i' => 9,
        'j' => 1, 'k' => 2, 'l' => 3, 'm' => 4, 'n' => 5, 'o' => 6, 'p' => 7, 'q' => 8, 'r' => 9,
        's' => 1, 't' => 2, 'u' => 3, 'v' => 4, 'w' => 5, 'x' => 6, 'y' => 7, 'z' => 8
    );

    /**
     * コンストラクタ
     */
    public function __construct() {
        date_default_timezone_set('Asia/Tokyo');
    }
    /**
     * 名前（ローマ字）からマスターナンバーを返却する
     * $name 名前（ローマ字）
     * return $masterNum マスターナンバー
     */
    public function getMasterNumFromName($name) {
        // スペースは取り除く
        $name = ($this)->formatString($name);
        if(ctype_alpha($name)) {
            // ローマ字をすべて小文字に変換する
            $nameLower = strtolower($name);
            // ローマ字（小文字）から合計値を返却する
            $sum = ($this)->calcSumFromName($nameLower);
            // ２桁以上の場合は１桁にして返却
            $masterNum = ($this)->convertNumForOneDigit($sum);
            return $masterNum;
        } else {
            return "error";
        }
    }

    /**
     * 不要なスペースを取り除く
     * $name 名前（スペース有り）
     * return $name 名前（スペース無し）
     */
    private function formatString($name) {
        $name = str_replace(' ', '', $name);    // 半角スペース
        $name = str_replace('　', '', $name);   // 全角スペース
        return $name;
    }

    /**
     * 名前（ローマ字）から合計値を返却する
     * $name 名前（ローマ字）
     * return $sum 合計
     */
    private function calcSumFromName($name) {
        $sum = 0;
        // 文字列を数字に変換して加算
        for($i = 0; $i<strlen($name); $i++) {
            if(array_key_exists($name[$i], ($this)->alphaNum)) {
                $sum += ($this)->alphaNum[$name[$i]];
            }
        }
        return $sum;
    }
    /**
     * ２桁以上の数字を１桁に変換する
     * $num 数字
     * return １桁の数字
     */
    private function convertNumForOneDigit($num) {
        $numStr = strval($num);
        while(strlen($numStr) > 1) {
            $sum = 0;
            for($i = 0; $i<strlen($numStr); $i++) {
                $sum += intval($numStr[$i]);
            }
            $numStr = strval($sum);
        }
        return intval($numStr);
    }
}