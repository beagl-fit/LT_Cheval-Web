<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class BaseController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    public function init()
    {
        parent::init();

        // Set the application language based on the session
        $language = Yii::$app->session->get('language', 'en');  // Default to 'en' if not set
        Yii::$app->language = $language;
    }
}
