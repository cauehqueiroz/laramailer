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

Route::get('/', function () {
    return view('index');
});

Route::get('/mail', function () {
    $a = App\Contact::find(1);
    return new App\Mail\SendMailContact($a);
});

Route::post('/enviarEmail', function (App\Contact $contact, \Illuminate\Http\Request  $request) {
    $client_ip = Request::ip();
    $data = $request->all();
    $data['client_ip'] = $client_ip;
    // Salvar
    
    $rules = array(
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
        'phone' => 'required|regex:/\([0-9]{2}\)\s([0-9]{4,5})\-([0-9]{4})/',
        'attachment' => 'required|file|max:500|mimes:pdf,doc,docx,odt,txt',
    );
    $validator = Validator::make($data, $rules);
    if ($validator->fails()) {
        $errors = $validator->errors();
        return response()->json(['success' => false, "message" => $errors->all()], 200);
    }

    // Upload attachament
    $data = $validator->getData();
    $path = $request->attachment->store('attachments');
    $data['attachment'] = $path;

    $contact->fill($data);
    $contact->save();
    $to = env('CONTACT_EMAIL');
    Illuminate\Support\Facades\Mail::to($to)->send(new App\Mail\SendMailContact($contact));

    $return = [
        'sent' => true,
    ];
    return response()->json($return, 200);
})->name('enviar-email');
