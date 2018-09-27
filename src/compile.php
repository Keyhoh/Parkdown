<?php
/**
 * Created by PhpStorm.
 * User: Keyhoh
 * Date: 2018/09/27
 * Time: 22:01
 */

/**
 * 出力先ディレクトリがなければ作る
 * @param $paths
 */
function makeDir($paths)
{
    if (count($paths) > 0) {
        $dir = implode("/", $paths);
        is_dir($dir) or mkdir($dir, 0777, true);
    }
}

/**
 * テンプレートにデータを渡してテキストファイルを作成する。
 * @param $targetResource
 * @param $outputName
 */
function outputFile($targetResource, $outputName)
{
    ob_start();
    $contents = json_decode(file_get_contents($targetResource), true)["contents"];

    include("../resources/template/template.php");

    $fullFileName = "../build/" . $outputName;
    $paths = explode("/", $fullFileName);
    array_pop($paths);
    makeDir($paths);
    file_put_contents($fullFileName, ob_get_contents());

    ob_end_clean();
}

outputFile("../resources/data/data.json", "test.md");