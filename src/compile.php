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
function make_dir($paths)
{
    if (count($paths) > 0) {
        $dir = implode("/", $paths);
        is_dir($dir) or mkdir($dir, 0777, true);
    }
}

/**
 * テンプレートにデータを渡してテキストファイルを作成する。
 * @param $target_resource
 * @param $output_name
 */
function output_file($target_resource, $output_name)
{
    ob_start();
    $contents = json_decode(file_get_contents($target_resource), true)["contents"];

    include("../resources/template/template.php");

    $full_file_name = "../build/" . $output_name;
    $paths = explode("/", $full_file_name);
    array_pop($paths);
    make_dir($paths);
    file_put_contents($full_file_name, ob_get_contents());

    ob_end_clean();
}

output_file("../resources/data/data.json", "test.md");