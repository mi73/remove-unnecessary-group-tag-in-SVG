<?php
/**
 * remove unnecessary group tag in SVG
 *
 * @access  public
 * @author  Yohei Minami<mi73@me.com>
 * @create  2012/10/15
 * @version 0.0.1
 **/

switch ($argc) {
    case 1:
        echo "Require INPUT_FILE_NAME OUTPUT_FILE_NAME argument.\r\n";
        break;
    case 2:
        echo "Require INPUT_FILE_NAME OUTPUT_FILE_NAME argument.\r\n";
        break;
    default:

        $inputFileName = $argv[1];
        $outputFileName = $argv[2];

        $file = file($inputFileName);

        $g_flag = array();
        $output = "";

        $l = count($file);

        for ($i = 0; $i < $l; $i++) {

            if (preg_match("/<g>/", $file[$i])) {

                $g_flags[] = true;

            } elseif (preg_match("/<g /", $file[$i])) {

                $g_flags[] = false;

                $output .= $file[$i];

            } elseif (preg_match("/<\/g>/", $file[$i])) {

                $flag = array_pop($g_flags);

                if ($flag == false) {
                    $output .= $file[$i];
                }

            } else {
                $output .= $file[$i];
            }

        }

        file_put_contents($outputFileName, $output);
        break;
}
?>