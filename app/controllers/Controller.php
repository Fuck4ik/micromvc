<?php

require_once 'app/models/User.php';

class Controller
{
    public function homeAction() {
        $user = new User();
        $user->setFirstname('Роман');
        $user->setLastname('Ястребов');

        $this->render('home.php', 'Главная', [
            'user' => $user,
            'time' => time(),
        ]);
    }

    public function regAction() {
        $param = $_POST;
        $user = new User();
        if ( isset($param['is_agree']) ) {
            // Создание пользователя
            $user->setFirstname($param['firstname']);
            $user->setLastname($param['lastname']);
            $user->setPassword($param['password']);
            $user->setSex($param['sex']);
            $user->setAge($param['age']);
            $user->setGrowth($param['growth']);
            if (isset($param['stack_learn'])) {
                $user->setStackLearn($param['stack_learn']);
            }
        }
        $this->render('reg.php', 'Регистрация', [
            'user' => $user,
        ]);
    }




    private function render($view, $title, $param = []) {
        extract($param);
        require_once 'templates/layout.php';
    }

    public function route($route) {
        return '/micromvc/?act='.$route;
    }
}