<?php
namespace app\controllers;

use app\models\Gallery;
use app\models\GalleryForm;
use app\models\Horse;
use app\models\HorseForm;
use app\models\NewsForm;
use app\models\CarouselUpdateForm;
use app\models\Carousel;
use app\models\News;
use app\models\Race;
use app\models\RaceForm;
use yii\web\UploadedFile;
use Yii;

class AdministrationController extends BaseController
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }


        return $this->render('index');
    }

    public function actionUpdateCarousel()
    {
        $carouselModel = new CarouselUpdateForm();
        $carouselItems = Carousel::find()->all();

        if ($carouselModel->load(Yii::$app->request->post()) && $carouselModel->validate()) {
            // Handle carousel image update
            $carouselModel->imageFile = UploadedFile::getInstance($carouselModel, 'imageFile');
            $carouselImage = Carousel::findOne($carouselModel->imageId);

            if ($carouselImage && $carouselModel->imageFile) {
                $uploadPath = Yii::getAlias('@webroot/images/carousel/');
                $newImageName = uniqid() . '.' . $carouselModel->imageFile->extension;
                $filePath = $uploadPath . $newImageName;

                if ($carouselModel->imageFile->saveAs($filePath)) {
                    // Remove old image
                    $oldImageName = $carouselImage->image_name;
                    $oldFilePath = $uploadPath . $oldImageName;
                    if ($oldImageName && file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }

                    // Update database
                    $carouselImage->image_name = $newImageName;
                    $carouselImage->save();

                    Yii::$app->session->setFlash('success', 'Carousel image updated successfully.');
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to save the new image.');
                }
            }

            return $this->refresh();
        }

        return $this->render('update-carousel', [
            'carouselModel' => $carouselModel,
            'carouselItems' => $carouselItems,
        ]);
    }

    public function actionCreateNews()
    {
        $newsCreateModel = new NewsForm();

        if ($newsCreateModel->load(Yii::$app->request->post()) && $newsCreateModel->validate()) {
            $newsItem = new News();
            $newsItem->header_cs = $newsCreateModel->header_cs;
            $newsItem->body_cs = $newsCreateModel->body_cs;
            $newsItem->header_en = $newsCreateModel->header_en;
            $newsItem->body_en = $newsCreateModel->body_en;
            $newsItem->header_fr = $newsCreateModel->header_fr;
            $newsItem->body_fr = $newsCreateModel->body_fr;
            $newsItem->url = $newsCreateModel->url;

            // Handle image upload
            $newsCreateModel->imageFile = UploadedFile::getInstance($newsCreateModel, 'imageFile');
            if ($newsCreateModel->imageFile) {
                $uploadPath = Yii::getAlias('@webroot/images/news/');
                $newImageName = uniqid() . '.' . $newsCreateModel->imageFile->extension;
                $filePath = $uploadPath . $newImageName;

                if ($newsCreateModel->imageFile->saveAs($filePath)) {
                    // Set image name
                    $newsItem->image_name = $newImageName;
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to save the new image.');
                }
            }

            $newsItem->save();
            Yii::$app->session->setFlash('success', 'News created successfully.');
            return $this->refresh();
        }

        return $this->render('create-news', [
            'newsCreateModel' => $newsCreateModel,
        ]);
    }

    public function actionUpdateNews()
    {

        $newsUpdateModel = new NewsForm();

//         Handle form submissions
        if (Yii::$app->request->isPost) {
            // Handle news update
            if ($newsUpdateModel->load(Yii::$app->request->post()) && $newsUpdateModel->validate()) {
                $newsItem = News::findOne($newsUpdateModel->id);

                if ($newsItem) {
                    // Update fields
                    $newsItem->header_cs = $newsUpdateModel->header_cs;
                    $newsItem->body_cs = $newsUpdateModel->body_cs;
                    $newsItem->header_en = $newsUpdateModel->header_en;
                    $newsItem->body_en = $newsUpdateModel->body_en;
                    $newsItem->header_fr = $newsUpdateModel->header_fr;
                    $newsItem->body_fr = $newsUpdateModel->body_fr;
                    $newsItem->url = $newsUpdateModel->url;
                    $newsItem->deleted = $newsUpdateModel->deleted;

                    $newsItem->save();
                    Yii::$app->session->setFlash('success', 'News updated successfully.');
                }

                return $this->refresh();
            }
        }

        $newsItems = News::find()
            ->where(['deleted' => false])
            ->orderBy(['id' => SORT_DESC])
            ->limit(6)
            ->all();

        return $this->render('update-news', [
            'newsUpdateModel' => $newsUpdateModel,
            'newsItems' => $newsItems,
        ]);
    }

    public function actionCreateRace()
    {
        $model = new RaceForm();


        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $item = new Race();
            $item->date = $model->date;
            $item->state = $model->state;
            $item->length = $model->length;
            $item->horse = $model->horse;
            $item->url = $model->url;

            $item->save();
            Yii::$app->session->setFlash('success', 'Race created successfully.');
            return $this->refresh();
        }

        return $this->render('create-race', [
            'model' => $model,
        ]);
    }

    public function actionCreateHorse()
    {
        $model = new HorseForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $item = new Horse();
            $item->name = $model->name;
            $item->birth = $model->birth;
            if (!empty($model->owner))
                $item->owner = $model->owner;
            if (!empty($model->status))
                $item->status = $model->status;
            $item->mare = $model->mare;
            $item->father = $model->father;
            $item->mother = $model->mother;
            $item->father_father = $model->father_father;
            $item->father_mother = $model->father_mother;
            $item->mother_father = $model->mother_father;
            $item->mother_mother = $model->mother_mother;
            $item->for_sale = $model->for_sale;
            $item->url = $model->url;
            $item->foals = $model->foals;
            $item->covered_by = $model->covered_by;
            $item->sex = $model->sex;

            // Handle image upload
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->imageFile) {
                $uploadPath = Yii::getAlias('@webroot/images/horses/');
                $newImageName = uniqid() . '.' . $model->imageFile->extension;
                $filePath = $uploadPath . $newImageName;

                if ($model->imageFile->saveAs($filePath)) {
                    $item->image_name = $newImageName;
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to save the new image.');
                }
            }

            $item->save();
            Yii::$app->session->setFlash('success', 'Horse created successfully.');
            return $this->refresh();
        }

        return $this->render('create-horse', [
            'model' => $model,
        ]);
    }

    public function actionCreateGallery()
    {
        $model = new GalleryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $item = new Gallery();
            if (!empty($model->author))
                $item->author = $model->author;

            // Handle image upload
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->imageFile) {
                $uploadPath = Yii::getAlias('@webroot/images/gallery/');
                $newImageName = uniqid() . '.' . $model->imageFile->extension;
                $filePath = $uploadPath . $newImageName;

                if ($model->imageFile->saveAs($filePath)) {
                    $item->image_name = $newImageName;
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to save the new image.');
                }
            }

            $item->save();
            Yii::$app->session->setFlash('success', 'Horse created successfully.');
            return $this->refresh();
        }

        return $this->render('create-gallery', [
            'model' => $model,
        ]);
    }

    public function actionUpdateRace()
    {

        $model = new RaceForm();

//         Handle form submissions
        if (Yii::$app->request->isPost) {
            // Handle news update
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $items = Race::findOne($model->id);

                if ($items) {
                    // Update fields
                    $items->date = $model->date;
                    $items->length = $model->length;
                    $items->state = $model->state;
                    $items->horse = $model->horse;
                    $items->url = $model->url;
                    $items->deleted = $model->deleted;

                    $items->save();
                    Yii::$app->session->setFlash('success', 'Race updated successfully.');
                }

                return $this->refresh();
            }
        }

        $items = Race::find()
            ->where(['deleted' => false])
            ->orderBy(['id' => SORT_DESC])
            ->all();

        return $this->render('update-race', [
            'model' => $model,
            'items' => $items,
        ]);
    }

    public function actionUpdateGallery()
    {
        $model = new GalleryForm();
        $items = Gallery::find()
            ->where(['deleted' => false])
            ->all();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $galleryImage = Gallery::findOne($model->id);

            if ($galleryImage) {
                // Update database
                if(!empty($model->author))
                    $galleryImage->author = $model->author;

                if(!empty($model->deleted))
                    $galleryImage->deleted = $model->deleted;

                $galleryImage->save();

                Yii::$app->session->setFlash('success', 'Carousel image updated successfully.');
            } else {
                Yii::$app->session->setFlash('error', 'Failed to save the new image.');
            }

            return $this->refresh();
        }


        return $this->render('update-gallery', [
            'model' => $model,
            'items' => $items,
        ]);
    }

    public function actionUpdateHorse()
    {
        $model = new HorseForm();
        $items = Horse::find()
            ->where(['deleted' => false])
            ->select(['id', 'name'])
            ->all();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $item = Horse::findOne($model->id);
            $item->name = $model->name;
            $item->birth = $model->birth;
            if (!empty($model->owner))
                $item->owner = $model->owner;
            $item->status = $model->status;
            $item->mare = $model->mare;
            $item->father = $model->father;
            $item->mother = $model->mother;
            $item->father_father = $model->father_father;
            $item->father_mother = $model->father_mother;
            $item->mother_father = $model->mother_father;
            $item->mother_mother = $model->mother_mother;
            $item->for_sale = $model->for_sale;
            $item->url = $model->url;
            $item->foals = $model->foals;
            $item->covered_by = $model->covered_by;
            $item->sex = $model->sex;
            $item->deleted = $model->deleted;

            // Handle image upload
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->imageFile) {
                $uploadPath = Yii::getAlias('@webroot/images/horses/');
                $newImageName = uniqid() . '.' . $model->imageFile->extension;
                $filePath = $uploadPath . $newImageName;

                if ($model->imageFile->saveAs($filePath)) {
                    $oldImageName = $item->image_name;
                    $oldFilePath = $uploadPath . $oldImageName;
                    if ($oldImageName && file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }

                    $item->image_name = $newImageName;
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to save the new image.');
                }
            }

            $item->save();
            Yii::$app->session->setFlash('success', 'Horse updated successfully.');
            return $this->refresh();
        }


        return $this->render('update-horse', [
            'model' => $model,
            'items' => $items,
        ]);
    }

    public function actionGetHorseDetails()
    {
        $id = Yii::$app->request->get('id');
        $horse = Horse::findOne($id);

        if ($horse) {
            return $this->asJson([
                'name' => $horse->name,
                'birth' => $horse->birth,
                'father' => $horse->father,
                'mother' => $horse->mother,
                'father_father' => $horse->father_father,
                'father_mother' => $horse->father_mother,
                'mother_father' => $horse->mother_father,
                'mother_mother' => $horse->mother_mother,
                'sex' => $horse->sex,
                'status' => $horse->status,
                'mare' => (bool)$horse->mare,
                'for_sale' => (bool)$horse->for_sale,
                'url' => $horse->url,
                'foals' => $horse->foals,
                'covered_by' => $horse->covered_by,
                'owner' => $horse->owner,
                'deleted' => (bool)$horse->deleted,
                'image_name' => $horse->image_name,
            ]);
        }

        return $this->asJson([]);
    }



}
