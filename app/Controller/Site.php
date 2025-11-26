<?php
namespace Controller;
use Model\Post;
use Model\User;
use Model\Division;
use Model\DivisionType;
use Model\Position;
use Model\StaffCategory;
use Model\Employee;
use Src\View;
use Src\Request;
use Src\Auth\Auth;
use Src\Validator\Validator;
use Validators\UserValidator;
use function HRValidator\validate;

class Site
{
    public function login(Request $request): string{
        if ($request->method === 'GET') {return new View('site.login');}
        if (Auth::attempt($request->all())) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                app()->route->redirect('/admin/dashboard');
            } else {
                app()->route->redirect('/dashboard');
            }
        }
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function index(): string{
        $posts = Post::all();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function logout(): void{
        Auth::logout();
        app()->route->redirect('/');
    }

    public function hello(): string{
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function signup(Request $request): string{
        if ($request->method === 'POST') {
            $result = UserValidator::validateCreate($request);
            if (!$result['valid']) {
                $errorMessages = [];
                foreach ($result['errors'] as $field => $errors) {
                    $errorMessages[] = implode(', ', $errors);
                }
                $message = implode('; ', $errorMessages);

                return new View('site.signup', [
                    'message' => $message,
                    'old' => $request->all()
                ]);
            }

            // Проверка уникальности логина
            if (User::where('login', $request->login)->exists()) {
                return new View('site.signup', [
                    'message' => 'Пользователь с таким логином уже существует',
                    'old' => $request->all()
                ]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/');
            }
        }
        return new View('site.signup');
    }
}