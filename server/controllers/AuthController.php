<?php
    namespace app\server\controllers;
    use app\server\Request;
    use app\server\Response;
    use app\server\models\UserModel;
    use app\server\models\LoginForm;

    class AuthController extends Controller
    {
        public function register(Request $request, Response $response)
        {
            $user = new UserModel();

            if ($request->isPost()) {
                $user->loadData($request->body());

                if ($user->save()) {
                    $response->setStatusCode(201);

                    return "Register success";
                }

            }

            return $this->render('register', [
                'model' => $user
            ]);
        }

        public function confirmed(Request $_request, Response $_response)
        {
            return $this->render('confirmed');
        }

        public function login(Request $request, Response $response)
        {
            $form = new LoginForm();

            if ($request->isPost()) {
                $form->loadData($request->body());

                if ($form->login()) {
                    $response->setStatusCode(200);
                    
                    return "Login success";
                }
            }

            return $this->render('login', [
                'model' => $form
            ]);
        }

        public function logout(Request $_request, Response $response)
        {
            Application::$app->logout();
            $response->redirect('/');
        }
    }
?>