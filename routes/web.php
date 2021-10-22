<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/profil', function () {
    return view('profil', [
        "title" => "Profil",
        "name" => "Muhammad Kurniawan",
        "nim" => "12207006",
        "image" => "profil_image.jpg"
    ]);
});

Route::get('/blog', function () {
    $blog_post = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "post-pertama",
            "author" => "Muhammad Kurniawan",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea iure debitis assumenda. Consequatur repudiandae iste ratione eaque necessitatibus, saepe laborum! Omnis dolore nam minima in consequatur quas laboriosam, architecto ea, tempora vitae iusto? Cupiditate dicta debitis ab natus sed illum? Ullam soluta facere ad quod quaerat qui nisi similique asperiores veniam fugit animi distinctio tenetur consequuntur vero inventore natus nihil at suscipit aut consectetur amet corrupti explicabo, nemo sed! Beatae laborum dolor ad eius magnam rem sit laudantium maxime culpa?"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "post-kedua",
            "author" => "Muhammad Rochman",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos error adipisci tempore aliquam rerum, beatae quae, doloremque at illo fuga consequuntur debitis. Hic dolorum soluta mollitia voluptatum architecto corrupti, omnis molestiae quam sit unde cupiditate ex incidunt ratione distinctio. Quas debitis voluptates corporis nihil rerum vitae quo veniam quaerat reiciendis nemo, facere, quibusdam provident nobis voluptatem incidunt! Aut, saepe doloribus. Ea, reprehenderit! Delectus ipsum non, eius sit tempora dolorem magnam minima, atque minus voluptate mollitia labore autem. Repellendus accusamus nemo, eaque neque dolores quam numquam aliquid quae veritatis fugiat modi aperiam, doloremque quis porro qui. Amet corporis doloremque praesentium maiores?"
        ],
    ];
    return view('posts', [
        "title" => "Blog",
        "posts" => $blog_post
    ]);
});

Route::get('post/{slug}', function ($slug) {

    $blog_post = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "post-pertama",
            "author" => "Muhammad Kurniawan",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea iure debitis assumenda. Consequatur repudiandae iste ratione eaque necessitatibus, saepe laborum! Omnis dolore nam minima in consequatur quas laboriosam, architecto ea, tempora vitae iusto? Cupiditate dicta debitis ab natus sed illum? Ullam soluta facere ad quod quaerat qui nisi similique asperiores veniam fugit animi distinctio tenetur consequuntur vero inventore natus nihil at suscipit aut consectetur amet corrupti explicabo, nemo sed! Beatae laborum dolor ad eius magnam rem sit laudantium maxime culpa?"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "post-kedua",
            "author" => "Muhammad Rochman",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos error adipisci tempore aliquam rerum, beatae quae, doloremque at illo fuga consequuntur debitis. Hic dolorum soluta mollitia voluptatum architecto corrupti, omnis molestiae quam sit unde cupiditate ex incidunt ratione distinctio. Quas debitis voluptates corporis nihil rerum vitae quo veniam quaerat reiciendis nemo, facere, quibusdam provident nobis voluptatem incidunt! Aut, saepe doloribus. Ea, reprehenderit! Delectus ipsum non, eius sit tempora dolorem magnam minima, atque minus voluptate mollitia labore autem. Repellendus accusamus nemo, eaque neque dolores quam numquam aliquid quae veritatis fugiat modi aperiam, doloremque quis porro qui. Amet corporis doloremque praesentium maiores?"
        ],
    ];

    $new_post = [];
    foreach ($blog_post as $post) {
        if ($post['slug'] === $slug) {
            $new_post = $post;
        }
    }

    return view('post', [
        "title" => "Single Post",
        "post" => $new_post
    ]);
});

Route::post("user", [UserAuth::class, 'userLogin']);

Route::get('/login', function () {
    return view('login', [
        "title" => "Login"
    ]);
});

Route::view('home', 'home', [
    "title" => "Home"
]);

Route::get('/login', function () {
    if (session()->has('user')) {
        return redirect('home');
    }
    return view('login', [
        "title" => "Login"
    ]);
});

Route::get('/logout', function () {
    if (session()->has('user')) {
        session()->pull('user');
    }
    return redirect('login');
});
