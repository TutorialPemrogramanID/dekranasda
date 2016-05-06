<?php

namespace app\controllers;

use Yii;
use app\models\Anggota;
use app\models\AnggotaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Kabupaten;
use app\models\Kecamatan;
use yii\web\Response;

/**
 * RegisterController implements the CRUD actions for Anggota model.
 */
class RegisterController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Anggota models.
     * @return mixed
     */
    /*public function actionIndex()
    {
        $searchModel = new AnggotaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/

    /**
     * Displays a single Anggota model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Anggota model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Anggota();



            //upload file jika SK
             // if(UploadedFile::getInstance($model, 'logo')){
             //   $model->logo = UploadedFile::getInstance($model, 'logo');
             //   move_uploaded_file($model->logo->tempName, Yii::getAlias('@webroot') . '/uploads/logo/'. $model->logo->baseName . '.'.$model->logo->extension);
             //   $model->logo =  $model->logo->baseName . '.' . $model->logo->extension;
             // }


            if ($model->load(Yii::$app->request->post())) {

            $model->image = UploadedFile::getInstances($model,'image');

            foreach ($model->image as $file) {

                $model1 = new Anggota();
                $file->saveAs("uploads/".$file->baseName.".".$file->extension);
                $model1->nama              = $_POST['Anggota']['nama'];
                $model1->email             = $_POST['Anggota']['email'];
                $model1->no_tlp            = $_POST['Anggota']['no_tlp'];
                $model1->no_ktp            = $_POST['Anggota']['no_ktp'];
                $model1->wilayah           = $_POST['Anggota']['wilayah'];
                $model1->alamat            = $_POST['Anggota']['alamat'];
                $model1->jenis_pendaftaran = $_POST['Anggota']['jenis_pendaftaran'];
                $model1->bahan_baku        = $_POST['Anggota']['bahan_baku'];
                $model1->id_provinsi       = $_POST['Anggota']['id_provinsi'];
                $model1->id_kota           = $_POST['Anggota']['id_kota'];
                $model1->id_kecamatan      = $_POST['Anggota']['id_kecamatan'];


                $model1->image = $file->baseName. '.' .$file->extension;

                $model1->save();
            }
            return $this->redirect(['index']);
         
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Anggota model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Anggota model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Anggota model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Anggota the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Anggota::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    //Dedrop
    //
    public function actionKabupaten() {

        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $provinsi = $parents[0];
                $out = Kabupaten::find()->where(['kode_provinsi'=>$provinsi])->select(['kode_kabupaten as id','nama_kabupaten as name'])->asArray()->all();
                // $out   = ArrayHelper::map(Administrasiprovinsi::find()->where(['kode_regional'=>$regional])->all(), 'id','nama_provinsi');
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                // echo Json::encode(['output'=>$out, 'selected'=>'']);
                return ['output'=>$out, 'selected'=>''];
            }
        }
        // echo Json::encode(['output'=>'', 'selected'=>'']);
    }

     public function actionKecamatan() {

        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            Yii::$app->response->format = Response::FORMAT_JSON;
             $ids = $_POST['depdrop_parents'];
             $subcat_id = empty($ids[1]) ? null : $ids[1];
            if ($subcat_id != null) {
                $out = Kecamatan::find()->where(['kode_kabupaten'=>$subcat_id])->select(['kode_kecamatan as id','nama_kecamatan as name'])->asArray()->all();
                // $out   = ArrayHelper::map(Administrasiprovinsi::find()->where(['kode_regional'=>$regional])->all(), 'id','nama_provinsi');
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                // echo Json::encode(['output'=>$out, 'selected'=>'']);
                return ['output'=>$out, 'selected'=>''];
            }
        }
        // echo Json::encode(['output'=>'', 'selected'=>'']);
    }


}
