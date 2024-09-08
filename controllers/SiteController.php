<?php

namespace app\controllers;

use app\models\Carousel;
use app\models\Horse;
use app\models\News;
use app\models\Race;
use app\models\Gallery;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class SiteController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
//            'captcha' => [
//                'class' => 'yii\captcha\CaptchaAction',
//                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
//            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $currentLanguage = Yii::$app->language;
        $news = News::find()
            ->select(['image_name', 'header_' . $currentLanguage, 'body_' . $currentLanguage, 'url'])
            ->where(['deleted' => false])
            ->orderBy(['id'  => SORT_DESC])
            ->limit(6)
            ->asArray()
            ->all();

        $carousel = Carousel::find()->all();

        return $this->render('index', [
            'news' => $news,
            'carousel' => $carousel,
        ]);
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['administration/index']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['administration/index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    /**
     * Displays racing page.
     *
     * @return string
     */
    public function actionRacing(): string
    {
        $racing = Race::find()
            ->where(['deleted' => false])
            ->orderBy(['date'  => SORT_DESC])
            ->limit(80)
            ->all();

        return $this->render('racing', [
            'racing' => $racing,
        ]);
    }


    /**
     * Displays mares page.
     *
     * @return string
     */
    public function actionMares(): string
    {
        $horses = Horse::find()
            ->select(['name', 'birth', 'father', 'mother', 'father_father', 'father_mother', 'mother_father',
                'mother_mother', 'covered_by', 'foals', 'image_name', 'owner'])
            ->where(['mare' => true, 'deleted' => false])
            ->orderBy(['name' => SORT_ASC])
            ->all();

        return $this->render('mares', [
            'horses' => $horses,
        ]);
    }


    /**
     * Displays foals page.
     *
     * @return string
     */
    public function actionFoals(): string
    {
        $horses = Horse::find()
            ->select(['name', 'birth', 'father', 'mother', 'image_name', 'sex'])
            ->where(['status' => 'foal', 'deleted' => false])
            ->orderBy(['name' => SORT_ASC])
            ->all();

        return $this->render('foals', [
            'horses' => $horses,
        ]);
    }


    /**
     * Displays yearlings page.
     *
     * @return string
     */
    public function actionYearlings(): string
    {
        $horses = Horse::find()
            ->select(['name', 'birth', 'father', 'mother', 'image_name', 'sex', 'url'])
            ->where(['status' => 'yearling', 'deleted' => false])
            ->orderBy(['name' => SORT_ASC])
            ->all();

        return $this->render('yearlings', [
            'horses' => $horses,
        ]);
    }


    /**
     * Displays sale page.
     *
     * @return string
     */
    public function actionSale(): string
    {
        $horses = Horse::find()
            ->select(['name', 'birth', 'father', 'mother', 'image_name', 'sex', 'url'])
            ->where(['deleted' => false, 'for_sale' => true])
            ->orderBy(['name' => SORT_ASC])
            ->all();

        return $this->render('sale', [
            'horses' => $horses,
        ]);
    }


    /**
     * Displays sale page.
     *
     * @return string
     */
    public function actionGallery(): string
    {
        $gallery = Gallery::find()
            ->where(['deleted' => false])
            ->all();

        return $this->render('gallery', [
            'gallery' => $gallery,
        ]);
    }


    /**
     * Displays views for webpages which do not require DB access.
     *
     * @param $page
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionPage($page): string
    {
        if (file_exists(Yii::getAlias('@app/views/site/' . $page . '.php'))) {
            return $this->render($page);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * Changes language of the website.
     *
     * @return Response
     */
    public function actionChangeLanguage(): Response
    {
        $language = Yii::$app->request->post('language');  // Get the selected language from the POST request
        if (in_array($language, ['en', 'fr', 'cs'])) {
            Yii::$app->language = $language;
            Yii::$app->session->set('language', $language);  // Save language in session
        }

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

}
