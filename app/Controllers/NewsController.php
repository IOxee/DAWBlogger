<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\CodeIgniter;
use CodeIgniter\Exceptions\PageNotFoundException;

use App\Models\NewsModel;




class NewsController extends BaseController
{
    public function index($sort_by = null, $sort_order = 'desc')
    {
        // 
        $model = model(NewsModel::class);
        $searchData = $this->request->getGet();
        $sort_order = ($sort_order == 'desc') ? 'asc' : 'desc';

        $sort_icon = 'bi bi-arrow-down-up';
        if ($sort_order == null || $sort_order == '') {
            $sort_icon = 'bi bi-arrow-down-up';
        } else if ($sort_order == 'desc') {
            $sort_icon = 'bi bi-arrow-down';
        } else {
            $sort_icon = 'bi bi-arrow-up';
        }
        
        if (isset($searchData) && isset($searchData['q'])) {
            $search = $searchData["q"];

            $activePage = $searchData['page'] ?? 1;

            if ($search == "") {
                $paginateData = $model->getAldwlPaged(5, $sort_by, $sort_order);
            } else {
                $paginateData = $model->getByTitleOrText($search, $sort_by, $sort_order)->paginate(2);
            }

            $data = [
                'page_title' => 'CI4 Pager & search filter',
                'title' => 'Llistat paginat',
                'news' => $paginateData,
                'pager' => $model->pager,
                'search' => $search,
                'order' => $sort_order,
                'last_order_by' => ($sort_by == null || $sort_by == '') ? 'id' : $sort_by,
                'sort_icon' => $sort_icon,
                'activepage' => $activePage,
            ];
        } else {
            $search = "";
            $activePage = $searchData['page'] ?? 1;

            if ($search == "") {
                $paginateData = $model->getAllPaged(5, $sort_by, $sort_order);
            } else {
                $paginateData = $model->getByTitleOrText($search, $sort_by, $sort_order)->paginate(2);
            }

            $data = [
                'page_title' => 'CI4 Pager & search filter',
                'title' => 'Llistat paginat',
                'news' => $paginateData,
                'pager' => $model->pager,
                'search' => $search,
                'order' => $sort_order,
                'last_order_by' => ($sort_by == null || $sort_by == '') ? 'id' : $sort_by,
                'sort_icon' => $sort_icon,
                'activepage' => $activePage,
            ];
        }

        return view('templates/header')
            . view('news/index', $data)
            . view('templates/footer');
    }

    public function view($id) {
        $model = model(NewsModel::class);
        $data['news'] = $model->getNewsByID($id);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: '. $id);
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

        $model = model(NewsModel::class);
        $model->save([
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

        $model = model(NewsModel::class);
        $data['news'] = $model->find($id);

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

        $model = model(NewsModel::class);
        $model->save([
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
        $model = model(NewsModel::class);
        $model->deleteNews($id);

        return view('templates/header', ['title' => 'Delete a news item'])
            . view('news/success')
            . view('templates/footer');
    }

    public function order($sort_by, $sort_order) {
        $sort_order = ($sort_order == 'desc') ? 'asc' : 'desc';

        $model = model(NewsModel::class);
        $searchData = $this->request->getGet();

        if (isset($searchData) && isset($searchData['q'])) {
            $search = $searchData["q"];
            $activePage = $searchData['page'] ?? 1;

            if ($search == "") {
                $paginateData = $model->getAllPaged(5, $sort_by, $sort_order);
            } else {
                $paginateData = $model->getByTitleOrText($search, $sort_by, $sort_order)->paginate(2);
            }
        } else {
            $search = "";
            $activePage = $searchData['page'] ?? 1;

            if ($search == "") {
                $paginateData = $model->getAllPaged(5, $sort_by, $sort_order);
            } else {
                $paginateData = $model->getByTitleOrText($search, $sort_by, $sort_order)->paginate(2);
            }
        }

        $data = [
            'page_title' => 'CI4 Pager & search filter',
            'title' => 'Llistat paginat',
            'news' => $paginateData,
            'pager' => $model->pager,
            'search' => $search,
            'order' => $sort_order,
            'activepage' => $activePage,
        ];

        return view('templates/header')
            . view('news/index', $data)
            . view('templates/footer');

    }
    
    public function contactView()
    {
        $config = [
            "textColor"=>'#000000',
            "backColor"=>'#ffffff',
            "noiceColor"=>'#162453',
            "imgWidth"=>180,
            "imgHeight"=>40,
            "noiceLines"=>40,
            "noiceDots"=>20,
            "length" => 6,
            "expiration"=>5*MINUTE
        ];
        $timage = new \App\Libraries\Text2Image($config);
        
        $data = [
            'captcha' => $timage->captcha()->html(),
            'captchaText' => $timage->textToImage()->html(),
            'text' => $timage->text
        ];

        session()->set('captcha_text', $timage->text);

        return view('templates/header')
            . view('news/contact', $data)
            . view('templates/footer');
    }

    public function contact()
    {
        $post = $this->request->getPost([
            'name',
            'email',
            'subject',
            'message',
            'captcha'
        ]);
        
        $captchaText = session()->get('captcha_text');

        $validationRules = 
        [
            'name' => [
                'label' => 'Name',
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'min_length' => 'El campo {field} debe tener al menos {param} caracteres',
                    'max_length' => 'El campo {field} debe tener como máximo {param} caracteres',
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'valid_email' => 'El campo {field} debe ser un email válido',
                ],
            ],
            'subject' => [
                'label' => 'Subject',
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'min_length' => 'El campo {field} debe tener al menos {param} caracteres',
                    'max_length' => 'El campo {field} debe tener como máximo {param} caracteres',
                ],
            ],
            'message' => [
                'label' => 'Message',
                'rules' => 'required|min_length[10]|max_length[5000]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'min_length' => 'El campo {field} debe tener al menos {param} caracteres',
                    'max_length' => 'El campo {field} debe tener como máximo {param} caracteres',
                ],
            ],
            'captcha' => [
                'label' => 'Captcha',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'matches' => 'El campo {field} no coincide con el texto de la imagen',
                ],
            ]
        ];

        if ($this->validateData($post, $validationRules)) {
            if ($post['captcha'] != $captchaText) {
                session()->setFlashdata('error', ['captcha' => 'El campo Captcha no coincide con el texto de la imagen']);
                return redirect()->back()->withInput();
            } else {
                $email = \Config\Services::email();
                $email->setFrom($post['email'], $post['name']);
                $email->setTo('admin@me.local');
                $email->setSubject($post['subject']);
                $email->setMessage($post['message']);
    
                return view('templates/header', ['title' => 'Contact'])
                    . view('news/success')
                    . view('templates/footer');
            }
        } else {
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }
    }
}
