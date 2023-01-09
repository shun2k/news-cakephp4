<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * NewsUsers Controller
 *
 * @property \App\Model\Table\NewsUsersTable $NewsUsers
 * @method \App\Model\Entity\NewsUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewsUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $newsUsers = $this->paginate($this->NewsUsers);

        $this->set(compact('newsUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id News User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newsUser = $this->NewsUsers->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('newsUser'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $newsUser = $this->NewsUsers->newEmptyEntity();
        if ($this->request->is('post')) {
            $newsUser = $this->NewsUsers->patchEntity($newsUser, $this->request->getData());
            if ($this->NewsUsers->save($newsUser)) {
                $this->Flash->success(__('The news user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The news user could not be saved. Please, try again.'));
        }
        $this->set(compact('newsUser'));
    }

    /**
     * Edit method
     *
     * @param string|null $id News User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $newsUser = $this->NewsUsers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newsUser = $this->NewsUsers->patchEntity($newsUser, $this->request->getData());
            if ($this->NewsUsers->save($newsUser)) {
                $this->Flash->success(__('The news user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The news user could not be saved. Please, try again.'));
        }
        $this->set(compact('newsUser'));
    }

    /**
     * Delete method
     *
     * @param string|null $id News User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newsUser = $this->NewsUsers->get($id);
        if ($this->NewsUsers->delete($newsUser)) {
            $this->Flash->success(__('The news user has been deleted.'));
        } else {
            $this->Flash->error(__('The news user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
