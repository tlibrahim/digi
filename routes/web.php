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
	Route::get('task-assign-loaders/{key}/{id?}' ,'TaskAssignController@renderLoaders');
	Route::post('task-assign/add' ,'TaskAssignController@add');
	Route::post('task-assign/edit/{id}' ,'TaskAssignController@edit');
	Route::get('task-assign/delete/{id}' ,'TaskAssignController@delete');

	Route::get('plans' ,'PlansController@index');
	Route::get('plans-render' ,'PlansController@renderService');
	Route::get('plans-loaders/{key}/{id?}' ,'PlansController@renderLoaders');
	Route::post('plans/add' ,'PlansController@add');
	Route::post('plans/edit/{id}' ,'PlansController@edit');
	Route::get('plans/delete/{id}' ,'PlansController@delete');
	Route::get('plans-delete-service/{id}' ,'PlansController@deleteService');

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

});





