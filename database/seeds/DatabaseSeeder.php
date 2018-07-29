<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Positions;
use App\Department;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InputnamesTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // DB::table('industries')->insert([
        //     'name' => 'Development'
        // ]);
        // DB::table('industries')->insert([
        //     'name' => 'Marketing'
        // ]);
        // DB::table('companies')->insert([
        //     'name' => 'First Comany',
        //     'industry_id' => 1,
        //     'intro' => 'our intro',
        //     'address' => 'my address',
        //     'location_credential' => '78954 453464',
        //     'location_name' => 'madiie',
        //     'founded' => '07/07/2007',
        //     'hotline' => '19777',
        //     'email' => 'a@a.com',
        //     'website' => 'www.a.com',
        //     'facebook' => 'www.a.com',
        //     'twitter' => 'www.a.com',
        //     'instagram' => 'www.a.com',
        //     'isverified' => 1,
        //     'googleplus' => 'www.a.com',
        //     'open_from' => '10 AM',
        //     'open_to' => '10 PM',
        //     'logo' => 'logo.png',
        //     'coverphoto' => 'coverphoto.png'

        // ]);
        // DB::table('unit__types')->insert([
        //     'name' => 'flat'
        // ]);
        // DB::table('unit__types')->insert([
        //     'name' => 'villa'
        // ]);
        // DB::table('projects')->insert([
        //     'name' => 'First Project',
        //     'company_id' => 1,
        //     'location_credential' => '78954 453464',
        //     'location_name' => 'madiie',
        //     'about' => 'my about',
        //     'logo' => 'logo.png',
        //     'downpayment' => 'cash',
        //     'from_price' => '700',
        //     'to_price' => '7000',
        //     'from_space' => '60',
        //     'to_space' => '250',
        //     'paymentfacility' => '7',
        // ]);
        // DB::table('branches')->insert([
        //     'name' => 'First Branch',
        //     'company_id' => 1,
        //     'address' => 'our address',
        //     'location_credential' => '78954 453464',
        //     'location_name' => 'madiie',
        //     'phone' => '010011012',
        //     'email' => 'branch@branch.com',
        //     'facebook' => 'www.b.com',
        //     'twitter' => 'www.b.com',
        //     'instagram' => 'www.b.com',
        // ]);
        // DB::table('project__unit__types')->insert([
        //     'unit_type_id' => 1,
        //     'project_id' => 1
        // ]);
        // DB::table('project__unit__types')->insert([
        //     'unit_type_id' => 2,
        //     'project_id' => 1
        // ]);
        // DB::table('lead__sources')->insert([
        //     'name' => 'FB Message'
        // ]);
        // DB::table('lead__sources')->insert([
        //     'name' => 'FB Comment'
        // ]);
        // DB::table('lead__sources')->insert([
        //     'name' => 'Live chat'
        // ]);
        // DB::table('lead__sources')->insert([
        //     'name' => 'Website form'
        // ]);
        // DB::table('lead__status__feedbacks')->insert([
        //     'name' => 'No Answer',
        //     'form' => '<div class="form-group"><label class="col-md-3 control-label" for="example-hf-email">Feedback Date</label> 	<div class="col-md-7"> 		<input class="form-control form_datetime" type="text" id="date" name="date" placeholder="Date"> 	</div> </div> <div class="form-group"><label class="col-md-3 control-label" for="example-hf-email"></label> 	<div class="col-md-7"> 		<a class="form-control btn btn-sm btn-primary" id="test" data-dismiss="modal" href="#">Save</a> 	</div> </div>'
        // ]);
        // DB::table('lead__status__feedbacks')->insert([
        //     'name' => 'Call Back',
        //     'form' => '<div class="form-group"><label class="col-md-3 control-label" for="example-hf-email">Feedback Date</label> 	<div class="col-md-7"> 		<input class="form-control form_datetime" type="text" id="date" name="date" placeholder="Date"> 	</div> </div> <div class="form-group"><label class="col-md-3 control-label" for="example-hf-email">Feedback Description</label> 	<div class="col-md-7"> 		<input class="form-control" type="text" id="decs" name="decs" placeholder="Description"> 	</div> </div> <div class="form-group"><label class="col-md-3 control-label" for="example-hf-email"></label> 	<div class="col-md-7"> 		<a class="form-control btn btn-sm btn-primary" id="test" data-dismiss="modal" href="#">Save</a> 	</div> </div>'
        // ]);
        // DB::table('lead__status__feedbacks')->insert([
        //     'name' => 'Wrong Number',
        //     'form' => '<div class="form-group"><label class="col-md-3 control-label" for="example-hf-email">Feedback Date</label> 	<div class="col-md-7"> 		<input class="form-control form_datetime" type="text" id="date" name="date" placeholder="Date"> 	</div> </div> <div class="form-group"><label class="col-md-3 control-label" for="example-hf-email"></label> 	<div class="col-md-7"> 		<a class="form-control btn btn-sm btn-primary" id="test" data-dismiss="modal" href="#">Save</a> 	</div> </div>'
        // ]);
        // DB::table('lead__status__feedbacks')->insert([
        //     'name' => 'Not interested',
        //     'form' => '<div class="form-group"><label class="col-md-3 control-label" for="example-hf-email">Feedback Date</label> 	<div class="col-md-7"> 		<input class="form-control form_datetime" type="text" id="date" name="date" placeholder="Date"> 	</div> </div> <div class="form-group"><label class="col-md-3 control-label" for="example-hf-email">Feedback Description</label> 	<div class="col-md-7"> 		<input class="form-control" type="text" id="decs" name="decs" placeholder="Description"> 	</div> </div> <div class="form-group"><label class="col-md-3 control-label" for="example-hf-email"></label> 	<div class="col-md-7"> 		<a class="form-control btn btn-sm btn-primary" id="test" data-dismiss="modal" href="#">Save</a> 	</div> </div>'
        // ]);
        // DB::table('lead__status__feedbacks')->insert([
        //     'name' => 'Another Project',
        //     'form' => '<div class="form-group"><label class="col-md-3 control-label" for="example-hf-email">Feedback Date</label> 	<div class="col-md-7"> 		<input class="form-control form_datetime" type="text" id="date" name="date" placeholder="Date"> 	</div> </div> <div class="form-group"><label class="col-md-3 control-label" for="example-hf-email">Feedback Description</label> 	<div class="col-md-7"> 		<input class="form-control" type="text" id="decs" name="decs" placeholder="Description"> 	</div> </div> <div class="form-group"><label class="col-md-3 control-label" for="example-hf-email"></label> 	<div class="col-md-7"> 		<a class="form-control btn btn-sm btn-primary" id="test" data-dismiss="modal" href="#">Save</a> 	</div> </div>'
        // ]);
        // DB::table('lead__status__feedbacks')->insert([
        //     'name' => 'Appointment',
        //     'form' => ''
        // ]);
        // DB::table('roles')->insert([
        //     'name' => 'Dashboard',
        //     'url' => 'dashboard'
        // ]);
        // DB::table('privlages')->insert([
        //     'name' => 'Owner'
        // ]);
        // DB::table('role__privlages')->insert([
        //     'role_id' => 1,
        //     'privlage_id' => 1
        // ]);
        // DB::table('company__users')->insert([
        //     'company_id' => 1,
        //     'privlage_id' => 1,
        //     'name' => 'owner user',
        //     'email' => 'one@one.com',
        //     'phone' => '015015',
        //     'password' => bcrypt('123456'),
        // ]);
        // DB::table('customer_leads')->insert([
        //     'company_id' => 1,
        //     'project_id' => 1,
        //     'company_user_id' => 1,
        //     'lead_source_id' => 1,
        //     'need_type' => 'Request a Call',
        //     'name' => 'first customer',
        //     'phone' => '011',
        //     'email' => 'customer@customer.com',
        //     'message' => 'Hey i am here',
        // ]);
        // DB::table('customer_lead__feedbacks')->insert([
        //     'customer_lead_id' => 1,
        //     'company_user_id' => 1,
        //     'lead_status_feedback_id' => 3,
        //     'date' => '08/08/2008',
        //     'description' => 'lol',
        // ]);
        $dep = Department::create([
            'name' => 'Business Development'
        ]);
        DB::table('departments')->insert([
            'name' => 'Software Development'
        ]);
        DB::table('departments')->insert([
            'name' => 'Digital Marketing'
        ]);
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@digi-sail.com',
            'password' => bcrypt(123456)
            ]);
        $pos = Positions::create([
            'name' => 'Team Leader',
            'departement_id' => $dep->id
            ]);
        DB::table('user_positions')->insert([
            'position_id' => $pos->id,
            'user_id' => $admin->id
            ]);
    }
}
