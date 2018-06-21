<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Person Controller
 *
 * @property \App\Model\Table\PersonTable $Person
 *
 * @method \App\Model\Entity\Person[] paginate($object = null, array $settings = [])
 */
class PersonController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Person');
        $query=$this->Person->find()
            ->select(['Person.rut_person','Person.id_user','Person.name_person','Person.address_person','Person.mail_person','TypeUser.type_user'])
            ->join([
                'TypeUser'=>[
                'table' => 'type_user',
                'type' =>'INNER',
                'conditions' => 'TypeUser.id_type_user = Person.id_type_user',
            ]
        ]);        

        $this->set(compact('query'));
        $this->set('_serialize', ['person']);
        
        $person=$this->paginate($this->Person);
        $this->set(compact('person'));
        $this->set('_serialize', ['person']);
    }

    /**
     * View method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $query=$this->Person->find()
            ->select(['Person.rut_person','Person.id_user','Person.name_person','Person.address_person','Person.mail_person','TypeUser.type_user','Person.url_photo'])
            ->join([

                'TypeUser'=>[
                 'table' => 'type_user',
                 'type' =>'INNER',
                 'conditions' => 'TypeUser.id_type_user = Person.id_type_user',
                            ]
              ])
             ->where(['Person.rut_person' => $id]);
                    
         $this->set(compact('query'));
         $this->set('_serialize', ['query']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->loadModel('TypeUser');
        $query=$this->TypeUser->find()
                ->select(['TypeUser.id_type_user','TypeUser.type_user','TypeUser.description']);
        $type_user_format=[];
        foreach ($query as $key => $value) {
            $type_user_format[$value->id_type_user]=$value->type_user;
        }
        //dd($type_user_format);
        $person = $this->Person->newEntity();
        if ($this->request->is('post')) {
            $person = $this->Person->patchEntity($person, $this->request->getData());
            if ($this->Person->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
       $this->set(compact('person','type_user_format'));
        $this->set('_serialize', ['person']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $person = $this->Person->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $person = $this->Person->patchEntity($person, $this->request->getData());
            if ($this->Person->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $this->set(compact('person'));
        $this->set('_serialize', ['person']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $person = $this->Person->get($id);
        if ($this->Person->delete($person)) {
            $this->Flash->success(__('The person has been deleted.'));
        } else {
            $this->Flash->error(__('The person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
