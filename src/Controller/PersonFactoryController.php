<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PersonFactory Controller
 *
 * @property \App\Model\Table\PersonFactoryTable $PersonFactory
 *
 * @method \App\Model\Entity\PersonFactory[] paginate($object = null, array $settings = [])
 */
class PersonFactoryController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $personFactory = $this->paginate($this->PersonFactory);

      
        $this->set('_serialize', ['personFactory']);



        $this->loadModel('PersonFactory');
        $query=$this->PersonFactory->find()
                        ->select(['PersonFactory.id_person_factory','PersonFactory.rut_person','Factory.name_factory',
                      'Factory.id_factory'])
                        ->join([
                            'Factory'=>[
                                'table'=> 'factory',
                                'type'=> 'INNER',
                                'conditions'=> 'PersonFactory.id_factory = Factory.id_factory',
                            ]          
                        ]);
                       // ->where(['Person.rut_person'=>$queryRut]);

          $this->set(compact('personFactory','query'));
    }

    /**
     * View method
     *
     * @param string|null $id Person Factory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $personFactory = $this->PersonFactory->get($id, [
            'contain' => []
        ]);

        $this->set('personFactory', $personFactory);
        $this->set('_serialize', ['personFactory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $personFactory = $this->PersonFactory->newEntity();
        if ($this->request->is('post')) {
            $personFactory = $this->PersonFactory->patchEntity($personFactory, $this->request->getData());
            if ($this->PersonFactory->save($personFactory)) {
                $this->Flash->success(__('The person factory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person factory could not be saved. Please, try again.'));
        }
        $this->set(compact('personFactory'));
        $this->set('_serialize', ['personFactory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Person Factory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personFactory = $this->PersonFactory->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personFactory = $this->PersonFactory->patchEntity($personFactory, $this->request->getData());
            if ($this->PersonFactory->save($personFactory)) {
                $this->Flash->success(__('The person factory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person factory could not be saved. Please, try again.'));
        }
        $this->set(compact('personFactory'));
        $this->set('_serialize', ['personFactory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Person Factory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personFactory = $this->PersonFactory->get($id);
        if ($this->PersonFactory->delete($personFactory)) {
            $this->Flash->success(__('The person factory has been deleted.'));
        } else {
            $this->Flash->error(__('The person factory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
