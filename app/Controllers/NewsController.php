<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\CodeIgniter;
use CodeIgniter\Exceptions\PageNotFoundException;

use App\Models\NewsModel;

class NewsController extends BaseController
{
    public function index()
    {
        $modal = model(NewsModel::class);
        $data = [
            'news' => $modal->getNews(),
            'title' => 'News archive',
        ];

        return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');

    }

    public function view($slug = null) {
        $modal = model(NewsModel::class);
        $data['news'] = $modal->getNews($slug);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: '. $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }

    public function create() {
        helper('form');

        if (! $this->request->is('post')) {
            return view('templates/header', ['title' => 'Create a news item'])
                . view('news/create')
                . view('templates/footer');
        }

        $post = $this->request->getPost([
            'title',
            'body',
        ]);

        if (! $this->validateData($post, [
            'title' => 'required|min_length[3]|max_length[255]',
            'body' => 'required|min_length[10]|max_length[5000]',
        ])) {
            return view('templates/header', ['title' => 'Create a news item'])
                . view('news/create')
                . view('templates/footer');
        }

        $modal = model(NewsModel::class);
        $modal->save([
            'title' => $post['title'],
            'slug' => url_title($post['title'], '-', true),
            'body' => $post['body'],
        ]);

        return view('templates/header', ['title' => 'Create a news item'])
            . view('news/success')
            . view('templates/footer');
    }

    public function get($id) {
        helper('form');

        $modal = model(NewsModel::class);
        $data['news'] = $modal->find($id);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: '. $id);
        }

        // Si el formulario no ha sido enviado por POST mostramos el formulario de edicion
        if (! $this->request->is('post')) {
            return view('templates/header', ['title' => 'Edit a news item'])
                . view('news/edit', $data)
                . view('templates/footer');
        }
    }

    public function edit() {
        helper('form');

        $post = $this->request->getPost([
            'id',
            'title',
            'body',
        ]);

        if (! $this->validateData($post, [
            'id' => 'required|integer',
            'title' => 'required|min_length[3]|max_length[255]',
            'body' => 'required|min_length[10]|max_length[5000]',
        ])) {
            return view('templates/header', ['title' => 'Edit a news item'])
                . view('news/edit')
                . view('templates/footer');
        }

        $modal = model(NewsModel::class);
        $modal->save([
            'id' => $post['id'],
            'title' => $post['title'],
            'slug' => url_title($post['title'], '-', true),
            'body' => $post['body'],
        ]);

        return view('templates/header', ['title' => 'Edit a news item'])
            . view('news/success')
            . view('templates/footer');
    }

    public function delete($id) {
        $modal = model(NewsModel::class);
        $modal->deleteNews($id);

        return view('templates/header', ['title' => 'Delete a news item'])
            . view('news/success')
            . view('templates/footer');
    }
}
