<?php

use App\Contact;
use Illuminate\Database\Seeder;

class ContactMoreInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Contact::all() as $contact) {
            $contact->company = "Company" . $contact->id;
            $contact->mobile_phone = "Phone" . $contact->id;
            $contact->work_phone = "Work phone" . $contact->id;
            $contact->street = "Street" . $contact->id;
            $contact->zipcode  = "zip code" . $contact->id;
            $contact->city  = "city" . $contact->id;
            $contact->other  = "other" . $contact->id;
            $contact->notes  = "notes" . $contact->id;
            $contact->save();
        }
    }
}
