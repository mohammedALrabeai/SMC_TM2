<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMailRequest;
use App\Models\ContactUs;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Send the Contact email.
     *
     * @param ContactMailRequest $request
     * @return RedirectResponse
     */
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:10000'],
            'phone' => ['required', 'string', 'min:9', 'max:13'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->to(app('url')->previous() . "#contact")
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $contactUs = new ContactUs();
            $contactUs->name = $request->input('name');
            $contactUs->phone = $request->input('phone');
            $contactUs->save();

            $this->sendNotification($contactUs);

            return redirect()->to(app('url')->previous() . "#contact")->with('success', __('Thank you!') . ' ' . __('We\'ve received your message.'));

        } catch (Exception $e) {
            return redirect()->route('contact')->with('error', $e->getMessage());
        }
    }

    public function sendNotification(ContactUs $contactUs)
    {

        try {
            $http = new Client([
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ],
                'form_params' => [
                    'Authorization' => '40703bb7812b727ec01c24f2da518c407342559c', // Is Constant
                    'recipient' => '120363331419535301@g.us',// Change Based on Client
                    'profile_id' => 'aedd0dc2-8453',// Change Based on Client
                    'message' => __('Whatsapp ContactUs Content :name :phone.', [
                        'name' => $contactUs->name,
                        'phone' => $contactUs->phone,
                    ])
                ]
            ]);

            $response = $http->post('https://otp.intshar.net/send_msg.php');

            return $response->getBody();
        } catch (BadResponseException $e) {
            // return $e->getCode();
            if ($e->getCode() === 400) {
                return response()->json(['ok' => '0', 'erro' => 'Invalid Request.'], $e->getCode());
            } else if ($e->getCode() === 401) {
                return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
            }
            return response()->json('Something went wrong on the server.', $e->getCode());
        }


    }
}
