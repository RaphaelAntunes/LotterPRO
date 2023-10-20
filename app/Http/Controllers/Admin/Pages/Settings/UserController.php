<?php

namespace App\Http\Controllers\Admin\Pages\Settings;

use App\Helper\Money;
use App\Http\Controllers\Controller;
use App\Models\TransactBalance;
use App\Models\User;
use App\Models\Client;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\UserResource;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\TypeGame;
use App\Models\TypeGameValue;
use App\Models\BichaoModalidades;
use App\Models\LogUsuario;


class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user()->hasPermissionTo('read_user')){
            abort(403);
        }

        if ($request->ajax()) {
            $user = $this->user->get()->where('id', '<>', auth()->user()->id);
            return DataTables::of($user)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    $data = '';
                    if(auth()->user()->hasPermissionTo('update_user')){
                        $data .= '<a href="' . route('admin.settings.users.edit', ['user' => $user->id]) . '">
                        <button class="btn btn-sm btn-warning" title="Editar"><i class="far fa-edit"></i></button>
                    </a>';
                    }
                    if(auth()->user()->hasPermissionTo('delete_user')) {
                        $data .= '<button class="btn btn-sm btn-danger" id="btn_delete_user" user="' . $user->id . '" title="Deletar" data-toggle="modal" data-target="#modal_delete_user"> <i class="far fa-trash-alt"></i></button>';
                    }
                    return $data;
                })
                ->editColumn('name', function ($user) {
                    return $user->name. ' '. $user->last_name;
                })
                ->editColumn('created_at', function ($user) {
                    return Carbon::parse($user->created_at)->format('d/m/Y');
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.settings.user.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indicatedByLevel()
    {
        return view('admin.pages.settings.user.indicatedByLevel');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indicated()
    {
        return view('admin.pages.settings.user.indicated');
    }

        public function privado(User $user)
    {
        
        return view('admin.pages.settings.user.edit2', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('create_user')){
            abort(403);
        }
        
        $roles = Role::orderBy('name')->get();

        return view('admin.pages.settings.user.create', compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->hasPermissionTo('create_user')){
            abort(403);
        }

        // parte de tratamento de erro
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'last_name' => 'required|max:100',
            'email' => 'unique:App\Models\User|email:rfc|required|max:100',
            'password' => 'min:8|same:password_confirmation|required|max:15',
            'password_confirmation' => 'required|max:15',
            'commission' => 'required|integer|between:0,100',
        ]);
        $indicador = $request->indicador;
        if($indicador == null || $indicador == 0){
            $indicador = 1; 
        }
        
        $auxRole;
        foreach ($request->roles as $role){
            $auxRole = $role;
        }

        try {
            $balanceRequest = 0;
            if($request->has('balance') && !is_null($request->balance)){
                $balanceRequest = Money::toDatabase($request->balance);
            }

            if($request->has('commission') && !is_null($request->commission)){
                $balanceRequest += Money::toDatabase(($request->commission/100) * $balanceRequest);
            }

            
           

            $user = new $this->user;
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->commission = $request->commission;
            $user->indicador = $indicador;
            if(!is_null($request->telefone)){
                $telefoneCompleto =  Str::of($request->telefone)->replaceMatches('/[^A-Za-z0-9]++/', '');
                $ddd = Str::of($telefoneCompleto)->substr(0, 2);
                $telefone = Str::of($telefoneCompleto)->substr(2);
                $user->ddd = $ddd;
                $user->phone = $telefone;
             }
            if (!empty($request->link)) {
                $user->link = $request->link;
            }
           

                $data = $request->only('pix', 'cpf');
                $passardados = New Client;
                $passardados->cpf = $data['cpf'];
                $passardados->name = $request->name;
                $passardados->last_name = $request->last_name;
                $passardados->email = $request->email;
                if(!is_null($request->telefone)){
                    $telefoneCompleto =  Str::of($request->telefone)->replaceMatches('/[^A-Za-z0-9]++/', '');
                    $ddd = Str::of($telefoneCompleto)->substr(0, 2);
                    $telefone = Str::of($telefoneCompleto)->substr(2);
                    $passardados->ddd = $ddd;
                    $passardados->phone = $telefone;
                 }
                $passardados->pix  = $data['pix'];
                $passardados->save();

            // enviar pra cliente
            if($auxRole == 6){

                $user->type_client = 1;
                
               /* $validatedData = $request->validate([
                    'pix' => 'required|max:60',
                    'telefone' => 'required|max:15',
                    'cpf' => 'required|max:11'
                ]);*/

            }
            $user->balance = $balanceRequest;

            $user->save();

           // registrar a criação no banco de dados/tabela log
           
           //Converter o Array de Permissões em String para Salvar no Banco
           $permissoes_string = implode(",", $request->roles);


            $logUsuario = new LogUsuario();
            $logUsuario->user_id_sender = auth()->id();
            $logUsuario->nome_funcao = 'Criação';
            $logUsuario->user_id = $user->id; //guardar o id do usuario que esta sendo modificado
            $createdUser = [
                'name' => $user->name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'password' => $user->password,
                'type_client' => $user->type_client,
                'telefone' => $request->telefone,
                'pix' => $user->pix,
                'cpf' => $data['cpf'],
                'indicador' => $user->indicador,
                'balance' => $user->balance,
                'balanceAtual' => $user->balanceAtual,
                'commission' => $user->commission,
                'Permissoes' => $permissoes_string,
            ];
            // informações do user criado 

            // filtrar os campos preenchidos do array $createdUser
            
            foreach ($createdUser as $field => $value) { //unidade individual de armazenamento de informações que pode conter dados específicos
                if ($value !== null && $value !== '') {
                    $usuarioNovo[$field] = $value;
                }
                else if ($value == null && $value == '') {
                    // se nao existir no campo um novo valor, remover o campo do array $createdUser
                    unset($createdUser[$field]);
                }
            }
            
            $description = 'Usuário ' . auth()->id() . ' criou o usuário ' . $user->id . ' com os seguintes dados:' . PHP_EOL;
            foreach ($createdUser as $field => $value) {
                $description .= $field . ': ' . $value . PHP_EOL;
            }
            $logUsuario->description = $description;
            $logUsuario->save();
            
            
            TransactBalance::create([
                'user_id_sender' => auth()->id(),
                'user_id' => $user->id,
                'value' => (float) Money::toDatabase($request->balance),
                'old_value' => (float) Money::toDatabase(0),
                'value_a' => (float) Money::toDatabase(0),
            ]);
            
            $usuarioNovo = [];
            if (!empty($request->roles)) {
                foreach ($request->roles as $role){
                    $userRoles[] = Role::whereId($role)->first();
                }
            }
            if(isset($userRoles) && !empty($userRoles)){
                $user->syncRoles($userRoles);
            }else{
                $user->syncRoles(null);
            }

            return redirect()->route('admin.settings.users.index')->withErrors([
                'success' => 'Usuário cadastrado com sucesso'
            ]);

        } catch (\Exception $exception) {

            return redirect()->route('admin.settings.users.create')->withErrors([
                'error' => config('app.env') != 'production' ? $exception->getMessage() : 'Ocorreu um erro ao criar o usuário, tente novamente'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(!auth()->user()->hasPermissionTo('update_user') && !auth()->user()->hasPermissionTo('edit_all')){
            abort(403);
        }   

        $roles = Role::orderBy('name')->get();
        foreach ($roles as $role){
            if($user->hasRole($role->id)){
                $role->can = true;
            }else{
                $role->can = false;
            }
        }
        $types = TypeGame::get();
        $type_values = TypeGameValue::get()->toArray();
        $bichao = BichaoModalidades::get();

        $commissions = new \StdClass();
        $commissions->commission_individual = static::createCommissionIndividual($user->commission_individual);
        $commissions->commission_individual_lv_1 = static::createCommissionIndividual($user->commission_individual_lv_1);
        $commissions->commission_individual_lv_2 = static::createCommissionIndividual($user->commission_individual_lv_2);
        $commissions->commission_individual_bichao = static::createCommissionIndividual($user->commission_individual_bichao);
        $commissions->commission_individual_bichao_lv_1 = static::createCommissionIndividual($user->commission_individual_bichao_lv_1);
        $commissions->commission_individual_bichao_lv_2 = static::createCommissionIndividual($user->commission_individual_bichao_lv_2);

        if(auth()->user()->hasPermissionTo('edit_all')){
            return view('admin.pages.settings.user.edit2', compact('user', 'types', 'type_values', 'bichao', 'commissions'));
        }else{
        return view('admin.pages.settings.user.edit', compact('user', 'roles', 'types', 'type_values', 'bichao', 'commissions'));
        }
    }

    private static function createCommissionIndividual($data) {
        $response = [];
        if ($data = @json_decode($data)) {
            foreach ($data as $value) {
                $response[$value->type_id] = $value->commission;
            }
        }
        return $response;
    }

    /**
     * Update the specified resource in storage..
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       
      if(!auth()->user()->hasPermissionTo('update_user') && !auth()->user()->hasPermissionTo('edit_all') ){
            abort(403);
        }
        $telefone = null;
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'last_name' => 'required|max:100',
            'email' => 'email:rfc|required|max:100|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|same:password_confirmation|max:15',
            'password_confirmation' => 'sometimes|required_with:password|max:15',
            'commission' => 'integer|between:0,100',
            'commission_lv_1' => 'integer|between:0,100',
            'commission_lv_2' => 'integer|between:0,100',
        ]);

        $commission_individual = array_filter($request->commission_individual, fn ($val) => $val > 0);
        $commission_individual = array_map(fn ($key, $val) => ['type_id' => $key, 'commission' => $val], array_keys($commission_individual), $commission_individual);

        $commission_individual_lv_1 = array_filter($request->commission_individual_lv_1, fn ($val) => $val > 0);
        $commission_individual_lv_1 = array_map(fn ($key, $val) => ['type_id' => $key, 'commission' => $val], array_keys($commission_individual_lv_1), $commission_individual_lv_1);

        $commission_individual_lv_2 = array_filter($request->commission_individual_lv_2, fn ($val) => $val > 0);
        $commission_individual_lv_2 = array_map(fn ($key, $val) => ['type_id' => $key, 'commission' => $val], array_keys($commission_individual_lv_2), $commission_individual_lv_2);

        $commission_individual_bichao = array_filter($request->commission_individual_bichao, fn ($val) => $val > 0);
        $commission_individual_bichao = array_map(fn ($key, $val) => ['type_id' => $key, 'commission' => $val], array_keys($commission_individual_bichao), $commission_individual_bichao);

        $commission_individual_bichao_lv_1 = array_filter($request->commission_individual_bichao_lv_1, fn ($val) => $val > 0);
        $commission_individual_bichao_lv_1 = array_map(fn ($key, $val) => ['type_id' => $key, 'commission' => $val], array_keys($commission_individual_bichao_lv_1), $commission_individual_bichao_lv_1);

        $commission_individual_bichao_lv_2 = array_filter($request->commission_individual_bichao_lv_2, fn ($val) => $val > 0);
        $commission_individual_bichao_lv_2 = array_map(fn ($key, $val) => ['type_id' => $key, 'commission' => $val], array_keys($commission_individual_bichao_lv_2), $commission_individual_bichao_lv_2);

     
        
         // campos editaveis do formulario
         //Converter o Array de Permissões em String para Salvar no Banco
         $roles_request;
         foreach ($request->roles as $role){
            $roles_request = $role;
        }

         //$permissoes_string = implode(",", $request->roles);
        
        $dddInteiro = null;
        $telefoneInteiro = null;

    
        if(!is_null($request->telefone)){
            $telefoneCompleto =  Str::of($request->telefone)->replaceMatches('/[^A-Za-z0-9]++/', '');
            $ddd = Str::of($telefoneCompleto)->substr(0, 2); 
            $telefone = Str::of($telefoneCompleto)->substr(2);
            $telefoneString = strval($telefone);
            $telefoneInteiro = intval($telefoneString);
            $dddString = strval($ddd);
            $dddInteiro = intval($dddString);
        }
    
         //novos valores 
         $camposForms = [
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'ddd' => $dddInteiro,
            'telefone' => $telefoneInteiro,
            'password' => $request->input('password'),
            'type_client' => $request->input('type_client'),
            'pix' => $request->input('pix'),
            'cpf' => $request->input('cpf'),
            'indicador' => $request->input('indicador'), 
            'balance' => $request->input('balance'),
            'balanceAtual' => strval((float) Money::toDatabase($request->input('balanceAtual'))),
            'commission' => $request->input('commission'),
            'Permissoes' => $roles_request,
            ];
            //dd($camposForms);
        

            if($request->input('balance')  <= 0){
                unset($camposForms['balance']);      
            }

            if($request->input('balance') === null){
                unset($camposForms['balance']);      
            }

            if($request->password === null){
                unset($camposForms['password']);
            }
            if($request->type_client === null){
                unset($camposForms['type_client']);
            }

        $indicador = $request->indicador;
        $indicadorAntigo = strval($user->indicador); // Deixar aqui para LogUser //transformou em uma string 
        if($indicador == null || $indicador == 0){
            $indicador = 1;
        }
       // verifica se o novo indicador é igual ao ID do usuário atual

        if ($indicador == $user->id) {
            return back()->withErrors(['error' => 'Você não pode indicar a si mesmo.']);
        }

        // verifica se o novo indicador já foi indicado pelo usuário atual
        $indicadorVerificated = User::find($indicador);
        if ($indicadorVerificated && $indicadorVerificated->indicador == $user->id) {
            return back()->withErrors(['error' => 'O usuário indicador já é indicado pelo usuário.']);
        }
        // atualiza o campo indicador normalmente
        $user->indicador = $indicador;
        $user->save();

        // return redirect()->back()->with('success', 'O campo indicador foi atualizado com sucesso.');

        $request['cpf'] = preg_replace('/[^0-9]/', '', $request->cpf);

        try
        {
            if(auth()->user()->hasPermissionTo('update_user')){
            $newBalance = 0;
            $newBonus = 0;
            $ajuste = 0;
            $auxRole;
        foreach ($request->roles as $role){
            $auxRole = $role;
        }

            if($request->has('balance') && !is_null($request->balance) && $request->balance > 0){
                if($user->balance != $request->balance ){
                $oldBalance = $user->balance;
                $oldBonus = $user->bonus;
                $balanceRequest = (float) Money::toDatabase($request->balance);
                $newBalanceRequest = $balanceRequest + (($user->commission/100) * $balanceRequest);
                $newBalance = $user->balance +  $newBalanceRequest;
                $newBonus = $user->bonus + ($user->commission/100) * $balanceRequest;
                //$newBalance = $user->balance +  $balanceRequest;
                }
            }
        

            $userClient = Client::where("email", $user->email)->first();
            if ($userClient) {
                if (!is_null($request->name)) {
                    $userClient->name = $request->name;
                }
                
                if (!is_null($request->last_name)) {
                    $userClient->last_name = $request->last_name;
                }
                
                if (!is_null($request->email)) {
                    $userClient->email = $request->email;
                }

                if (!is_null($request->cpf)) {
                    $userClient->cpf = $request->cpf;
                }
                
                if (!is_null($telefone)) {
                    $userClient->ddd = $ddd;
                    $userClient->phone = $telefone;
                } else{
                    $userClient->ddd = null; //definir como nulo se nao houver telefone
                    $userClient->phone = null;
                }

                if (!is_null($request->pix)) {
                    $userClient->pix = $request->pix;  
                }
    
        
                $userClient->save();
                
            }

            // armazena os valores originais dos campos que serão rastreados
            $userRoles = [];
            foreach ($user->roles as $role){
                $userRoles[] = $role->id;
            }
            $user_string_roles = implode(",", $userRoles);


            //valor antigo
            $originalValues = [
            'name' => $user->name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'password' => $user->password,
            'type_client' => $user->type_client,
            'ddd' => $user->ddd,
            'telefone' => $user->phone,
            'pix' => $user->pix,
            'cpf' => $user->cpf,
            'indicador' => $indicadorAntigo, 
            'balance' => $user->balance,
            'balanceAtual' => $user->balance,
            'commission' => $user->commission,
            'Permissoes' => $user_string_roles,
            ];
            //dd($originalValues);


            // array para armazenar as alterações
            $alteracoes = [];

            // comparar os valores recebidos com os valores originais
            foreach ($camposForms as $campo => $novoValor) {
            $valorAntigo = $originalValues[$campo];


            if ($novoValor !== $valorAntigo) {
            // se o novo valor for diferente do valor original, armazene a alteração no array $alteracoes
            $alteracoes[$campo] = [
            'valorAntigo' => $valorAntigo,
            'novoValor' => $novoValor,
                    ];
                }
                else if($valorAntigo == null && $novoValor == null){
                // se o novo valor for igual ao valor original, remover o campo do array $alteracoes
                unset($alteracoes[$campo]);
                }
            }

            // descrição das alterações feitas pelo usuário
            $description = 'Usuário ' . auth()->id() . ' fez alterações em: ' . PHP_EOL; //caractere de quebra de linha adequado para o sistema operacional em que o código está sendo executado
            foreach ($alteracoes as $campo => $dadosAlterados) {
            $valorAntigo = $dadosAlterados['valorAntigo'];
            $novoValor = $dadosAlterados['novoValor'];
            $description .= " - $campo: valor antigo '$valorAntigo', novo valor '$novoValor'" . PHP_EOL;
            }

            // registrar a alteração de edição no banco de dados/tabela log
            $logUsuario = new LogUsuario();
            $logUsuario->user_id_sender = auth()->id();
            $logUsuario->user_id = $user->id; //guardar o id do usuario que esta sendo modificado
            $logUsuario->nome_funcao = 'Edição';
            $logUsuario->description = $description;
            $logUsuario->save();
  
            // atualizar o $user com os novos valores
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            !empty($request->password) ? $user->password = bcrypt($request->password) : null;
            $user->status = isset($request->status) ? 1 : 0;
            $user->commission = $request->commission;
            $user->commission_lv_1 = $request->commission_lv_1;
            $user->commission_lv_2 = $request->commission_lv_2;
            $user->commission_individual = json_encode($commission_individual);
            $user->commission_individual_lv_1 = json_encode($commission_individual_lv_1);
            $user->commission_individual_lv_2 = json_encode($commission_individual_lv_2);
            $user->commission_individual_bichao = json_encode($commission_individual_bichao);
            $user->commission_individual_bichao_lv_1 = json_encode($commission_individual_bichao_lv_1);
            $user->commission_individual_bichao_lv_2 = json_encode($commission_individual_bichao_lv_2);
            $user->pix = $request->pix;

            if(!is_null($telefone)){
            $user->ddd = $ddd;
            $user->phone = $telefone;
            }

            if($auxRole != 6){
                $user->type_client = null;
            }else if($auxRole == 6){
                $user->type_client = 1;
            }
            
            if($newBalance > 0){
                $user->balance = $newBalance;
            }else{
                $ajuste = 1;
                $oldBalance = $user->balance;
                $user->balance = (float) Money::toDatabase($request->balanceAtual);

            }

           /* if($newBonus > 0){
                $user->bonus = $newBonus;
            }*/
            
            $user->indicador = $indicador;

            if (!empty($request->link)) {
                $user->link = $request->link;
            }
            // salvar no banco de dados
            $user->save();

            

            if((float) $newBonus > 0){
               
                // $this->storeTransact($user, ($user->commission/100) * $balanceRequest,$oldBonus,  $newBalance, 'bonus');
            }

            if((float) $newBalance > 0){
                
                $this->storeTransact($user, $balanceRequest, $oldBalance ,  $newBalance);
            }
            if($ajuste == 1 && $oldBalance != (float) Money::toDatabase($request->balanceAtual)){
                $this->storeTransact($user, (float) Money::toDatabase($request->balanceAtual), $oldBalance,  $newBalance);
            }
            }else{
               $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            !empty($request->password) ? $user->password = bcrypt($request->password) : null; 
                        if (!empty($request->link)) {
                $user->link = $request->link;
            }
            $user->save();
            } 

            if($request->type_client == 1 || auth()->user()->hasPermissionTo('edit_all')){
                return redirect()->route('admin.home')->withErrors([
                'success' => 'Usuário alterado com sucesso'
                ]);
            }
            else{
            if (!empty($request->roles)) {
                
                foreach ($request->roles as $role){
                    $userRoles[] = Role::whereId($role)->first();
                }
            }
            if(isset($userRoles) && !empty($userRoles)){
                $user->syncRoles($userRoles);
            }else{
                $user->syncRoles(null);
            }
        }
        
            return redirect()->route('admin.settings.users.index')->withErrors([
                'success' => 'Usuário alterado com sucesso'
            ]);

        } catch (\Exception $exception) {

            return redirect()->route('admin.settings.users.edit', ['user' => $user->id])->withErrors([
                'error' => config('app.env') != 'production' ? $exception->getMessage() : 'Ocorreu um erro ao alterar o usuário, tente novamente'
            ]);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!auth()->user()->hasPermissionTo('delete_user')){
            abort(403);
        }

        try {
            $user->delete();

            // registrar a alteração de excluir no banco de dados/tabela log
            $logUsuario = new LogUsuario();
            $logUsuario->user_id_sender = auth()->id();
            $logUsuario->user_id = $user->id; //guardar o id do usuario que esta sendo modificado
            $logUsuario->nome_funcao = 'Exclusão';
            $logUsuario->description = 'Usuário ' . auth()->id() . ' excluiu o usuário ' . $user->id; //colocar tudo que foi modificado
            $logUsuario->save();


            return redirect()->route('admin.settings.users.index')->withErrors([
                'success' => 'Usuário deletado com sucesso'
            ]);

        } catch (\Exception $exception) {

            return redirect()->route('admin.settings.users.index')->withErrors([
                'error' => config('app.env') != 'production' ? $exception->getMessage() : 'Ocorreu um erro ao deletar o usuário, tente novamente'
            ]);

        }

    }

    public function Balance($userId)
    {
        $historybalance = TransactBalance::with('user', 'userSender')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        foreach ($historybalance as $h){
            $h->data = Carbon::parse($h->created_at)->format('d/m/y à\\s H:i');
            $h->responsavel = $h->userSender->name;
            $h->value = Money::toReal($h->value);
            $h->old_value = Money::toReal($h->old_value);
            $h->value_a = Money::toReal($h->value_a);
            $h->type = $h->type;
            $user = $h->user;
        }
        return view('admin.pages.settings.user.statementBalance', ['historybalance' => $historybalance, 'user' => $user]);

    }
    
    public function statementBalancea($userId)
    {

            $user = User::find($userId);
            

            $historybalance = TransactBalance::with('user', 'userSender')
            ->where('user_id', $userId)
            ->where('type', 'like', '%add%') //busca os registros que tem a palavra add em qualquer posicao da coluna 
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        foreach ($historybalance as $h){
            $h->data = Carbon::parse($h->created_at)->format('d/m/y à\\s H:i');
            $h->responsavel = $h->userSender->name;
            $h->value = Money::toReal($h->value);
            $h->old_value = Money::toReal($h->old_value);
            $h->value_a = Money::toReal($h->value_a);
            $h->type = $h->type;
            $user = $h->user;
        }
     

        return view('admin.pages.settings.user.statementBalancea', compact('user', 'historybalance'));
    }

    public function storeTransact(User $user, string $value, string $oldValue, string $value_a, string $wallet = 'balance')
    {
        TransactBalance::create([
            'user_id_sender' => auth()->id(),
            'user_id' => $user->id,
            'value' => $value,
            'old_value' => $oldValue,
            'value_a' => $value_a,
            'wallet' => $wallet
        ]);
         $retornof = "sucesso";
        return $retornof;
    }

    public function readAllNotifications(Request $request)
    {
        $authUser = auth()->user();

        $authUser->notifications->markAsRead();

        if($authUser->unreadNotifications->count() == 0) {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function getAllNotifications(Request $request)
    {
        $authUser = auth()->user();

        return response()->json([
            'notifications' => $authUser->notifications,
            'unreadCount' => $authUser->unreadNotifications->count()
        ]);
    }

    public function logInAs(Request $request, User $user)
    {
        if(!auth()->user()->hasPermissionTo('update_user') && !auth()->user()->hasPermissionTo('edit_all') ){
            abort(403);
        }
        
        \Auth::user()->impersonate($user);

        return redirect('/');
    }

    public function logoutAs()
    {
        \Auth::user()->leaveImpersonation();
        
        return redirect('/');
    }

    public function listSelect(Request $request)
    {
        $users = User::orWhere('name', 'like', '%' . $request->q . '%')->orWhere('last_name', 'like', '%' . $request->q . '%')->get();

        return UserResource::collection($users);
    }
}
