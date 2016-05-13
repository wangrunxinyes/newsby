<?php

class SupportController extends Controller {

	public $layout = 'clean';

	function __construct($id, $module = null) {

		parent::__construct($id, $module);

		//start weixin_check
		// if (!self::is_weixin()) {
		// 	$this->render('show_browser_alert');
		// 	exit;
		// }

		// print_r($_SESSION);

		$user = new wrx_model_user();

		$user->create_from_session();

		// print_r($user);
		// exit;

		//check
		$login = new auto_login();
		$login->start();

		// if (access_control::if_need_check()) {
		// 	self::check();
		// }

	}

	function is_weixin() {
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
			return true;
		}
		return false;
	}

	public function actions() {

		return array(

			// captcha action renders the CAPTCHA image displayed on the contact page

			'captcha' => array(

				'class' => 'CCaptchaAction',

				'backColor' => 0xFFFFFF,

			),

			// page action renders "static" pages stored under 'protected/views/site/pages'

			// They can be accessed via: index.php?r=site/page&view=FileName

			'page' => array(

				'class' => 'CViewAction',

			),

		);

	}

	public function check($special = null) {

		if (!is_null(Yii::app()->data->getValue('openid'))) {

			//first use, init user;

			if (!Yii::app()->user->isGuest) {

				return;

			}

			$user = new wrx_model_user();

			if ($user->init_for_weixin_user(Yii::app()->data->getValue('openid'))) {

				Yii::app()->user->setModel($user);
			}

		} else {

			if (is_null(Yii::app()->user->getModel())) {

				$user = new wrx_model_user();

				$user->create_from_session();

				Yii::app()->user->setModel($user);

			}

		}

		Yii::app()->weixin->reBuild(Yii::app()->user->getModel('wrx_type'));

		//check access;

		if (!is_null(Yii::app()->user->getModel("id"))) {

			if (strlen(Yii::app()->user->getModel("id")) > 5) {

				wrx_model_behavior::create();

				return true;

			}

		}

		if (is_null($special)) {

			$this->redirect(array('/support/login'));

		} else {

			return false;

		}

	}

	public function normal_access($key, $belong) {
		wrx_model_behavior::create("guest", "product", $key, $belong);
	}

	public function actionIndex() {

		$this->redirect(array('/support/productlist'));

	}

	public function actionError() {

		$this->layout = "clean";

		$this->render('system_error');

	}

	public function actionRegister() {

		if (Yii::app()->data->getValue('user_name') != null) {

			$this->layout = "clean";

			$this->render('register_member_card');

		} elseif (Yii::app()->data->getValue('register') != null) {

			$par = '/username/' . Yii::app()->data->getValue('username');

			$par .= '/phone/' . Yii::app()->data->getValue('phone');

			$user = WeixinUserUnit::create();

			$user->getUserByUserName(Yii::app()->data->getValue('register'));

			$user->setPar("phone", Yii::app()->data->getValue('phone'));

			$user->setPar("real_name", Yii::app()->data->getValue('username'));

			$user->store();

			$msg = WeixinTextUnit::create();

			$msg->setPar("fromusername", Yii::app()->data->getValue('register'));

			$card = MemberCardUnit::create($msg);

			$card->createNewMemberCard();

			$par .= '/memberid/' . Yii::app()->data->getValue('register');

			$this->redirect(array('/support/membercenter' . $par));

		} else {

			$this->redirect(array('/support/error'));

		}

	}

	public function actionMedicalbook() {

		$this->layout = "support";

		$this->render('show_medical_book');

		// if (Yii::app()->data->getValue('user_name') != null) {

		// 	$this->layout = "clean";

		// 	$this->redirect(array('/support/register/user_name/' . Yii::app()->data->getValue('user_name')));

		// } elseif (Yii::app()->data->getValue('member_id') != null) {

		// 	$this->layout = "support";

		// 	$this->render('show_medical_book');

		// } else {

		// 	$this->redirect(array('/support/error'));

		// }

	}

	public function actionTest() {

		$this->layout = "support";

		$this->render('show_medical_book');

	}

	public function actionAlert() {

		$this->layout = "support";

		$this->render('show_alert');
	}

	public function actionMembercenter() {

		$this->layout = "support";

		$this->render("member_center");

	}

	public function actionProductlist() {

		$this->layout = "support";
		$this->render("show_product_list");
	}

	public function actionAssistant() {

		$this->layout = "support";
		$this->render("show_assistant");
	}

	public function actionDialog() {

		$this->layout = "empty";
		$this->render("show_dialog");
	}

	public function actionTips() {

		$this->layout = "support";
		$this->render("show_tips");
	}

	public function actionAccount() {

		$this->layout = "support";
		$this->render("show_account");
	}

	public function actionItem() {
		$id = base64_decode(Yii::app()->data->getValue("id"));
		$product = new wrx_model_product();
		$product->load_unit_by_id($id);
		if ($product->getValue('id') == $id) {
			$belong = $product->getValue('p_belong');
			self::normal_access($id, $belong);
			$this->layout = "support";
			$this->render("show_item");
		} else {
			$this->redirect(array('/support/error'));
		}

	}

	public function actionProducttype() {

		$this->layout = "support";

		$this->render("show_product");

	}

	public function actionNotebook() {

		$this->layout = "support";

		$this->render("show_notebook");

	}

	public function actionUpload() {

		$this->layout = "support";

		$this->render("user_upload");

	}

	public function actionReceive() {

		$this->layout = "clean";

		$this->render("user_receive_files");

	}

	public function actionAbout() {
		//

		$this->layout = "support";

		$this->render("user_about");
	}

	public function actionLogin() {

		$this->layout = "support";
		$this->render("show_login_need");
	}

	public function actionLoading() {
		$this->layout = "support";
		$this->render("show_loading");
	}

	public function actionOauthlogin() {
		$this->layout = "support";
		$this->render("show_oauth_login");
	}

	public function actionRegisteroauth() {
		$this->layout = "clean";
		$this->render("register_oauth_user");
	}

}

?>