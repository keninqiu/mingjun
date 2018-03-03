<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\services\DatabaseUtil;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        $dbUtil = new DatabaseUtil();
        $dbUtil->importFromSct();
        /*
        $products = $dbUtil->getProducts(["all" => true]);
        foreach($products as $product) {
            $id = $product["id"];
            $title = $product["title"];

            if(!$title) {
                if($id!=1120) {
                    break;
                }
                echo "id=$id\n";
            	$dbUtil->reloadProductFromSct($id);
            }
            
        } 
        */       
    }
}
