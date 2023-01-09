<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Jcodes Controller
 *
 * @property \App\Model\Table\JcodesTable $Jcodes
 * @method \App\Model\Entity\Jcode[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JcodesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $jcodes = $this->paginate($this->Jcodes);

        $this->set(compact('jcodes'));
    }

    /**
     * View method
     *
     * @param string|null $id Jcode id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jcode = $this->Jcodes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('jcode'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jcode = $this->Jcodes->newEmptyEntity();
        if ($this->request->is('post')) {
            $jcode = $this->Jcodes->patchEntity($jcode, $this->request->getData());
            if ($this->Jcodes->save($jcode)) {
                $this->Flash->success(__('The jcode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jcode could not be saved. Please, try again.'));
        }
        $this->set(compact('jcode'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Jcode id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jcode = $this->Jcodes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jcode = $this->Jcodes->patchEntity($jcode, $this->request->getData());
            if ($this->Jcodes->save($jcode)) {
                $this->Flash->success(__('The jcode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jcode could not be saved. Please, try again.'));
        }
        $this->set(compact('jcode'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Jcode id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jcode = $this->Jcodes->get($id);
        if ($this->Jcodes->delete($jcode)) {
            $this->Flash->success(__('The jcode has been deleted.'));
        } else {
            $this->Flash->error(__('The jcode could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
