<?php
/**
 * Created by PhpStorm.
 * User: nikitaignatenkov
 * Date: 19/04/2018
 * Time: 17:17
 */

namespace ignatenkovnikita\request;


use ignatenkovnikita\request\models\RawRequest;
use yii\base\BootstrapInterface;
use yii\base\Controller;
use yii\base\Event;

class Module extends \yii\base\Module implements BootstrapInterface
{
    public $controllerNamespace = 'ignatenkovnikita\request\controllers';


    public function bootstrap($app)
    {
//        var_dump(123);
//        die();
//        Event::on(Controller::className(), Controller::EVENT_BEFORE_ACTION, function ($event) {
//            RawRequest::create(file_get_contents('php://input'));
//        });

        // TODO: Implement bootstrap() method.
    }
}