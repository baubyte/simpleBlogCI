<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\PostsModel;
use App\Models\CategoriesModel;
use App\Models\CommentsModel;
use App\Models\UsersModel;
use App\Models\NewsletterModel;
use App\Models\CommenstsModel;

class Dashboard extends BaseController
{
	/**Carga la Vista Index */
	public function index()
	{
		$this->loadViews("index");
	}
	/**Para Subir los Archivos al Post*/
	public function uploadPost()
	{
		/**Cargamos las Categorías */
		$model = new CategoriesModel();
		/**Modelo Posts */
		$postsModel = new PostsModel();

		$data['categories'] = $model->findAll();
		/**Cargamos los Helpers Necesarios */
		helper(["url", "form"]);
		/**Para las Validaciones del Formulario */
		$validation = \Config\Services::validation();
		/**Reglas para los Campos del Formulario */
		$validation->setRules([
			"title" => "required",
			"intro" => "required",
			"content" => "required|min_length['50']",
			"category" => "required",
			"tags" => "required"
		], [
			"title" => [
				"required" => "El Titulo del Post es Obligatorio."
			],
			"intro" => [
				"required" => "La Intro del Post es Obligatorio."
			],
			"content" => [
				"required" => "El Contenido del Post es Obligatorio.",
				"min_length" => "El Contenido del Post debe Contener como Mínimo 50 Caracteres"
			],
			"category" => [
				"required" => "Seleccione una Categoría."
			],
			"tags" => [
				"required" => "Los Tags del Post es Obligatorio.",
			]
		]);

		if ($_POST) {
			/**Validación del Formulario */
			if (!$validation->withRequest($this->request)->run()) {
				$errors = $validation->getErrors();
				$data['errors'] = true;
			} else {
				/**Recibimos el Archivo */
				$file = $this->request->getFile("banner");
				/**Cambiamos el Nombre del Archivo */
				$fileName = $file->getRandomName();
				if ($file->isValid()) {
					$file->move(ROOTPATH . "public/uploads", $fileName);
				}
				/**Nombre del Archivo que se Subió */
				$_POST['banner'] = $fileName;
				/**Armamos el Slug para el Post */
				$_POST['slug'] = url_title($_POST['title']);
				$postsModel->save($_POST);
				return redirect('newpost');
			}
		}
		/**Mostramos la Vista */
		$this->loadViews("uploadPost", $data);
	}
	/**Para Agregar los Newsletter */
	public function addNewsletter()
	{
		/**Cargamos los Helpers Necesarios */
		helper(["url", "form"]);
		/**Para las Validaciones del Formulario */
		$validation = \Config\Services::validation();
		/**Reglas para los Campos del Formulario */
		$validation->setRules([
			"email" => "required|valid_email"
		], [
			"email" => [
				"required" => "Debe Ingresar un E-mail.",
				"valid_email" => " Debe Ingresar un E-mail Valido."
			],
		]);


		if (!$validation->withRequest($this->request)->run()) {
			$errors = $validation->getErrors();
			foreach ($errors as $error) {
				echo $error;
			}
		} else {
			/**Cargamos El Modelo */
			$newsletterModel = new NewsletterModel();
			/**Comprobamos que el Email No exista en la db*/
			$existEmails = $newsletterModel->where("email", $_POST['email'])->findAll();
			/**Comprobamos si tiene algo es decir que ya existe el email */
			if ($existEmails) {
				echo "El E-mail ya existe.";
			} else {
				$id = $newsletterModel->insert($_POST);
				echo "Bienvenido al Newsletter.";
			}
		}
	}
	/**Para el alta de los POST */
	public function post($slug = null, $id = null)
	{
		if ($slug && $id) {
			/**Modelos de los Comentarios */
			$commentsModel = new CommentsModel();
			$data['comments'] = $commentsModel->where("post_id", $id)->findAll();
			$data['commentsTotal'] = $commentsModel->where("post_id", $id)->countAllResults();
			/**Para los Comentarios de los post */
			if ($_POST) {
				/**Cargamos los Helpers Necesarios */
				helper(["url", "form"]);
				/**Para las Validaciones del Formulario */
				$validation = \Config\Services::validation();
				/**Reglas para los Campos del Formulario */
				$validation->setRules([
					"cName" => "required",
					"cEmail" => "required|valid_email",
					"cMessage" => "required|min_length['20']"
				], [
					"email" => [
						"required" => "Debe Ingresar un E-mail.",
						"valid_email" => " Debe Ingresar un E-mail Valido."
					],
					"cName" => [
						"required" => "Debe Ingresar un Nombre."
					],
					"cMessage" => [
						"required" => "Debe Ingresar un Comentario.",
						"min_length" => "Debe Ingresar un Minimo de 20 Caracteres."
					]
				]);
				/**Comprobamos las Validaciones */
				if (!$validation->withRequest($this->request)->run()) {
					$data['error'] = "true";
				} else {
					$dataComment = [
						"post_id" => $id,
						"name" => $_POST["cName"],
						"email" => $_POST["cEmail"],
						"comment" => $_POST["cMessage"]
					];
					$commentsModel->insert($dataComment);
				}
			}

			/**Modelo Posts */
			$postsModel = new PostsModel();
			/**Buscamos todos con el id igual al que recibimos */
			$post = $postsModel->where("id", $id)->findAll();
			/**Cargamos las Categorías */
			$categoriesModel = new CategoriesModel();
			$data["categories"] = $categoriesModel->where("id", $post[0]['category'])->findAll();
			$data["post"] = $post;

			$this->loadViews("post", $data);
		}
	}
	/**Para los Mostrar los POST por Categorias */
	public function category($id = null)
	{
		/**Modelo Posts */
		$postsModel = new PostsModel();
		/**Cargamos las Categorías */
		$categoriesModel = new CategoriesModel();
		/**Buscamos el Nombre de las Categorias */
		$data["category"] = $categoriesModel->where("id",$id)->findAll();
		/**Buscamos los Post de esa Categoria */
		$data["posts"] = $postsModel->where("category",$id)->findAll();

		$this->loadViews("category",$data);
	}
	/**Para Cargar la Vista que pasamos */
	public function loadViews($view = null, $data = null)
	{
		if ($data) {
			$data['view'] = $view;
			echo view("includes/header", $data);
			echo view($view, $data);
			echo view("includes/footer", $data);
		} else {
			echo view("includes/header");
			echo view($view);
			echo view("includes/footer");
		}
	}
}
