<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HistoryHour Controller
 *
 * @property \App\Model\Table\HistoryHourTable $HistoryHour
 *
 * @method \App\Model\Entity\HistoryHour[] paginate($object = null, array $settings = [])
 */
class HistoryHourController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $historyHour = $this->paginate($this->HistoryHour);

        $this->set(compact('historyHour'));
        $this->set('_serialize', ['historyHour']);
    }

    /**
     * View method
     *
     * @param string|null $id History Hour id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $historyHour = $this->HistoryHour->get($id, [
            'contain' => []
        ]);

        $this->set('historyHour', $historyHour);
        $this->set('_serialize', ['historyHour']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $historyHour = $this->HistoryHour->newEntity();
        if ($this->request->is('post')) {
            $historyHour = $this->HistoryHour->patchEntity($historyHour, $this->request->getData());
            if ($this->HistoryHour->save($historyHour)) {
                $this->Flash->success(__('The history hour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The history hour could not be saved. Please, try again.'));
        }
        $this->set(compact('historyHour'));
        $this->set('_serialize', ['historyHour']);
    }

    /**
     * Edit method
     *
     * @param string|null $id History Hour id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $historyHour = $this->HistoryHour->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $historyHour = $this->HistoryHour->patchEntity($historyHour, $this->request->getData());
            if ($this->HistoryHour->save($historyHour)) {
                $this->Flash->success(__('The history hour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The history hour could not be saved. Please, try again.'));
        }
        $this->set(compact('historyHour'));
        $this->set('_serialize', ['historyHour']);
    }

    /**
     * Delete method
     *
     * @param string|null $id History Hour id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $historyHour = $this->HistoryHour->get($id);
        if ($this->HistoryHour->delete($historyHour)) {
            $this->Flash->success(__('The history hour has been deleted.'));
        } else {
            $this->Flash->error(__('The history hour could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
