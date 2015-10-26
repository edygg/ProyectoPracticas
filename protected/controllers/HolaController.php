<?php

class HolaController extends Controller
{
	public function actionIndex()
	{
		$model=CActiveRecord::model("Users")->findAll();
		$twitter="@codigoFacilito";
		$this->render("index",array("model"=>$model,"twitter"=>$twitter));

	}

}