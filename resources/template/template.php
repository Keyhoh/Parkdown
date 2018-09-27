# Parkdown

## Markdown

### table
Percentage :
<?php
class ResultSum
{
    static $sum;

    static function summary($content){
        self::$sum += $content["result"] ? 1 : 0;
    }
}

array_walk($contents, "ResultSum::summary");
echo ResultSum::$sum . "/" . count($contents) . "\n";
?>

|index | key | value | result |
|:---|:---|:---| :---: |
<?php
/**
 * Created by PhpStorm.
 * User: Keyhoh
 * Date: 2018/09/27
 * Time: 18:21
 */

foreach ($contents as $index => $content) {
    $result = $content["result"] ? "○" : "×";
    echo "|No." . ($index + 1) . "|" . $content["key"] . "|" . $content["value"] . "|" . $result . "|\n";
}