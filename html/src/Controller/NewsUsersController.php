<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\GetInfo\GetNews;
use Authentication\Identity;
use Cake\ORM\TableRegistry;
use Error;

/**
 * NewsUsers Controller
 *
 * @property \App\Model\Table\NewsUsersTable $NewsUsers
 * @method \App\Model\Entity\NewsUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewsUsersController extends AppController
{
    private $prefecture = "Tokyo";
    private $column = "123456";
    private $id = 0;
    private $local ="";
    private $username = "";
    private $linkAction = "";
    private $logintag = "";
    private $session;

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // 認証を必要としないログインアクションを構成し、
        // 無限リダイレクトループの問題を防ぎます
        $this->Authentication->addUnauthenticatedActions(['login', 'add', 'newslist', 'weatherDetail', 'main', 'confirm', 'create']);

        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
          $service = $this->Authentication->getIdentity();
          $this->id = $service->id;
          // データベースからデータを取るようにする
          $person = $this->NewsUsers->get($this->id);
          $this->username = "$person->name さん&nbsp;";
          $this->linkAction = "logout";
          $this->logintag = "ログアウト";
          $this->prefecture = $person->prefecture;
          $this->local = $person->local;
          $this->column = $person->column_order;
          
        } else {
          $this->username = 'ゲストさん&nbsp;';
          $this->linkAction = "login";
          $this->logintag = "ログイン";
        }

        $this->session = $this->getRequest()->getSession();
    }

    //Log in method
    public function login()
    {
        // レイアウト
        $this->viewBuilder()->setLayout('set');
        $this->set('username', $this->username);
        $this->set('linkAction', $this->linkAction);
        $this->set('logintag', $this->logintag);
        $this->set('header', ['pageTitle'=>'My News', 'subtitle'=>'ログイン画面']);
        $this->set('footer', ['copyright'=>'Tikara']);

        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // POST, GET を問わず、ユーザーがログインしている場合はリダイレクトします
        if ($result->isValid()) {
            $service = $this->Authentication->getIdentity();
            $this->id = $service->id;

            // ログイン後、一律mainページへ
            $redirect = $this->Authentication->getLoginRedirect() ?? '/news-users/main';
            
            return $this->redirect($redirect);
        }
        // ユーザーが submit 後、認証失敗した場合は、エラーを表示します
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
            // print_r($result);
        }
    }

    // Log out method
    public function logout()
    {
        $result = $this->Authentication->getResult();
        
        // POST, GET を問わず、ユーザーがログインしている場合はリダイレクトします
        if ($result->isValid()) {
            $this->Authentication->logout();
            $this->session->destroy();
            $redirect = $this->Authentication->getLoginRedirect() ?? '/news-users/main';
            // return $this->redirect(['controller' => 'News-users', 'action' => 'main']);
            return $this->redirect($redirect);
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $this->viewBuilder()->setLayout('set');
        // jsonコード　地名変換用
        $this->Jcodes = TableRegistry::getTableLocator()->get('Jcodes');
        $entityData = $this->Jcodes->get("1");
        
        if (gettype($entityData['json']) === "string") {
          $pref_city = json_decode($entityData['json'], true); // associativeをtrueとすることで連想配列形式にする
          // var_dump($pref_city);
        } else {
          $pref_city = $entityData['json'];
        }

        $this->set('pref_city',$pref_city);
        $this->set('username', $this->username);
        $this->set('linkAction', $this->linkAction);
        $this->set('logintag', $this->logintag);
        
        $person = $this->NewsUsers->get($this->id);
        $this->set('person', $person);
        $this->set('header', ['pageTitle'=>'My News', 'subtitle'=>'個人設定']);
        $this->set('footer', ['copyright'=>'Tikara']);

        // throw new \Exception("エラー");

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('addeditset');
        $this->Jcodes = TableRegistry::getTableLocator()->get('Jcodes');
        $entityData = $this->Jcodes->get("1");
        $pref_city = $entityData['json'];
        $this->set('pref_city',$pref_city);

        // セッションに入力情報があったら読み込む
        if ($this->session->check('inputs')) {
          $inputData = $this->session->consume('inputs');
          
        } else {
          $inputData = array('name'=>'', 'email'=>'', 'password'=>'');
        }

        $this->set('inputData', $inputData);
        $this->set('username', $this->username);
        $this->set('linkAction', $this->linkAction);
        $this->set('logintag', $this->logintag);
        $this->set('header', ['pageTitle'=>'My News', 'subtitle'=>'新規作成']);
        $this->set('footer', ['copyright'=>'Tikara']);
    }

    // confirm method
    public function confirm() 
    {
        $this->viewBuilder()->setLayout('set');
        $this->Jcodes = TableRegistry::getTableLocator()->get('Jcodes');
        $entityData = $this->Jcodes->get("1");
        $pref_city = $entityData['json'];
        $this->set('pref_city',$pref_city);
      
        if ($this->request->is('post')) {
          $data = $this->request->getData();
          $this->session->write('inputs', $data);
          $this->newsUsers = $this->NewsUsers->newEmptyEntity($data);
          $this->set('data', $data);
        } else {
          $this->set('name', 'nasi');
        }

        $this->set('username', $this->username);
        $this->set('linkAction', $this->linkAction);
        $this->set('logintag', $this->logintag);
        $this->set('header', ['pageTitle'=>'My News', 'subtitle'=>'確認画面']);
        $this->set('footer', ['copyright'=>'Tikara']);
    }

    // create method addでpostされたデータをデータベースに保存する
    public function create() {
        $this->viewBuilder()->setLayout('set');
        $entity = $this->NewsUsers->newEmptyEntity();
        if ($this->request->is('post')) {
          if (!$this->session->check('inputs')) {
            $this->Flash->error('セッションがありません。');
            return $this->redirect(['action' => 'add']);
          } 
          $data = $this->session->consume('inputs');
          $setData = "";
          foreach ($data as $key => $value) {
            if (strlen($key) > 11 || substr($key, 0, 10) === "selectForm") {
              $setData .= (string)$value;
              unset($data[$key]);
            }
          }
          $data['column_order'] = $setData;
    
          $entity = $this->NewsUsers->patchEntity($entity, $data);
          if ($this->NewsUsers->save($entity)) {
            $this->set('data', "登録が完了しました");
            $this->session->destroy();
          } else {
            $this->set('data', "登録に失敗しました。");
          }
    
        }
        $this->set('username', $this->username);
        $this->set('linkAction', $this->linkAction);
        $this->set('logintag', $this->logintag);
        $this->set('header', ['pageTitle'=>'My News', 'subtitle'=>'新規作成']);
        $this->set('footer', ['copyright'=>'Tikara']);
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
        $this->viewBuilder()->setLayout('addeditset');
        $this->Jcodes = TableRegistry::getTableLocator()->get('Jcodes');
        $entityData = $this->Jcodes->get("1");
        $pref_city = $entityData['json'];
        $this->set('pref_city',$pref_city);
        $data = $this->NewsUsers->get($id);
    
        if ($this->session->check('inputs')) {
          $inputData = $this->session->consume('inputs');
        } else {
          $inputData = array('name'=>$data['name'], 'prefecture'=>$data['prefecture'], 'local'=>$data['local'], 'email'=>$data['email'], 'password'=>'');
        }

        $this->set('inputData', $inputData);
        $this->set('username', $this->username);
        $this->set('linkAction', $this->linkAction);
        $this->set('logintag', $this->logintag);
        
        $columndata = $data['column_order'];
        $index = 1;
        for ($i=0; $i < 8; $i++) {
            if (strlen($columndata) > $i) {
                switch ($columndata[$i]) {
                    case '1':
                        $data["selectForm" . $index] = "天気予報";

                        break;

                    case '2':
                        $data["selectForm" . $index] = "ビジネス";

                        break;

                    case '3':
                        $data["selectForm" . $index] = "エンターテイメント";

                        break;

                    case '4':
                        $data["selectForm" . $index] = "全般";

                        break;

                    case '5':
                        $data["selectForm" . $index] = "健康";

                        break;

                    case '6':
                        $data["selectForm" . $index] = "サイエンス";

                        break;

                    case '7':
                        $data["selectForm" . $index] = "スポーツ";

                        break;

                    case '8':
                        $data["selectForm" . $index] = "テクノロジー";

                        break;

                    default:

                        break;
                }
                $index += 1;
                continue;
            }
        $data["selectForm" . $index] = "未設定";
        $index += 1;
        }

        unset($data['column_order']);
        $this->set(compact('data'));
        $this->set('header', ['pageTitle'=>'My News', 'subtitle'=>'個人設定編集']);
        $this->set('footer', ['copyright'=>'Tikara']);
    }

    // editconfirm
    public function editconfirm() {
        $this->viewBuilder()->setLayout('set');
          $this->Jcodes = TableRegistry::getTableLocator()->get('Jcodes');
          $entityData = $this->Jcodes->get("1");
          $pref_city = $entityData['json'];
          $this->set('pref_city',$pref_city);
        
          if ($this->request->is('post')) {
            $data = $this->request->getData();
            $this->session->write('inputs', $data);
            $this->newsUsers = $this->NewsUsers->newEmptyEntity($data);
            $this->set('data', $data);
            $this->set('id', $data['id']);
          } else {
            $this->set('name', 'nasi');
          }
         
          $this->set('username', $this->username);
          $this->set('linkAction', $this->linkAction);
          $this->set('logintag', $this->logintag);
          $this->set('header', ['pageTitle'=>'My News', 'subtitle'=>'確認画面']);
          $this->set('footer', ['copyright'=>'Tikara']);
          
      }
      
      // updata method editからpostされたデータをデータベースに保存
      // editの後、更新が反映されない、プロパティの情報を変更する必要がある(authenticationを更新する)
      public function update() {
        $this->viewBuilder()->setLayout('set');
          if ($this->request->is('post')) {
            if (!$this->session->check('inputs')) {
              $this->Flash->error('セッションがありません。');
              return $this->redirect(['action' => 'edit']);
            }
            $data = $this->session->consume('inputs');
            $setData = "";
            foreach ($data as $key => $value) {
              if (strlen($key) > 11 || substr($key, 0, 10) === "selectForm") {
                $setData .= (string)$value;
                unset($data[$key]);
              }
            }
            $data['column_order'] = $setData;
            $getid = intval($data['id']);
            $entity = $this->NewsUsers->get($getid);
            $entity = $this->NewsUsers->patchEntity($entity, $data);
            if ($this->NewsUsers->save($entity)) {
              $this->set('data', "成功");
            } else {
              $this->set('data', "失敗");
            }
          }
          $this->set('username', $this->username);
          $this->set('linkAction', $this->linkAction);
          $this->set('logintag', $this->logintag);
          $this->set('header', ['pageTitle'=>'My News', 'subtitle'=>'情報更新']);
          $this->set('footer', ['copyright'=>'Tikara']);
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
      $this->viewBuilder()->setLayout('set');
      $person = $this->NewsUsers->get($id);
      if ($this->NewsUsers->delete($person)) {
          $this->set('data', "削除完了");
          $this->Authentication->logout();
          $this->session->destroy();
      } else {
          $this->set('data', "削除失敗");
      }
      $this->set('username', $this->username);
      $this->set('linkAction', $this->linkAction);
      $this->set('logintag', $this->logintag);
      $this->set('header', ['pageTitle'=>'My News', 'subtitle'=>'アカウント削除']);
      $this->set('footer', ['copyright'=>'Tikara']);
        
    }

    // Main method  ニュース一覧
    // ニュース情報はプロパティのデータを元の取得
    public function main() {
        $this->viewBuilder()->setLayout('newsUsers');
        $this->set('username', $this->username);
        $this->set('linkAction', $this->linkAction);
        $this->set('logintag', $this->logintag);
        // prefectureの修正（1部文字列のスペースがjqueryで受け付けないため、スペースをXに置き換えている）
        $modPrefecture = "";
        if (!strpos($this->prefecture, 'X')) {
          $modPrefecture = str_replace("X", " ", $this->prefecture);
        }
        // $data = $this->People->getNews();
        // /GetInfo/GetNewsクラスをインスタンス化し必要なデータを取得する
        // localが設定されているかチェックし、無い場合は$getareaにprefectureを入れる
        $getarea = $this->local == "" ?  $modPrefecture : $this->local ; 
          
        $getNews = new GetNews($getarea, $this->column);
        $returndata = $getNews->getNews();

        // 都道府県、市町村のjsonデータを取る（Mysql)
        $this->Jcodes = TableRegistry::getTableLocator()->get('Jcodes');
        $entityData = $this->Jcodes->get("1");
        if (gettype($entityData['json']) === "string") {
          $pref_city = json_decode($entityData['json'], true); // associativeをtrueとすることで連想配列形式にする
          // var_dump($pref_city);
        } else {
          $pref_city = $entityData['json'];
        }

        // $data = $returndata['entertainment']['articles'][0]['title'];
    
        // if (empty($getNews)) {
        //   $data = "から";
        // } else {
        //   $data = gettype($getNews);
        // }
        // $this->set('getarea', $getarea);
        // $this->set('jsontype', $pref_city);
        $this->set('col', $this->column);
        // $this->set('col', '322');
        $this->set('data', $returndata);
        $this->set('id', $this->id);
        $this->set('pref', $this->prefecture);
        $this->set('local', $this->local);
        $this->set('pref_city', $pref_city);
        $this->set('header', ['pageTitle'=>'My News', 'subtitle'=>'ニュース一覧']);
        $this->set('footer', ['copyright'=>'k-s']);

        // 前のページのURLを取得する
        // $tag = explode("/", $this->request->referer(true));
        // $this->set('tag', $tag[2]);
      }

    // Newslist method 各ニュースのリスト表示
    public function newslist($cat) {
        $this->viewBuilder()->setLayout('newsUsers');
        $category = $cat;
        $getNews = new GetNews($this->prefecture, $this->column);
        $returnData = $getNews->getCategoryList($category);

        $this->set('username', $this->username);
        $this->set('linkAction', $this->linkAction);
        $this->set('logintag', $this->logintag);
        $this->set('data', $returnData);
        $this->set('id', $this->id);
        $this->set('category', $category);
        $this->set('pref', $this->prefecture);
        $this->set('local', $this->local);
        $this->set('header', ['pageTitle'=>'My News', 'subtitle'=>$category . " news"]);
        $this->set('footer', ['copyright'=>'k-s']);

    }

    // WeatherDetail method天気予報の表示
    public function weatherDetail($prefecture, $local = "") {
        $this->viewBuilder()->setLayout('newsUsers');
        //引数の場所の天気情報を取得する
        // prefectureの修正（1部文字列のスペースがjqueryで受け付けないため、スペースをXに置き換えている）
        $modPrefecture = "";
        if (strpos($prefecture, 'X') > 0) {
          $modPrefecture = str_replace("X", " ", $prefecture);
        } else {
          $modPrefecture = $prefecture;
        }
        $local = $local;
        $target = $local == "" ? $modPrefecture : $local;
        $getNews = new GetNews($target, $this->column);
        $returnData = $getNews->getWeatherDitail();

        // 都道府県、市町村のjsonデータを取る（Mysql)
        $this->Jcodes = TableRegistry::getTableLocator()->get('Jcodes');
        $entityData = $this->Jcodes->get("1");
        if (gettype($entityData['json']) === "string") {
          $pref_city = json_decode($entityData['json'], true); // associativeをtrueとすることで連想配列形式にする
          // var_dump($pref_city);
        } else {
          $pref_city = $entityData['json'];
        }
       

        // ログイン情報
        $this->set('username', $this->username);
        $this->set('linkAction', $this->linkAction);
        $this->set('logintag', $this->logintag);

        // お天気情報
        $this->set('pref_city',$pref_city);
        $this->set('modPrefecture', $modPrefecture);
        $this->set('prefecture', $prefecture);
        $this->set('local', $local);
        $this->set('data', $returnData);
        $this->set('id', $this->id);

        // header、footer情報
        $this->set('header', ['pageTitle'=>'My News', 'subtitle'=>'天気予報']);
        $this->set('footer', ['copyright'=>'k-s']);

    }
}
