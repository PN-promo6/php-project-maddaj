<?php

namespace Controller;

use Entity\User;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class AuthController extends AbstractController
{

    public function login(Request $request): Response
    {

        $userRepo = $this->getOrm()->getRepository(User::class);

        if ($request->request->has('username') && $request->request->has('password')) { //If the fields are filled in
            $usersWithThisLogin = $userRepo->findBy(
                array(
                    "nickname" => $request->request->get('username')
                )
            ); //The User class is searched for the corresponding data
            if (count($usersWithThisLogin) == 1) {
                $firstUserWithThisLogin = $usersWithThisLogin[0];
                if ($firstUserWithThisLogin->password != md5($request->request->get('password'))) {
                    $data = array(
                        "errorMsg" => "Wrong password."
                    );
                    return $this->render('LoginForm.php', $data);
                } else {
                    $request->getSession()->set('user', $usersWithThisLogin[0]); //We put userObject in session
                    return $this->redirectToRoute('display');
                }
            } else {
                $data = array(
                    "errorMsg" => "Nickname doesn't exist."
                );
                return $this->render('LoginForm.php', $data);
            }
        } else {
            return $this->render('LoginForm.php');
        }
    }

    public function logout(Request $request): Response
    {
        if ($request->getSession()->has('user')) {
            $request->getSession()->remove('user');
        }
        return $this->redirectToRoute('display');
    }

    public function register(Request $request): Response
    {
        $userRepo = $this->getOrm()->getRepository(User::class);
        $manager = $this->getOrm()->getManager();

        if ($request->request->has('username') && $request->request->has('password') && $request->request->has('passwordRetype')) {
            $errorMsg = NULL;
            $users = $userRepo->findBy(
                array(
                    "nickname" =>  $request->request->get('username')
                )
            );
            $userMail = $userRepo->findBy(array("email" =>  $request->request->get('email')));
            if (count($users) > 0) {
                $errorMsg = "Nickname already used.";
            } else if (count($userMail) > 0) {
                $errorMsg = "Email already used.";
            } else if ($request->request->has('password') != $request->request->has('passwordRetype')) {
                $errorMsg = "Passwords are not the same.";
            } else if (strlen(trim($request->request->has('password'))) < 8) {
                $errorMsg = "Your password should have at least 8 characters.";
            } else if (strlen(trim($request->request->has('username'))) < 4) {
                $errorMsg = "Your nickame should have at least 4 characters.";
            }
            if ($errorMsg) {
                $data = array(
                    "errorMsg" => $errorMsg
                );
                return $this->render('RegisterForm.php', $data);
            } else {
                $newUser = new User();
                $newUser->nickname = $request->request->get('username');
                $newUser->password = md5($request->request->get('password'));
                $newUser->website = $request->request->get('website');
                $newUser->email = $request->request->get('email');
                $manager->persist($newUser);
                $manager->flush();
                $request->getSession()->set('user', $newUser);
                return $this->redirectToRoute('display');
            }
        } else {
            return $this->render('RegisterForm.php');
        }
    }
}
