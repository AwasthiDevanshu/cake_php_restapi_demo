<?php
namespace App\Controller;

class ProductController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $product = $this->Product->find('all')->all();
        $this->set('product', $product);
        $this->viewBuilder()->setOption('serialize', ['product']);
    }

    public function productByCategory($id)
    {
        $product = $this->Product->find('all')->all();
        $this->set('product', $product);
        $this->viewBuilder()->setOption('serialize', ['product']);
    }

    public function productBySubCategory($id)
    {
        $product = $this->Product->find('all')->all();
        $this->set('product', $product);
        $this->viewBuilder()->setOption('serialize', ['product']);
    }
    public function add($categoryId,$subcategoryId)
    {
        $this->request->allowMethod(['post', 'put']);
        $product = $this->Product->newEntity($this->request->getData());
        if ($this->Product->save($product)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'recipe' => $product,
        ]);
        $this->viewBuilder()->setOption('serialize', ['product', 'message']);
    }
}