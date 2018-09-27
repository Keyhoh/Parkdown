# Parkdown

## Markdown

### table
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
    echo "|No." . ($index + 1) . "|" . $content["key"] . "|" . $content["value"] . "|" . $result . "\n";
}