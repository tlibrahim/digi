<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Route::get('test' ,function() {
// 	echo 'test<br>';
// 	dd(Hash::check('hashedpass' ,\App\CrmUser::find(21)->password));
// });

Route::middleware(['auth'])->group(function() {
	Route::get('/', function () {
	    return view('home');
	});

	Route::get('/logout', function () {
		Auth::logout();
		return redirect('login');
	});
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('positions' ,'PositionController@home');
	Route::get('positions/add' ,'PositionController@add');
	Route::post('positions/add' ,'PositionController@addPost');
	Route::get('positions/edit/{id}' ,'PositionController@edit');
	Route::post('positions/edit/{id}' ,'PositionController@editPost');
	Route::get('positions/delete/{id}' ,'PositionController@delete');

	Route::get('departements', 'DepartmentController@index');
	Route::get('departements/add', 'DepartmentController@create');
	Route::post('departements/add', 'DepartmentController@store');
	Route::get('departements/edit/{id}' ,'DepartmentController@edit');
	Route::post('departements/edit/{id}' ,'DepartmentController@update');
	Route::get('departements/delete/{id}' ,'DepartmentController@delete');

	Route::get('tasks', 'TasksController@index');
	Route::get('tasks/add', 'TasksController@create');
	Route::post('tasks/add', 'TasksController@store');
	Route::get('tasks/edit/{id}' ,'TasksController@edit');
	Route::post('tasks/edit/{id}' ,'TasksController@update');
	Route::get('tasks/delete/{id}' ,'TasksController@delete');
	Route::get('tasks/deleteinput/{id}' ,'TasksController@deleteinput');
	Route::get('tasks/render/inputRow' ,'TasksController@renderInputRow');
	Route::get('taskapproved', 'TasksController@taskapproved');
	Route::get('gettasks', 'TasksController@gettasks');
	Route::get('checktask', 'TasksController@checktask');

	Route::get('services' ,'ServiceController@index');
	Route::get('services/add' ,'ServiceController@addGet');
	Route::post('services/add' ,'ServiceController@addPost');
	Route::get('services/edit/{id}' ,'ServiceController@editGet');
	Route::post('services/edit/{id}' ,'ServiceController@editPost');
	Route::get('services/delete/{id}' ,'ServiceController@delete');

	Route::get('subservices' ,'SubServiceController@index');
	Route::get('subservices/add' ,'SubServiceController@addGet');
	Route::post('subservices/add' ,'SubServiceController@addPost');
	Route::get('subservices/edit/{id}' ,'SubServiceController@editGet');
	Route::post('subservices/edit/{id}' ,'SubServiceController@editPost');
	Route::get('subservices/delete/{id}' ,'SubServiceController@delete');

	Route::get('values' ,'SubServiceValuesController@index');
	Route::get('values/add' ,'SubServiceValuesController@addGet');
	Route::post('values/add' ,'SubServiceValuesController@addPost');
	Route::get('values/edit/{id}' ,'SubServiceValuesController@editGet');
	Route::post('values/edit/{id}' ,'SubServiceValuesController@editPost');
	Route::get('values/delete/{id}' ,'SubServiceValuesController@delete');

	Route::get('users' ,'UsersController@index');
	Route::get('users/add' ,'UsersController@addGet');
	Route::post('users/add' ,'UsersController@addPost');
	Route::get('users/edit/{id}' ,'UsersController@editGet');
	Route::post('users/edit/{id}' ,'UsersController@editPost');
	Route::get('users/delete/{id}' ,'UsersController@delete');

	Route::resource('permissions' ,'PermissionsController');

	Route::resource('industries' ,'IndustriesController');
	Route::resource('levels' ,'LevelsController');
	Route::resource('technologies' ,'TechnologiesController');
	Route::resource('look-and-feels' ,'LookAndFeelsController');
	Route::resource('content' ,'ContentController');
	Route::resource('post-types' ,'PostTypesController');
	Route::resource('promote-status' ,'PromoteStatusController');
	Route::resource('management' ,'ManagementController');
	Route::resource('feedback-forms' ,'FeedbackFormsController');
	Route::get('feedback-forms/render/{id}' ,'FeedbackFormsController@renderFormBody');

	Route::resource('potentials' ,'PotentialsController');
	
	Route::post('potentials/connection/{id}' ,'PotentialsController@postConnection');
	Route::post('potentials/connection/{id}/add' ,'PotentialsController@addConnection');
	Route::post('potentials/connection/{id}/edit/{con_id}' ,'PotentialsController@editConnection');
	Route::get('potentials/connections/delete/{con_id}' ,'PotentialsController@deleteConnection');

	Route::post('potentials/profiling/{id}' ,'PotentialsController@postProfiling');
	Route::get('potentials/remove/{key}/{id}' ,'PotentialsController@removeFromProfiling');
	Route::post('potentials/upload-logo/{profile_id}/{pot_id}' ,'PotentialsController@uploadLogo');
	Route::get('potentials/render/{key}' ,'PotentialsController@renderRow');
	Route::post('potentials/addfeedback/{pot_id}' ,'PotentialsController@addFeedback');
	Route::post('potentials/assign/{pot_id}' ,'PotentialsController@assignUser');
	Route::get('potentials/load/website-companies' ,'PotentialsController@loadWebsiteCompanies');
	Route::get('potentials/profile-view/render/{id}' ,'PotentialsController@loadProfileView');
	Route::get('potentials/active/{id}' ,'PotentialsController@active');
	Route::get('potentials-quotation/{com_id}' ,'PotentialsController@getQuotation');
	Route::post('potentials-quotation/add' ,'PotentialsController@addQuotation');
	Route::get('potentials-delete-service/{quot_ser_id}' ,'PotentialsController@delQuotSer');
	Route::post('potentials-add-meeting-feedback' ,'PotentialsController@addMeetingFeedback');
	Route::post('potentials-add-proposal' ,'PotentialsController@addProposal');
	Route::get('potentials-load-pop-up/{key}/{comp_id}', 'PotentialsController@loadPopUp');
	Route::get('load-potentials/{start_perc?}/{end_perc?}', 'PotentialsController@loadPotentials');
	Route::get('load-potential-profiling/{com_id}', 'PotentialsController@loadPotentialProfiling');
	Route::get('load-potential-feedback/{com_id}', 'PotentialsController@loadPotentialFeedback');

	Route::get('customers' ,'CustomersController@index');
	Route::get('customers/load-add-lead/{id}' ,'CustomersController@loadProjects');
	Route::post('customers/add/{ajax?}' ,'CustomersController@addCustomer');
	Route::get('customers/leads/{id}' ,'CustomersController@companyLeads');
	Route::get('customers/moderator/{id}' ,'CustomersController@moderator');

	Route::get('task-assign' ,'TaskAssignController@index');
	// Route::get('task-assign-loaders/{key}/{id?}' ,'TaskAssignController@renderLoaders');
	// Route::post('task-assign/add' ,'TaskAssignController@add');
	// Route::post('task-assign/edit/{id}' ,'TaskAssignController@edit');
	// Route::get('task-assign/delete/{id}' ,'TaskAssignController@delete');
	Route::get('task-assign/quotations/{quot_id}' ,'TaskAssignController@quotation');
	Route::post('task-assign/quotations/{quot_id}' ,'TaskAssignController@postQuotation');

	Route::get('plans' ,'PlansController@index');
	Route::get('plans-render' ,'PlansController@renderService');
	Route::get('plans-loaders/{key}/{id?}' ,'PlansController@renderLoaders');
	Route::post('plans/add' ,'PlansController@add');
	Route::post('plans/edit/{id}' ,'PlansController@edit');
	Route::get('plans/delete/{id}' ,'PlansController@delete');
	Route::get('plans-delete-service/{id}' ,'PlansController@deleteService');
	Route::get('plans/active/{id}' ,'PlansController@statusChange');

	Route::get('contracts' ,'ContractsController@index');
	Route::post('add-contract' ,'ContractsController@add');
	Route::post('edit-contract/{id}' ,'ContractsController@edit');
	Route::get('contracts-load-edit-pop-up/{id}' ,'ContractsController@loadEdit');
	Route::get('contracts-load-add-pop-up/{quotation_id}' ,'ContractsController@loadAdd');
	Route::get('contracts-sign/{cont_id}' ,'ContractsController@signContract');
	Route::get('contracts-signed' ,'ContractsController@loadSignedContracts');
	Route::get('contracts-quot' ,'ContractsController@loadContractsQuot');

	Route::get('finance' ,'FinanceController@index');
	Route::get('finance-quots/{key}' ,'FinanceController@loadQuots');
	Route::get('finance-quotation/{com_id}' ,'FinanceController@quotation');
	Route::get('finance-collect/{com_id}' ,'FinanceController@viewQuot');

	Route::get('task-manager' ,'TaskManagerController@index');
	Route::get('task-manager-load-tasks/{v}' ,'TaskManagerController@loadTasks');
	Route::get('task-manager-load/{id}/{assign_id}' ,'TaskManagerController@loadTask');
	Route::post('task-manager-execute/{id}/{assign_id}' ,'TaskManagerController@executeTask');
	Route::get('task-manager-history/{assign_id}' ,'TaskManagerController@taskHistory');
	Route::get('task-manager-confirm/{assign_id}' ,'TaskManagerController@taskConfirm');
	Route::get('task-manager-gallery/{assign_id}/{with_del?}' ,'TaskManagerController@taskGallery');
	Route::get('task-manager-comments/{assign_id}' ,'TaskManagerController@taskComments');
	Route::post('task-manager-delete-file' ,'TaskManagerController@deleteFile');

	Route::get('tasks-approve' ,'TasksApproveController@index');
	Route::get('tasks-approve-load-tasks/{quot_id}/{dec}' ,'TasksApproveController@loadQuotTasks');
	Route::get('task-approve-load-quots/{v}' ,'TasksApproveController@loadQuots');
	Route::get('task-approve-load-comments/{assign_id}/{declined}' ,'TasksApproveController@loadComments');
	Route::post('task-approve-confirm/{assign_id}/{v}' ,'TasksApproveController@postTaskAssignApprove');

	Route::get('director-tasks-approve' ,'DirectorTasksApproveController@index');
	Route::get('director-tasks-approve-load-tasks/{quot_id}' ,'DirectorTasksApproveController@loadQuotTasks');
	Route::get('director-task-approve-load-quots/{v}' ,'DirectorTasksApproveController@loadQuots');
	Route::get('director-task-approve-load-declined' ,'DirectorTasksApproveController@loadDeclinedQuots');
	Route::get('director-tasks-approve-load-qqs-comments/{qqs_id}' ,'DirectorTasksApproveController@loadDeclinedQuotsComments');
	Route::get('director-task-approve-load-comments/{assign_id}' ,'DirectorTasksApproveController@loadComments');
	Route::post('director-task-approve-confirm/{assign_id}/{v}' ,'DirectorTasksApproveController@postTaskAssignApprove');


	Route::get('complete-proposals' ,'ProposalsController@index');
	Route::get('complete-proposals-current' ,'ProposalsController@getCurrentProposals');

	Route::get('complete-proposals/load-gallery/{prop_id}/{form_id}' ,'ProposalsController@loadGallery');
	Route::get('complete-proposals/load-proposal/{prop_id}/{form_id}' ,'ProposalsController@loadProposal');
	Route::post('complete-proposals/add-proposal/{prop_id}/{form_id}' ,'ProposalsController@addProposal');

	Route::get('complete-proposals/load-more-inputs/{prop_id}/{form_id}' ,'ProposalsController@addMore');


	// Route::get('read-permission' ,function() {
	// 	$data = \App\Permissions::all();
	// 	foreach($data as $d) {
	// 		echo "perm = Permissions::create(['trigger' => '".$d->trigger."' ,'name' => '".$d->name."' ,'trigger_category' => '".$d->trigger_category."']);".
 //        		 "PermissionPositions::create(['position_id' => s_pos->id ,'permission_id' => perm->id]);</br>";
	// 	}
	// });

	Route::get('proposal-forms' ,'ProposalFormsController@index');
	Route::get('proposal-forms/create' ,'ProposalFormsController@create');
	Route::post('proposal-forms/create' ,'ProposalFormsController@store');
	Route::get('proposal-forms/edit/{id}' ,'ProposalFormsController@edit');
	Route::post('proposal-forms/edit/{id}' ,'ProposalFormsController@update');
	Route::get('proposal-forms/delete/{id}' ,'ProposalFormsController@destroy');
	Route::get('proposal-forms/render/inputRow' ,'ProposalFormsController@renderInputRow');


	Route::get('offers' ,'OffersController@index');
	Route::get('offers/load-offer/{id?}' ,'OffersController@loadOffer');
	Route::get('offers/render/{type}/{id?}' ,'OffersController@renderPlanOrServices');
	Route::get('offers/more-service' ,'OffersController@moreServices');
	Route::get('offers/active/{id}' ,'OffersController@statusChange');
	Route::post('offers/add' ,'OffersController@add');
	Route::post('offers/edit/{id}' ,'OffersController@edit');
	Route::get('offers/delete/{id}' ,'OffersController@delete');

	Route::resource('connection-references' ,'ConnectionReferencesController');

	Route::get('connections' ,'ConnectionController@index');
	Route::get('connections/delete/{id}' ,'ConnectionController@delete');
	Route::get('connections/pop-up-loader/{key}/{id?}' ,'ConnectionController@popUpLoader');
	Route::get('connections/render/{key}/{id?}' ,'ConnectionController@renderRelated');

	Route::post('connections/addfeedback' ,'ConnectionController@postAddFeedback');
	Route::post('connections/add' ,'ConnectionController@postAdd');
	Route::post('connections/edit/{id}' ,'ConnectionController@postEdit');

});





