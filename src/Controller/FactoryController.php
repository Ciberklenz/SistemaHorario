<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Factory Controller
 *
 * @property \App\Model\Table\FactoryTable $Factory
 *
 * @method \App\Model\Entity\Factory[] paginate($object = null, array $settings = [])
 */
class FactoryController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $factory = $this->paginate($this->Factory);

        $this->set(compact('factory'));
        $this->set('_serialize', ['factory']);
    }

    /**
     * View method
     *
     * @param string|null $id Factory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $factory = $this->Factory->get($id, [
            'contain' => ['Person']
        ]);

        $this->set('factory', $factory);
        $this->set('_serialize', ['factory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $factory = $this->Factory->newEntity();
        if ($this->request->is('post')) {
            $factory = $this->Factory->patchEntity($factory, $this->request->getData());
            if ($this->Factory->save($factory)) {
                $this->Flash->success(__('The factory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factory could not be saved. Please, try again.'));
        }
        $person = $this->Factory->Person->find('list', ['limit' => 200]);
        $this->set(compact('factory', 'person'));
        $this->set('_serialize', ['factory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Factory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $factory = $this->Factory->get($id, [
            'contain' => ['Person']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $factory = $this->Factory->patchEntity($factory, $this->request->getData());
            if ($this->Factory->save($factory)) {
                $this->Flash->success(__('The factory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factory could not be saved. Please, try again.'));
        }
        $person = $this->Factory->Person->find('list', ['limit' => 200]);
        $this->set(compact('factory', 'person'));
        $this->set('_serialize', ['factory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Factory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $factory = $this->Factory->get($id);
        if ($this->Factory->delete($factory)) {
            $this->Flash->success(__('The factory has been deleted.'));
        } else {
            $this->Flash->error(__('The factory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
