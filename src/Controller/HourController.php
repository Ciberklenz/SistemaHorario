<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Controller\Component\FlashComponent;
use Cake\Mailer\Email;
/**
 * Hour Controller
 *
 * @property \App\Model\Table\HourTable $Hour
 *
 * @method \App\Model\Entity\Hour[] paginate($object = null, array $settings = [])
 */
class HourController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public $queryRut;
    public $idMaxHistory;
    public $ipInicio;
    public $ipTermino;
      public function initialize()
    {
        parent::initialize();




        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($this->request->data['iniciar'])){
                $this->ipInicio=($this->request->data['value']);
               // dd($this->ipInicio);
            }
        }

          if ($this->request->is(['patch', 'post', 'put'])) {
                if (isset($this->request->data['terminar'])){
                    $this->ipTermino=($this->request->data['value']);
                     //dd($this->ipTermino);
                }
        }

    }

    public function obtenerRutPerson(){
         $idUser=$this->Auth->user('id_user');

                 $queryRut=$this->Person->find()
                    ->select(['Person.rut_person'])
                    ->where(['Person.id_user'=>$idUser]);
                    return $queryRut;
    }

    public function getIdMaxHistoryHour(){

        $idMaxHH = $this->HistoryHour->find('all',[
           'fields' => array('ID_HISTORY_HOUR' => 'MAX(HistoryHour.id_history_hour)'),
           'conditions' => array(
                'HistoryHour.rut_person' => $this->queryRut
            ),
        ]);

       // dd($idMaxHH->toArray());

        $idMaxHistory=0;
        foreach ($idMaxHH as $key => $value) {
            $idMaxHistory=$value->ID_HISTORY_HOUR;
        }

        return $idMaxHistory;

    }


    public function index()
    {

         $this->queryRut=$this->obtenerRutPerson();
      $this->idMaxHistory = $this->getIdMaxHistoryHour();

        $idUser=$this->Auth->user('id_user');
        $this->cerrarDia();

        $this->iniciarDia();

        $queryRut=$this->obtenerRutPerson();

        //dd($idUser);
        $this->loadModel('Hour');
        $query=$this->Hour->find()
                        ->select(['Hour.cantidad_horas_trabajadas','Hour.cantidad_horas_restantes'])
                        ->join([
                            'Person'=>[
                                'table'=> 'person',
                                'type'=> 'INNER',
                                'conditions'=> 'Hour.rut_person = Person.rut_person',
                            ]
                        ])
                        ->where(['Person.rut_person'=>$queryRut]);
        ;
        $horarios=[];
        foreach ($query as $key => $corredor) {
            $horarios[0]=$corredor->cantidad_horas_trabajadas;
            $horarios[1]=$corredor->cantidad_horas_restantes;
        }


        //Para controlar los datos
        $idMaxHH = $this->HistoryHour->find('all',[
           'fields' => array('ID_HISTORY_HOUR' => 'MAX(HistoryHour.id_history_hour)'),
           'conditions' => array(
                'HistoryHour.rut_person' => $queryRut
            ),
        ]);

       // dd($idMaxHH->toArray());

        $idMaxHistory=0;
        foreach ($idMaxHH as $key => $value) {
            $idMaxHistory=$value->ID_HISTORY_HOUR;
        }
        //dd($idMaxHistory);
        /*datos del usuario conectado al sistema*/
        $this->loadModel('Person');
        $queryRut=$this->obtenerRutPerson();
        $query=$this->Person->find()
                        ->select(['HistoryHour.id_history_hour','Person.rut_person','Person.id_user','Person.name_person','Person.address_person','TypeUser.type_user','Person.mail_person','HistoryHour.active','HistoryHour.total_horas','Person.url_photo'])

                        ->order(['HistoryHour.id_history_hour'=>'DESC'])
                        ->join([
                            'TypeUser'=>[
                                'table'=>'type_user',
                                'type'=> 'INNER',
                                'conditions'=>'TypeUser.id_type_user = Person.id_type_user',
                            ],
                            'HistoryHour'=>[
                                'table'=>'history_hour',
                                'type'=>'LEFT',
                                'conditions'=>'HistoryHour.rut_person= Person.rut_person',
                            ],

                        ])
                        ->where(['Person.rut_person'=>$queryRut,'AND'=>['HistoryHour.id_history_hour'=>$idMaxHistory]]);

        if($idMaxHistory==null  ){
            $query=$this->Person->find()
                ->select(['HistoryHour.id_history_hour','Person.rut_person','Person.id_user','Person.name_person','Person.address_person','TypeUser.type_user','Person.mail_person','HistoryHour.active','HistoryHour.total_horas','Person.url_photo'])

                        ->order(['HistoryHour.id_history_hour'=>'DESC'])
                        ->join([
                            'TypeUser'=>[
                                'table'=>'type_user',
                                'type'=> 'INNER',
                                'conditions'=>'TypeUser.id_type_user = Person.id_type_user',
                            ],
                            'HistoryHour'=>[
                                'table'=>'history_hour',
                                'type'=>'LEFT',
                                'conditions'=>'HistoryHour.rut_person= Person.rut_person',
                            ],

                        ])
                        ->where(['Person.rut_person'=>$queryRut]);
        }
                        //'OR' => ['HistoryHour.id_history_hour'=>$idMaxHistory]

        $this->set(compact('horarios','query'));

    }

    /**
     * View method
     *
     * @param string|null $id Hour id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */



    public function obtenerNombrePerson(){
         $idUser=$this->Auth->user('id_user');
            $this->loadModel('Person');
                 $queryNombre=$this->Person->find()
                    ->select(['Person.name_person'])
                    ->where(['Person.id_user'=>$idUser]);
        foreach ($queryNombre as $key => $value) {
          $nombreLogueado= $value->name_person;
        }
        return $nombreLogueado;
    }

    //hora con formato string
    public function obtenerHora(){
        $hora = strtotime('now');
        $time2 = date('G:ia',$hora);
        return $time2;
    }

    public function iniciarDia(){
        if (isset($this->request->data['iniciar']))
        {

            $hora = strtotime('now');
            $time =date('H:i:s',$hora);
            $HourFormat= new \DateTime($time);

            $queryRut=$this->obtenerRutPerson();
            $this->loadModel('HistoryHour');
                $query = $this->HistoryHour->query();
                $query->insert(['active','fecha','hora_inicio','rut_person','ip_inicio'])
                    ->values([
                        'active'=>'1',
                        'fecha'=> date('Y-m-d'),
                        'hora_inicio'=> $HourFormat,
                        'rut_person'=>$this->queryRut,
                        'ip_inicio'=>$this->ipInicio ])
                     ->execute();
                     $this->validation('iniciar');
                     $this->enviarCorreo('iniciar');
        }




    }

    public function cerrarDia(){


        if (isset($this->request->data['terminar']))
        {
            $queryRut=$this->obtenerRutPerson();

            $hora = strtotime('now');
            $time =date('H:i:s',$hora);
            $HourFormat= new \DateTime($time);
             $this->loadModel('HistoryHour');
            $idMaxHH = $this->HistoryHour->find('all',[
           'fields' => array('ID_HISTORY_HOUR' => 'MAX(HistoryHour.id_history_hour)'),
           'conditions' => array(
                'HistoryHour.rut_person' => $queryRut
            ),
        ]);

       // dd($idMaxHH->toArray());

        $idMaxHistory=0;
        foreach ($idMaxHH as $key => $value) {
            $idMaxHistory=$value->ID_HISTORY_HOUR;
        }


                        //'OR' => ['HistoryHour.id_history_hour'=>$idMaxHistory]


            $this->loadModel('HistoryHour');
              $query =$this->HistoryHour->query();
            $query->update()
                ->set(['active' => 0,
                      'hora_final'=>$HourFormat,
                        'ip_termino'=>$this->ipTermino
                    ])
                 ->where(['HistoryHour.rut_person' => $this->queryRut,'HistoryHour.id_history_hour'=>$idMaxHistory])
                 ->execute();

        $this->calcularHorasTrabajadas();
        $this->horasTotalesTrabajadas();
        $this->validation('terminar');
        $this->enviarCorreo('terminar');
        }



    }

    public function calcularHorasTrabajadas(){

        $queryRut=$this->obtenerRutPerson();
        $this->loadModel('HistoryHour');

        $idMaxHH = $this->HistoryHour->find('all',[
           'fields' => array('ID_HISTORY_HOUR' => 'MAX(HistoryHour.id_history_hour)'),
           'conditions' => array(
                'HistoryHour.rut_person' => $queryRut
            ),
        ]);
       // dd($idMaxHH->toArray());

        $idMaxHistory=0;
        foreach ($idMaxHH as $key => $value) {
            $idMaxHistory=$value->ID_HISTORY_HOUR;
        }


        $horaInicio=$this->HistoryHour->find()
                        ->select(['HistoryHour.hora_inicio'])
                        ->where(['HistoryHour.rut_person'=>$queryRut,'HistoryHour.id_history_hour'=>$idMaxHistory ]);

        $horaFinal=$this->HistoryHour->find()
                        ->select(['HistoryHour.hora_final'])
                        ->where(['HistoryHour.rut_person'=>$queryRut,'HistoryHour.id_history_hour'=>$idMaxHistory]);

        /*dd($horaFinal->toArray());*/

        $horaInicioFormato=0;
        foreach ($horaInicio as $key => $value) {
            $horaInicioFormato=$value->hora_inicio;
        }

        $horaFinalFormato=0;
        foreach ($horaFinal as $key => $value) {
            $horaFinalFormato=$value->hora_final;
        }

       // dd($horaInicioFormato);

        $hI=strtotime($horaInicioFormato);
        $hF=strtotime($horaFinalFormato);

        $total1=(($hF-$hI)/3600);

        //dd($total1);

            $this->loadModel('HistoryHour');
            $query =$this->HistoryHour->query();
            $query->update()
                ->set(['total_horas'=>$total1,
                    ])
                 ->where(['HistoryHour.rut_person' => $queryRut,'HistoryHour.id_history_hour'=>$idMaxHistory])
                 ->execute();

    }

    public function horasTotalesTrabajadas(){
         $queryRut=$this->obtenerRutPerson();
            $this->loadModel('HistoryHour');
         $idMaxHH = $this->HistoryHour->find('all',[
           'fields' => array('ID_HISTORY_HOUR' => 'MAX(HistoryHour.id_history_hour)'),
           'conditions' => array(
                'HistoryHour.rut_person' => $queryRut
            ),
        ]);
       // dd($idMaxHH->toArray());

        $idMaxHistory=0;
        foreach ($idMaxHH as $key => $value) {
            $idMaxHistory=$value->ID_HISTORY_HOUR;
        }

         $this->loadModel('Hour');
         $query=$this->Hour->find()
                ->select(['Hour.cantidad_horas_trabajadas','Hour.cantidad_horas_totales', 'Hour.cantidad_horas_restantes'
                        ,'HistoryHour.total_horas'])
                ->join([
                            'HistoryHour'=>[
                                'table'=>'history_hour',
                                'type'=> 'INNER',
                                'conditions'=>'HistoryHour.rut_person = Hour.rut_person',
                            ]
                        ])
                ->where(['Hour.rut_person'=>$queryRut]);


        $cantHorasTrabajadas=0;
        $cantHorasTotales=0;
        $cantHorasRestantes=0;
        $totalHorasTrabajadas=0;

        /*paso los datos de la query a variables distintas*/
        foreach ($query as $key => $value) {
            $cantHorasTrabajadas=$value->cantidad_horas_trabajadas;
            $cantHorasTotales=$value->cantidad_horas_totales;
            $cantHorasRestantes=$value->cantidad_horas_restantes;
            $totalHorasTrabajadas=$value->HistoryHour['total_horas'];
        }
        /*dd($totalHorasTrabajadas);*/

        /*suma de horas trabajadas*/
        $cantHorasTrabajadas=$cantHorasTrabajadas+$totalHorasTrabajadas;
        /*horas restantes*/
        $cantHorasRestantes=$cantHorasRestantes-$totalHorasTrabajadas;
        /*dd($cantHorasRestantes);*/

        //consulta para enviar correo por proximidad a termino de la practica
        if ($cantHorasRestantes<=($cantHorasTotales*0.4)&&$cantHorasRestantes>=($cantHorasTotales*0.38)) {
          $this->enviarCorreo('falta');
        }
        if ($cantHorasRestantes<=($cantHorasTotales*0.2)&&$cantHorasRestantes>=($cantHorasTotales*0.18)) {
          $this->enviarCorreo('falta-2');
        }

         $this->loadModel('Hour');
            $query =$this->Hour->query();
            $query->update()
                ->set(['cantidad_horas_trabajadas'=>$cantHorasTrabajadas,
                        'cantidad_horas_restantes'=>$cantHorasRestantes,
                    ])
                 ->where(['Hour.rut_person' => $queryRut])
                 ->execute();


    }




    public function view($id = null)
    {
        $hour = $this->Hour->get($id, [
            'contain' => []
        ]);

        $this->set('hour', $hour);
        $this->set('_serialize', ['hour']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hour = $this->Hour->newEntity();
        if ($this->request->is('post')) {
            $hour = $this->Hour->patchEntity($hour, $this->request->getData());
            if ($this->Hour->save($hour)) {
                $this->Flash->success(__('The hour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hour could not be saved. Please, try again.'));
        }
        $this->set(compact('hour'));
        $this->set('_serialize', ['hour']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hour id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hour = $this->Hour->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hour = $this->Hour->patchEntity($hour, $this->request->getData());
            if ($this->Hour->save($hour)) {
                $this->Flash->success(__('The hour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hour could not be saved. Please, try again.'));
        }
        $this->set(compact('hour'));
        $this->set('_serialize', ['hour']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hour id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hour = $this->Hour->get($id);
        if ($this->Hour->delete($hour)) {
            $this->Flash->success(__('The hour has been deleted.'));
        } else {
            $this->Flash->error(__('The hour could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function getIpDataInicio(){
        $query=$this->HistoryHour->find()
                        ->select(['HistoryHour.ip_inicio'])
                        ->join([
                          'Person'=>[
                            'table'=>'person',
                            'type'=>'INNER',
                            'conditions'=>'HistoryHour.rut_person = Person.rut_person',
                          ],
                          'PersonFactory'=>[
                            'table'=>'person_factory',
                            'type'=>'INNER',
                            'conditions'=>'Person.rut_person = PersonFactory.rut_person'
                          ],
                          'Factory'=>[
                            'table'=>'factory',
                            'type'=>'INNER',
                            'conditions'=>'PersonFactory.id_factory = Factory.id_factory'
                          ],
                          'Network'=>[
                            'table'=>'network',
                            'type'=>'INNER',
                            'conditions'=>'Factory.id_factory = Network.factory_id'
                          ],

                        ])
                        ->where(['Person.rut_person'=>$this->queryRut,'AND' => ['HistoryHour.id_history_hour'=>$this->idMaxHistory]])
                        ->group('Person.rut_person');
                        //dd($query->toArray());
                        return $query;
    }

    public function getIpDataTermino(){
        $query=$this->HistoryHour->find()
                        ->select(['HistoryHour.ip_termino'])
                        ->join([
                          'Person'=>[
                            'table'=>'person',
                            'type'=>'INNER',
                            'conditions'=>'HistoryHour.rut_person = Person.rut_person',
                          ],
                          'PersonFactory'=>[
                            'table'=>'person_factory',
                            'type'=>'INNER',
                            'conditions'=>'Person.rut_person = PersonFactory.rut_person'
                          ],
                          'Factory'=>[
                            'table'=>'factory',
                            'type'=>'INNER',
                            'conditions'=>'PersonFactory.id_factory = Factory.id_factory'
                          ],

                        ])
                        ->where(['Person.rut_person'=>$this->queryRut,'AND' => ['HistoryHour.id_history_hour'=>$this->idMaxHistory]])
                        ->group('Person.rut_person');
                        //dd($query->toArray());
                        return $query;
    }

    public function ipsValidas(){
      $query=$this->Network->find()
                    ->select(['Network.ip'])
                    ->join([
                      'PersonFactory'=>[
                        'table'=>'person_factory',
                        'type'=>'INNER',
                        'conditions'=>'Network.factory_id = PersonFactory.id_factory'
                      ],
                      'Person'=>[
                        'table'=>'person',
                        'type'=>'INNER',
                        'conditions'=>'Person.rut_person = PersonFactory.rut_person',
                      ],
                    ])
                  ->where(['Person.rut_person'=>$this->queryRut])
                  ->group('Network.ip');
                  //dd($query->toArray());
                  return($query);
    }

    public function validation($option){

        $ips_validas=$this->ipsValidas();
        $ips=array();
        foreach ($ips_validas as $key => $value) {
          array_push($ips,$value->ip);
        }
        $nro_ips_validas=count($ips);
        //dd($ips);

        switch ($option) {
          case 'iniciar':
            $ips_inicio=$this->getIpDataInicio();
            $Data_inicio;

            foreach ($ips_inicio as $key => $value) {
              $Data_inicio = $value->ip_inicio;
            }

            if($nro_ips_validas>1){
              $aux=0;
              for ($i=0; $i < $nro_ips_validas; $i++) {
                if($Data_inicio!=$ips[$i]){
                  $aux++;
                }
              }
              if($aux==$nro_ips_validas)$this->enviarCorreo('sesion_invalida');//mande correo de secion invalida

            }else if(count($ips)==1){
              if($Data_inicio!=$ips[0])$this->enviarCorreo('sesion_invalida');
            }
            break;

          case 'terminar':
              $ips_termino=$this->getIpDataTermino();

              $Data_termino;
              $aux=0;
              foreach ($ips_termino as $key => $value) {
                $Data_termino = $value->ip_termino;
              }
              if($nro_ips_validas>1){
                $aux=0;
                for ($i=0; $i < $nro_ips_validas; $i++) {
                  if($Data_termino!=$ips[$i]){
                    $aux++;
                  }
                }
                if($aux==$nro_ips_validas)$this->enviarCorreo('sesion_invalida2');//mande correo de secion invalida

              }else if($nro_ips_validas==1){
                if($Data_termino!=$ips[0])$this->enviarCorreo('sesion_invalida2');
              }
            break;
        }
    }

    //envio de Email
  public function enviarCorreo($opcion){
    $email = new Email();
    $email->profile(['transport' => 'gmail']);

        $this->loadModel('Person');
        $query =$this->Person->find()
                  ->select(['Person.mail_person'])
                  ->where(['Person.id_type_user'=>1]);

        $i=0;
        foreach ($query as $key => $value) {
          if($i=0){
            $email->to($value->mail_person);
          } else{
              $email->addTo($value->mail_person);
          }
          $i++;
      }
      //$email->to('juan.e.fernandez.suazo@gmail.com');
      //envio de correo al terminar el dia
      switch ($opcion) {
        case 'iniciar':
          $email->subject('Inicio de jornada Practica')
              ->template('iniciar_dia') //plantilla a utilizar
              ->viewVars([ //enviar variables a la plantilla
                  'var1' => $this->obtenerNombrePerson(),
                  'var2' => $this->obtenerHora(),
                ]);
          break;
        case 'terminar':
          $email->subject('Termino de jornada Practica')
              ->template('terminar_dia') //plantilla a utilizar
              ->viewVars([ //enviar variables a la plantilla
                  'var1' => $this->obtenerNombrePerson(),
                  'var2' => $this->obtenerHora(),
                ]);
          break;
        case 'falta':
          $email->subject('Aviso de proximidad a termino de Practica')
              ->template('aviso_pretermino') //plantilla a utilizar
              ->viewVars([ //enviar variables a la plantilla
                  'var1' => $this->obtenerNombrePerson(),
                ]);
          break;
        case 'falta-2':
          $email->subject('Aviso de proximidad a termino de Practica')
              ->template('aviso_pretermino') //plantilla a utilizar
              ->viewVars([ //enviar variables a la plantilla
                  'var1' => $this->obtenerNombrePerson(),
                ]);
          break;
        case 'sesion_invalida':
          $email->subject('Aviso de inicio invalido')
                ->template('sesion_invalida') //plantilla a utilizar
                ->viewVars([ //enviar variables a la plantilla
                    'var1' => $this->obtenerNombrePerson(),
                  ]);
          break;
        case 'sesion_invalida2':
          $email->subject('Aviso de termino invalido')
                ->template('sesion_invalida2') //plantilla a utilizar
                ->viewVars([ //enviar variables a la plantilla
                    'var1' => $this->obtenerNombrePerson(),
                  ]);
          break;
        default:
          dd('opcion no valida');
          break;
      }

      $email->emailFormat('html')
      ->send();

    }
}
